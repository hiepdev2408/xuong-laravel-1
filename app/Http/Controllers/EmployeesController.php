<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employe;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{
    const PATH_VIEW = 'employees.';

    public function index(){
        $employees = Employe::query()->with('department', 'manager')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('employees'));
    }

    public function create(){
        $departments = Department::query()->pluck('name', 'id')->all();
        $manegers = Manager::query()->pluck('name', 'id')->all();

        return view(self::PATH_VIEW . __FUNCTION__, compact('departments', 'manegers'));
    }

    public function store(Request $request){
        // dd($request->all());
        try {
            DB::transaction(function () use ($request){
                $data = $request->except('profile_picture');
                $data['is_active'] ??= 0;

                if($request->hasFile('profile_picture')){
                    $data['profile_picture'] = Storage::put('employees', $request->file('profile_picture'));
                }

                Employe::query()->create($data);
            });

            return redirect()->route('index')->with('Thao tác thành công!');
        } catch (\Exception $exception) {
            dd($exception->getMessage());

            return back();
        }
    }

    public function edit($id){
        $employ = Employe::query()->findOrFail($id);
        $departments = Department::query()->pluck('name', 'id')->all();
        $manegers = Manager::query()->pluck('name', 'id')->all();

        return view(self::PATH_VIEW . __FUNCTION__, compact('employ', 'departments', 'manegers'));
    }

    public function update(Request $request, $id){
        $employ = Employe::query()->findOrFail($id);
        try {
            DB::transaction(function () use ($request, $employ){
                $data = $request->except('profile_picture');
                $data['is_active'] ??= 0;

                if($request->hasFile('profile_picture')){
                    $data['profile_picture'] = Storage::put('employees', $request->file('profile_picture'));
                }

                $currentImg = $request->profile_picture;
                $employ->update($data);

                if($request->hasFile('profile_picture') && $currentImg && Storage::exists('profile_picture')){
                    Storage::delete($currentImg);
                }
            });

            return redirect()->back()->with('Thao tác thành công!');
        } catch (\Exception $exception) {
            if(!empty('profile_picture')){
                Storage::delete('profile_picture');
            }

            return back()->with($exception->getMessage());
        }
    }

    public function destroy(Request $request, $id){
        $employ = Employe::query()->findOrFail($id);

        $employ->delete();
        if($employ->profile_picture && Storage::exists('profile_picture')){
            Storage::delete($$employ->profile_picture);
        }

        return back();
    }
}

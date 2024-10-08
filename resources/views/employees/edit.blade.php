@extends('layouts.master')
@section('content')
    <div class="container">
        <h2 class="text-center text-danger mt-3">Sửa Empolyees</h2>
        <form action="{{ route('update', $employ->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <label for="">Departmat</label>
                    <select name="department_id" class="form-control">
                        @foreach ($departments as $id => $name)
                            <option @selected($employ->department_id == $id) value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="">Maneger</label>
                    <select name="manager_id" class="form-control">
                        @foreach ($manegers as $id => $name)
                            <option @selected($employ->manager_id == $id) value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="mt-3">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" value="{{ $employ->first_name }}" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" value="{{ $employ->last_name }}" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{ $employ->email }}" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Phone</label>
                    <input type="number" name="phone" value="{{ $employ->phone }}" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Date of birth</label>
                    <input type="date" name="date_of_birth" value="{{ $employ->date_of_birth }}" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Hire date</label>
                    <input type="datetime" name="hire_date" value="{{ $employ->hire_date }}" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Salary</label>
                    <input type="number" name="salary" value="{{ $employ->salary }}" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Is active</label>
                    <input type="checkbox" name="is_active"
                    @checked($employ->is_active)
                    value="1">
                </div>
                <div class="mt-3">
                    <label for="">Profile Picture</label>
                    <input type="file" name="profile_picture" class="mt-3 form-control">
                    @if(!empty($employ->profile_picture))
                        <img src="{{ Storage::url($employ->profile_picture) }}" width="100px" alt="">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-3">Update</button>
                <a href="{{ route('index') }}" class="btn btn-success">Quay lại</a>
            </div>
        </form>
    </div>
@endsection

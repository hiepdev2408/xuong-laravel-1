@extends('layouts.master')
@section('content')
    <div class="container">
        <h2 class="text-center text-danger mt-3">Thêm mới Empolyees</h2>
        <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label for="">Departmat</label>
                    <select name="department_id" class="form-control">
                        @foreach ($departments as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="">Maneger</label>
                    <select name="manager_id" class="form-control">
                        @foreach ($manegers as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="mt-3">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Phone</label>
                    <input type="number" name="phone" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Date of birth</label>
                    <input type="date" name="date_of_birth" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Hire date</label>
                    <input type="date" name="hire_date" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Salary</label>
                    <input type="number" name="salary" class="mt-3 form-control">
                </div>
                <div class="mt-3">
                    <label for="">Is active</label>
                    <input type="checkbox" name="is_active" value="1" checked>
                </div>
                <div class="mt-3">
                    <label for="">Profile Picture</label>
                    <input type="file" name="profile_picture" class="mt-3 form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-3">Thêm mới</button>
            </div>
        </form>
    </div>
@endsection

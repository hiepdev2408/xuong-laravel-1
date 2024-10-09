@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <h3 class="text-center mt-5 text-primary">Đăng ký tài khoản</h3>
            <div class="mt-3">
                <label for="" class="form-label">Tên đăng nhập</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mt-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="mt-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mt-3">
                <label for="" class="form-label">Password Confirmation</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button class="btn btn-primary mt-3">Register</button>
        </form>
    </div>
@endsection

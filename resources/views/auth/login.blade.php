@extends('layouts.master')

@section('content')
    <div class="container">
    <form action="{{ route('login') }}" method="post">
        @csrf
        <h3 class="text-center mt-5 text-primary">Đăng nhập</h3>
        <div class="mt-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="mt-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div>
            <input type="checkbox" name="remember" id="remember" checked>
            <label for="remember">Remember Me</label>
        </div>
        <button class="btn btn-primary mt-3">Login</button>
    </form>
    </div>
@endsection

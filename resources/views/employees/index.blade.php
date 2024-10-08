@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <a href="{{ route('create') }}" class="btn btn-primary">Thêm mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Department & Manager</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of birth</th>
                    <th>Hire date</th>
                    <th>Salary</th>
                    <th>Is active</th>
                    <th>Profile picture</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $key => $emplo)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <li>{{ $emplo->department->name }}</li>
                            <li>{{ $emplo->manager->name }}</li>
                        </td>
                        <td>{{ $emplo->first_name }}</td>
                        <td>{{ $emplo->last_name }}</td>
                        <td>{{ $emplo->email }}</td>
                        <td>{{ $emplo->phone }}</td>
                        <td>{{ $emplo->date_of_birth }}</td>
                        <td>{{ $emplo->hire_date }}</td>
                        <td>{{ $emplo->salary }}</td>
                        <td>{!! $emplo->is_active
                        ? '<span class="badge bg-primary">Yes</span>'
                        : '<span class="badge bg-danger">No</span>' !!}</td>
                        <td>
                            @if ($emplo->profile_picture)
                                <img src="{{ Storage::url($emplo->profile_picture) }}" width="100px" alt="">
                            @else
                                Ảnh không có
                            @endif
                        </td>
                        <td>{{ $emplo->created_at }}</td>
                        <td>{{ $emplo->updated_at }}</td>
                        <td>
                            <a href="{{ route('edit', $emplo->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('destroy', $emplo->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

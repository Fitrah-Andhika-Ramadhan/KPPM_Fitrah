@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <h1>Admin Management</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New Admin</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>********</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

                   
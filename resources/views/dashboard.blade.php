@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as <strong>ADMIN</strong>!
                    {{-- <a href="{{route('admin/add_user')}}" class="btn btn-primary" style="float:right">Add User</a>  --}}
                    <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">User Management</div>
                           
                    <!-- Table -->
                    <table class="table">
                    <thead>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Edit User</th>
                        <th>Delete User</th>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{$user->name}}</th>
                            <th>{{$user->email}}</th>
                            <th><a href="/admin/{{$user->id}}/edit">Edit</a></th>
                            <th><a href="/admin/user_destroy/{{$user->id}}" onclick="if(confirm('Warning:- This user and all related projects and other data will be deleted.'));else{ return false}">Delete</a></th>
                            {{-- <th>
                                <form action="{{ route('admin.destroy',$user->id)}}">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <button>Delete User</button>
                                </form>
                            </th> --}}
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

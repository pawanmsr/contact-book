@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{$item}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{action('AdminController@updateuser', $id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                                <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Enter name" />
                        </div>

                        <div class="form-group">
                            <input type="text" name="email" class="form-control" value="{{$user->email}}" placeholder="Enter email" />
                        </div>

                        <div class="form-group">
                            <select name="role" class="form-control">
                                <option value="">Select Role</option>
                                <option value="0">User</option>
                                <option value="1">Moderator</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>


                        <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save" />
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

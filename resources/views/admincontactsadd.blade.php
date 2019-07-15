@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Record</div>

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

                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div>
                    @endif

                    <form method="POST" action="{{action('AdminController@storecontact')}}">
                        {{ csrf_field() }}
                        <div>
                            <input type="text" name="user" class="form-control" placeholder="Enter email id of user">
                        </div>
                        <div>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Enter email" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone number" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" placeholder="Enter address" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="pin" class="form-control" placeholder="Enter pin" />
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

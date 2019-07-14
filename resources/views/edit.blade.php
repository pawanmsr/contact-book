@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Record</div>

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

                    <form action="{{action('HomeController@update', $id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="{{$contact->name}}" placeholder="Enter name" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" value="{{$contact->email}}" placeholder="Enter email" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" value="{{$contact->phone}}" placeholder="Enter phone number" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" value="{{$contact->address}}" placeholder="Enter address" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="pin" class="form-control" value="{{$contact->pin}}" placeholder="Enter pin" />
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

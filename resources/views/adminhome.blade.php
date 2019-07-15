@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Login</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <a href="{{route('adminusers')}}" class="btn btn-primary">View Users</a>
                        <a href="{{route('admincontacts')}}" class="btn btn-primary">View Contacts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

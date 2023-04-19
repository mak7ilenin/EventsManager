@extends('layouts.app')

@section('content')
<div class="x_title">
    <h2>Users manage</h2>
    <div class="clearfix"></div>
</div>

<div class="demo-container">
    <div class="demo-container">
        <a href="users" class="btn btn-primary btn-sm btn-flat">
            <i class="fa fa-backward"></i> Back to list</a>

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li></li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <!-- Display Validation Errors -->
            @include('common.errors') 
            <form action="{{ url('adduser')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" minlength="6" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" minlength="6" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="role" class="col-sm-3 control-label">Role:</label>

                        <select name="role" class="from-control input-sm">
                            @foreach($roles as $role)
                            <option value="{{$role}}"
                            @if($role=='user') selected @endif
                            >{{$role}}</option>
                        @endforeach
                        </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save user</button>
            </div>
            </form>
    </div>

</div>
@endsection
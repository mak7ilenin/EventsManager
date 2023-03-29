@extends ('layouts.app')

@section('content')
    <div class="x_title">
        <h2>Users manage - Edit user</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="demo-container">
            <a href="/users" class="btn btn-primary btn-sm btn-flat">
                <i class="fa fa-backward"></i>
                Back to list
            </a>

            <div class="container">@include('common.errors')

            <form action="{{ url('edituser/' . $user->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name"
                            value="{{ $user->name }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ $user->email }}" readonly >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Confirm password:</strong>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role:</strong>
                        <select name="role" class="form-control">
                            @php $rolesList = array('user', 'manager', 'admin'); @endphp
                            @foreach ($rolesList as $role)
                                @if($role == $user->role)
                                    <option value="{{ $role }}" selected>{{ strtoupper($role) }}</option>
                                @else
                                    <option value="{{ $role }}">{{ strtoupper($role) }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update user</button>
                </div>
            </form>
        </div>
    </div>
@endsection

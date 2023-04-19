@extends('layouts.app')

@section('content')

<div class="x_content">
    <h3 class="box-title"><strong>Users manage</strong></h3>
    <div class="add">
        <a href="adduser" class ="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New user</a>
    </div>
    {{-- Форма список ролей для фильтрации пользователей --}}
    <div class="pull-right">
        <form class="form-inline" action="{{ url('userByrole')}}" method="POST">
        @csrf
        <div class="from-group">
            <label>Role: </label>
            <select class="from-control input-sm" name="role" onChange=submit();>
                <option value="0">All</option>
                @foreach($roles as $role)
                <option value="{{$role}}"
                @if(isset($selectRole) && $role==$selectRole)
                    selected
                @endif
                >{{$role}}</option>
                @endforeach
            </select>
        </div>
    </div>
                
        @if (count($users ?? '') > 0)
        <table id="database" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="10%">id</th>
                    <th width="20%">Name</th>
                    <th width="20%">Role</th>
                    <th width="50%">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="{{ url('users')}}" method="POST">
                            <a href="{{url('edituser/'.$user->id)}}" title="edit">
                                <i class="fa fa-btn fa-edit"></i>
                            </a>

                            {{-- {{ csrf_field()}}
                            {{method_field('DELETE')}}
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-link">
                                <i class="fa fa-btn fa-trash"></i>
                            </button> --}}
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>Data is empty</p>
        @endif
        </form>


</div>
@endsection
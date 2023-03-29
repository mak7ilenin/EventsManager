@extends('layouts.app')

@section('content')
    <div class="x-title">
        <h2>Users manage</h2>
        <div class="clearfix"></div>
    </div>    

    <div class="x_content">
        <div class="demo-conteiner" style="min-height: 250px">
            <a href="adduser" class="btn btn-primary btn-sm btn-flat">
                <i class="fa fa-plus"> New</i>
            </a>
            <div class="pull-right">
                <form class="form-inline" action="{{ url('usersByRole') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Role: </label>
                        <select name="role" style="margin-left: 20px" class="form-control input-sm" onChange=submit();>
                            <option value="0" selected>All</option>
                            @foreach($roles as $role)
                                <option value="{{ $role }}"
                                    @if(isset($selectedRole) && $role == $selectedRole)
                                        selected
                                    @endif
                                >{{ strtoupper($role) }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            @if (count($users ?? '') > 0)
                <table id="datatable" class="table text-center table-stripped table-bordered">
                    <thead>
                        <th width="10%">NN</th>
                        <th width="20%">Name</th>
                        <th width="35%">Email</th>
                        <th width="25%">Role</th>
                        <th width="10%">Action</th>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <form action="{{ url('userslist/' . $user->id) }}" method="POST">
                                        <a href="{{ url('edituser/' . $user->id) }}" title="edit">
                                            <i class="fa fa-btn fa-edit"></i>
                                        </a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button onclick="return confirm('Are you sure')" type="submit"
                                            class="btn btn-link">
                                            <i class="fa fa-btn fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Data not found!</p>
            @endif
        </div>
    </div>
@endsection

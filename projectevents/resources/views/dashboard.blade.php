@extends('layouts.app')

@section('content')
<div class="x_title">
    <h3>Dashboard Start Page</h3>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="demo-container" style="height: 250px;">
        <h4>Welcome Admin Panel</h4>

        <div><br>
            @can('isAdmin')
            <div class="btn btn-warning btn-lg">
                You have Admin Access
            </div>
            @elsecan('isManager')
            <div class="btn btn-success brn-lg">
                You have Manager Access
            </div>
            @elsecan('isUser')
            <div class="btn btn-primary btn-lg">
                You have User Access
            </div>
            @else
            <div class="btn btn-danger btn-lg">
                You are not logged in
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection
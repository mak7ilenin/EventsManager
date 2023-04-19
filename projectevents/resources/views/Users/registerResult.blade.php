
@extends('layouts.appLogin')

@section('content')
    <hr>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{session()->get('error')}}
                </div>
                @endif
                <p class="login-box-msg">Sign up to start your dashboard</p>
                <form>
                    @csrf
                    <h1>Sign Up Form</h1>
                    <div>
                        <p class="change_link">
                            <a href="/" class=""> Log In </a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><i class="fa fa-cubes"></i>SignUp form</h1>
                            <p>&copy; 2023 IVKHK</p>
                        </div>
                    </div>
                </form>
            </section>    
        </div>    
    </div>    

@endsection
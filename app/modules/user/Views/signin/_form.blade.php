@extends('user::layouts.login')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>PLEASE LOGIN TO APP</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    <br>
                    {!! Form::open(['route' => 'post-user-login','id'=>'form_2']) !!}
                        <div class="form-group">
                            <label class="control-label" for="username">Username Or Email Address</label>
                            {!! Form::text('email', Input::old('email'), ['class' => 'form-control','required','placeholder'=>'Username or email','autofocus','title'=>'Enter Email Address/Username']) !!}
                            <span class="help-block small">Your unique username/email to app</span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password', 'required'=>'required','title'=>'Enter Password']) !!}
                            <span class="help-block small">Your strong password</span>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" class="i-checks" checked>
                            Remember login
                            <p>
                                <a href="{{ route('forget-password-view') }}" class="pull-right" style="text-decoration: underline">Forgot your password?</a>
                            </p>
                            <p class="help-block small">(if this is a private computer)</p>

                        </div>



                        <button class="btn btn-success btn-block">Login</button>

                    {!! Form::close() !!}
                    <a class="btn btn-default btn-block" href="{{Route('create-sign-up')}}">Register</a>
                </div>
            </div>
        </div>
    </div>
@stop


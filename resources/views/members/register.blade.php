@extends('layouts.layout')
@section('content')
<section class=" user-login">
	<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12" style="height: 500px;">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                                      {{ $err }} <br>
                            @endforeach
                            </div>
                        @endif 
                        @if(session('thongbao'))
                            {{ session('thongbao') }}
                        @endif
                        <form id="login-form" class="form" action="{{ route('member.register.submit')}}" method="post">
                            <h3 class="text-center text-info">Register</h3>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                             <div class="form-group">
                                <label for="username" class="text-info">Email :</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Confirm Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
#login .container #login-row #login-column #login-box {
  margin-top: 0px;
  max-width: 600px;
  margin-bottom: 50px;
  height: 420px;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>
@endsection
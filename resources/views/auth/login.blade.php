<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>
    
<head>
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="{{ asset('admin_asset/styles.css') }}" rel="stylesheet" >
    
</head>
<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">
                            <img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" class="brand_logo" alt="Logo">
                        </div>
                    </div>
                   <div class="d-flex justify-content-center form_container">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input id="email" type="email" name="email" class="form-control input_user @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="username"  required autocomplete="email" autofocus>
                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password" type="password" name="password" class="form-control input_pass @error('password') is-invalid @enderror" value="" placeholder="password" required autocomplete="current-password">
                                @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember" {{-- id="remember" --}} {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                    <button type="submit" name="button" class="btn login_btn"> {{ __('Login') }}</button>
                                     
                            </div>
                            <div class="mt-4">
                                <div class="d-flex justify-content-center links">
                                     Don't have an account?  
                                    @if (Route::has('register'))
                                        <a class="ml-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center links">
                                     @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>
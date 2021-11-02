@extends('baseFramework')
@section('title')
    EditedTitle
@endsection
@section('content')
<div class="container-fluid sm-form-background">
    <nav class="navbar navbar-dark ">
        <a class="navbar-brand logo" href="#">BUGTRAC.IO</a>
    </nav>
    <br>
    <br>
    <div class="row">
        <div class="col-4">
            
        </div>
        <div class="col-4 issue-list sm-form-body" >
            <div class="row d-flex justify-content-center">
                
                    <h1>Login</h1>
            </div>
            
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-1">
                            
                        </div>
                        <div class="col d-flex justify-content-start">
                            <h5><label for="email">{{ __('E-Mail Address:') }}</label></h5>
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-1">
                            
                        </div>
                        <div class="col d-flex justify-content-center" >
                            <input class=" sm-form-input"  id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        <div class="col-1">
                            
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-1">
                            
                        </div>
                        <div class="col d-flex justify-content-start">
                            <h5><label for="password">{{ __('Password:') }}</label></h5>
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-1">
                            
                        </div>
                        <div class="col  d-flex justify-content-center">
                            <input class="  sm-form-input"  id="password" type="password" name="password" required autocomplete="current-password">
                        </div>
                        <div class="col-1">
                            
                        </div>
                        
                    </div>
                    
                   
                
                    @error('email')
                        <span>
                            <h5>{{ $message }}</h5>
                        </span>
                    @enderror
                
                
                
                    
                
                    @error('password')
                        <span>
                            <h5>{{ $message }}</h5>
                        </span>
                    @enderror
                    <br>
                    <div class="row">
                        <div class="col-1">
                            
                        </div>
                        <div class="col">
                            <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row d-flex justify-content-center">
                        <button type="submit" class="btn btn-info btn-bug-template">
                            {{ __('Login') }}
                        </button>
                    </div>

                    
                
                
                    
                
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                
                </form>
            

        </div>
        
    </div>
</div>


@endsection

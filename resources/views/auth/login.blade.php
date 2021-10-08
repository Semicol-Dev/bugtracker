<h1>Prihlasenie</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <label for="email">{{ __('E-Mail Address') }}</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
        <span>
            <strong>{{ $message }}</strong>
        </span>
    @enderror



    <input id="password" type="password" name="password" required autocomplete="current-password">

    @error('password')
        <span>
            <strong>{{ $message }}</strong>
        </span>
    @enderror


    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

    <label for="remember">
        {{ __('Remember Me') }}
    </label>


    <button type="submit" class="btn btn-primary">
        {{ __('Login') }}
    </button>

    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif

</form>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <label for="name">{{ __('Name') }}</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


    <label for="email">{{ __('E-Mail Address') }}</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

    @error('email')
        <span>
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label for="password">{{ __('Password') }}</label>
    <input id="password" type="password" name="password" required autocomplete="new-password">

    @error('password')
        <span>
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label for="password-confirm">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

    <button type="submit">
        {{ __('Register') }}
    </button>
</form>

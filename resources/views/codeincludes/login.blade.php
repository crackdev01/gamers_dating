<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="flex2_top">
        <div>
            <input id="email" type="email" class="" name="email" placeholder="email adress" value="{{ old('email') }}"
                required autofocus>

            @if ($errors->has('email'))
            <span class="" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="remember_me_container">
            <div>
                <input id="password" type="password" placeholder="password" class="password_input" name="password" required>
                @if ($errors->has('password'))
                <span class="" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="login">
            <button type="submit" class="">
                {{ __('Login') }}
            </button>
        </div>
        <div class="checkbox_container">
            <div>
                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div>
                @if (Route::has('password.request'))
                <a class="forgot_password" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </div>

</form>

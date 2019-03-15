<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="flex2_top">
        <div class="password_error">
            <input id="email" type="email" class="" name="email" placeholder="email adress" value="{{ old('email') }}"
                required autofocus>

            @if ($errors->has('email'))
            <span class="password_error2" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="password_container">
            <div>
                <input id="" type="password" placeholder="password" class="password_input" name="password" required>
            </div>
            <div class="password_forgot">
                @if (Route::has('password.request'))
                <a class="forgot_password" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
        <div class="login">
            <button type="submit" class="">
                {{ __('Login') }}
            </button>
        </div>
        
    </div>

</form>

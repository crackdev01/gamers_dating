<div class="flex2_top">
    <div class="flex2_top-input">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- email: -->
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            <!-- password: -->
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            <!-- login button -->
            <button type="submit" class="login">
                {{ __('Login') }}
            </button>
        </form>

        <!-- password forgot: -->
        @if (Route::has('password.request'))
        <a class="forgot_password" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </div>
</div>


<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="flex2_bottom">
    <div>Register here</div>
    <div class="">
        <label for="name" class="">{{ __('Name') }}</label>

        <div class="">
            <input id="name" type="text" class="" name="name"
                value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
            <span class="" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="">
        <label for="email" class="">{{ __('E-Mail Address') }}</label>

        <div class="">
            <input id="email" type="email" class="" name="email"
                value="{{ old('email') }}" required>

            @if ($errors->has('email'))
            <span class="" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="">
        <label for="password" class="">{{ __('Password') }}</label>

        <div class="">
            <input id="password" type="password" class=""
                name="password" required>

            @if ($errors->has('password'))
            <span class="" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="">
        <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

        <div class="">
            <input id="password-confirm" type="password" class="" required>
        </div>
    </div>

    <div class="">
        <div class="">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</div>
</form>

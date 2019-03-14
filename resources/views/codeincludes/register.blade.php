<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="flex2_middle">
        <div class="register_head">Register your account</div>
        <div class="register_content">
            <div class="">
                <label for="name" class=""><span>N</span>ame</label>

                <div class="">
                    <input id="name" type="text" class="" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="">
                <label for="email" class=""><span>E</span>-Mail Address</label>

                <div class="">
                    <input id="" type="email" class="" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="">
                <label for="password" class=""><span>P</span>assword</label>

                <div class="">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <div>
                        @if ($errors->has('password'))
                        <span class="" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="">
                <label for="password-confirm" class=""><span>C</span>onfirm Password</label>

                <div class="">
                    <input id="password-confirm" type="password" class="form-control" required>
                </div>
            </div>
            <div id="terms">
                <input type="checkbox" required>agree with our terms.
            </div>

            <div class="register_button">
                <button type="submit" id="registerButton" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </div>
</form>

<div class="flex2_middle">

    <!-- Register header: -->
    <div class="register_head">
        Sign up now
    </div>

    <!-- register form: -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="register_content">
            <!--name -->
            <label for="name" class="labels"><span>N</span>ickname</label>
                <input id="name" type="text" class="" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

            <!-- email -->
            <label for="email" class="labels"><span>E</span>-Mail Address</label>
            {{-- <div class="password_error"> --}}
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} labels" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

            <!-- password -->
            <label for="password" class="labels"><span>P</span>assword</label>
                {{-- <div class="password_error">  --}}
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

            <!-- password-confirm -->
            <label for="password-confirm" class="labels"><span>C</span>onfirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        
            <!-- terms -->

            <div id="terms">
                <input type="checkbox" checked="checked" required><span id="terms2">Agree With Our Terms</span>
            </div>

            <!-- register button -->
            <button type="submit" id="registerButton" class="register_button">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>

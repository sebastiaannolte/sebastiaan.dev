@extends('master')

@section('content')

<div class="content container">
    <div class="page">

        <h1 class="page-title">Login</h1>

        <div class="card-body">
            <form method="POST" action="/login">
                @csrf


                <label for="email">E-Mail Address</label>

                <input id="email" type="email" class="big-textbox @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror



                <label for="password">Password</label>


                <input id="password" type="password" class="big-textbox @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <div class="form-check">
                    <input type="checkbox" class="custom-checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
                <button type="submit" class="save-btn">
                    {{ __('Login') }}
                </button>


                {{-- <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">


                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
                </a>
                @endif
        </div>
    </div> --}}
    </form>
</div>

</div>
</div>
@endsection

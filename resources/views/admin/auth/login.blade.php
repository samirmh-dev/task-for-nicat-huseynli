@extends('admin.layouts.login')

@section('content')

    <div class="signin-box">
        <h2 class="slim-logo"><a href="{{url('/')}}">{{env('APP_ADMIN_NAME')}}<span>.</span></a></h2>
        <h2 class="signin-title-primary">Xoş gəlmisiniz</h2>
        <h3 class="signin-title-secondary">Giriş səhifəsi</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <?php //$mes = \Session::get('message'); dump($mes);//dump(\Session::get('message')) ?>

            <div class="form-group">
                <input id="email" type="email" placeholder="E-poçt" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" placeholder="Şifrə" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
                <input type="hidden" name="recaptcha" id="recaptcha">
                @if (\Session::has('message'))
                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ \Session::get('message') }}</strong>
                                </span>
                 @endif


            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember"> Məni xatırla</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-signin"> Giriş </button>
            @if (Route::has('password.request'))
                <p class="mg-b-0"> <a href="{{ route('password.request') }}">Şifrənizi unutmusunuz?</a></p>
            @endif
        </form>
    </div><!-- signin-box -->
@endsection

@section('scripts')
    <script src="https://google.com/recaptcha/api.js?render={{env('GOOGLE_RECAPTCHA_PUBLIC_KEY')}}"></script>
    <script>
        grecaptcha.ready(function(){
            grecaptcha.execute('{{env('GOOGLE_RECAPTCHA_PUBLIC_KEY')}}',{action:'login'}).then(function (token) {
                if(token){
                    document.getElementById('recaptcha').value = token;
                }
            })
        })
    </script>
@endsection

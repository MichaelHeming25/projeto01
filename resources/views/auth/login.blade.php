<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- STYLE CSS --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="conteudo">
        <div class="conteudo-login">

            <div class="img-login">
                <img src="{{ asset('logo_projeto.png') }}" alt="" srcset="" height="150px">
            </div>

            {{-- FORM --}}

            <form action="{{ route('login') }}" method="POST" class="groups-login">
                @csrf

                <div class="groups-interno-geral">

                    <div class="groups-interno">
                        <input type="text" id="email" class="email @error('email') is-invalid @enderror" name="email" placeholder="Digite o seu e-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="groups-interno">
                        <input type="password" id="password" class="password @error('password') is-invalid @enderror" name="password" placeholder="Digite a sua senha" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

                <button type="submit">Login</button>

                @include('layouts.app')

            </form>

        </div>

    </div>
    
    {{-- SCRIPT JS --}}
    <script src="{{ asset('jquery.js') }}" type="text/javascript"></script>
    
</body>
</html>
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
            @include('layouts.app')
            
            <div class="img-login">
                <img src="{{ asset('logo_tip.svg') }}" alt="" srcset="">
            </div>

            {{-- FORM --}}

                <form action="{{ route('register') }}" method="POST" class="groups-login">
                    @csrf

                    <div class="groups-interno">
                        <input type="text" id="name" class="name @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Digite o seu nome" autocomplete="off">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="groups-interno">
                        <input type="text" id="email" class="email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Digite o seu e-mail" autocomplete="off">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="groups-interno">
                        <input type="text" id="password" class="password @error('password') is-invalid @enderror" name="password" placeholder="Digite a sua senha" autocomplete="off">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="groups-interno">
                        <input type="password" id="password-confirm" class="password-confirm" name="password_confirmation" placeholder="Digite novamente a senha" autocomplete="off">
                    </div>

                    <button type="submit">Registrar</button>
                    <div class="footer-login">Sistema de gerenciamento de oficina mecânica.</div>
            </form>

        </div>

    </div>
    
    {{-- SCRIPT JS --}}
    <script src="{{ asset('jquery.js') }}" type="text/javascript"></script>
</body>
</html>
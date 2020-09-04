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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
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
        
        <div class="redes">
            <div class="redes-interno">
                <a href="http://">
                    <div class="facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </div>
                </a>
                <a href="http://">
                    <div class="whatsapp">
                        <i class="fab fa-whatsapp"></i>
                        <span>Whatsapp</span>
                    </div>
                </a>
                <a href="http://">
                    <div class="instagram">
                        <i class="fab fa-instagram"></i>
                        <span>Instagram</span>
                    </div>
                </a>
            </div>
        </div>

    </div>
    
    {{-- SCRIPT JS --}}
    <script src="{{ asset('jquery.js') }}" type="text/javascript"></script>
    <script>

    $(".redes-interno .facebook").mouseenter(function(){
        $(".redes-interno a").css("text-decoration", "none");
        $(".redes-interno .facebook").css("transition", "0.2s linear");
        $(".redes-interno .facebook").css("background", "white");
        $(".redes-interno .facebook span").css("color", "black");
        $(".redes-interno .facebook i").css("color", "black");
    })
    $(".redes-interno .facebook").mouseleave(function(){
        $(".redes-interno .facebook").css("background", "transparent");
        $(".redes-interno .facebook span").css("color", "white");
        $(".redes-interno .facebook i").css("color", "white");
    })

    $(".redes-interno .instagram").mouseenter(function(){
        $(".redes-interno a").css("text-decoration", "none");
        $(".redes-interno .instagram").css("transition", "0.2s linear");
        $(".redes-interno .instagram").css("background", "white");
        $(".redes-interno .instagram span").css("color", "black");
        $(".redes-interno .instagram i").css("color", "black");
    })
    $(".redes-interno .instagram").mouseleave(function(){
        $(".redes-interno .instagram").css("background", "transparent");
        $(".redes-interno .instagram span").css("color", "white");
        $(".redes-interno .instagram i").css("color", "white");
    })

    $(".redes-interno .whatsapp").mouseenter(function(){
        $(".redes-interno a").css("text-decoration", "none");
        $(".redes-interno .whatsapp").css("transition", "0.2s linear");
        $(".redes-interno .whatsapp").css("background", "white");
        $(".redes-interno .whatsapp span").css("color", "black");
        $(".redes-interno .whatsapp i").css("color", "black");
    })
    $(".redes-interno .whatsapp").mouseleave(function(){
        $(".redes-interno .whatsapp").css("background", "transparent");
        $(".redes-interno .whatsapp span").css("color", "white");
        $(".redes-interno .whatsapp i").css("color", "white");
    })
    
    </script>
</body>
</html>
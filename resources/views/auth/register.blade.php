<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="{{asset('src/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/personal_style.css')}}">
</head>
<body class="login-body">
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="register-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <h4 class="text-center">Preencha todos os campos</h4>
                            <div class="form-group">
                                <label for="username">Nome</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Email</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Senha</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirme a senha</label><br>
                                <input type="password" name="password_confirmation" id="password" class="form-control">
                            </div>
                            <div class="form-group btn-submit">
                                <input type="submit" name="submit" class="btn btn-light" value="Cadastrar">
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="{{route('/')}}" class="register">Já sou cadastrado...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('src/js/jquery.js')}}"></script>
    <script src="{{asset('src/js/bootstrap.js')}}"></script>
</body>
</html>


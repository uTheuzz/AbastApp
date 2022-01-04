<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AbastApp</title>
    <link rel="stylesheet" href="{{asset('src/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/personal_style.css')}}">
</head>
<body class="login-body">
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST" action="{{ route('/') }}">
                            @csrf
                            <h3 class="text-center">Login</h3>
                            <div class="form-group">
                                <label for="username">Email</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Senha</label><br>
                                <img src="{{asset('src/img/olho.png')}}" id="olho" class="olho">
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group btn-submit">
                                <input type="submit" name="submit" class="btn btn-light" value="Login">
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="{{ route('register') }}" class="register">Cadastre-se</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('src/js/jquery.js')}}"></script>
    <script src="{{asset('src/js/bootstrap.js')}}"></script>
    <script>
        document.getElementById('olho').addEventListener('mousedown', function() {
            document.getElementById('password').type = 'text';
        });
        document.getElementById('olho').addEventListener('mouseup', function() {
            document.getElementById('password').type = 'password';
        });
        document.getElementById('olho').addEventListener('mousemove', function() {
            document.getElementById('password').type = 'password';
        });
    </script>
</body>
</html>

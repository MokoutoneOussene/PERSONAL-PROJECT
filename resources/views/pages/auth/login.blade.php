<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion personnel</title>
    @include('layouts.style')
</head>

<body class="d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('images/skyscrapers-looking-up.jpg') }}'); background-size: cover;">
    <div class="container-xl px-4">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <!-- Basic login form-->
                <div class="card shadow-lg border-0 rounded-lg mt-4">
                    <div class="card-header d-flex justify-content-center">
                        <div>
                            <h3 class="fw-light">AUTHENTIFICATION</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid" src="{{ asset('images/undraw_Newspaper_re_syf5.png') }}" alt="logo"
                                style="width: 40%">
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf                           
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nom d'utilisateur</label>
                                <input name="login" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
                            </div>
                            <div class="mt-4 mb-0">
                                <button class="btn btn-primary" type="submit">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.script')
</body>

</html>

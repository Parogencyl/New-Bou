
<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Logowanie</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/client/login.css')}}" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div id="content">

    <!-- First menu -->
   <nav id="navbar1" class="text-right row pt-2">
    @include('nav1')
    </nav>

    <!-- Second menu -->
    <nav id="navbar2" class="text-center row bg-light text-center">
        @include('nav2')
    </nav>

<section>
    <div class="container">
   
        <form method="POST" action="{{ url('logowanie/checklogin')}}" id="loginForm" role="form">
            @csrf
            <h1 class="text-center mb-3 mt-0 pt-0"> Logowanie </h1>

            @if ($message = Session::get('passwordSended'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <div class="form-group">
                <label for="email">Adres email:</label>
                <input type="email" class="form-control" placeholder="Podaj email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password"> Hasło: </label>
                <input type="password" class="form-control" placeholder="Podaj hasło" id="passowrd" name="password">
            </div>

            @if ($message = Session::get('send'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
            @endif

            <div class="form-group row mb-0">
                <div class="col-12 text-center mb-1">
                    <button type="submit" class="btn btn-success btn-lg"> Zaloguj </button>
                </div>
                <div class="col-12 text-center">
                    <a href="{{ url('/logowanie/odzyskaj_haslo') }}" class="btn btn-link"> Zapomniałeś hasła? </a>
                </div>
            </div>
            <p class="text-center mb-0 mt-1"> <a href="{{ url('/rejestracja')}}" class="text-danger" style="font-size:18px"> Rejestracja </a> </p>
        </form>
    </div>
</section>
    </div>
    <!-- Footer -->
    <footer class="pt-4 pb-4" id="footer">
        @include('footer')
    </footer>

    <script src="{{ asset('public/js/indexJs.js')}}"></script>

</body>

</html>
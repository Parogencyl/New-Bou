
<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Admin</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/admin/login.css')}}" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- First menu -->
   <nav id="navbar1" class="text-right row pt-2">
    @include('navAdmin')
    </nav>

    <hr>

<section>
    <div class="container">
   
        <form method="POST" action="{{ url('admin/login/log')}}" id="loginForm" role="form">
            @csrf
            <h1 class="text-center mb-3 mt-0 pt-0"> Logowanie </h1>

            <div class="form-group">
                <label for="email">Adres email:</label>
                <input type="email" class="form-control" placeholder="Podaj email" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password"> Hasło: </label>
                <input type="password" class="form-control" placeholder="Podaj hasło" id="passowrd" name="password">
            </div>

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

            <button type="submit" name="login" id="log" class="btn btn-success"> Zaloguj </button>
        </form>
    </div>
</section>

    <script src="{{ asset('public/js/indexJs.js')}}"></script>

</body>

</html>
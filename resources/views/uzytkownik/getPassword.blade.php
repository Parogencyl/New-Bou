
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

<style>

#content {
    height: auto;
}

#container {
    height: auto;
}

#footer {
    width: 100%;
    height: auto;
}

</style>

<body class="d-flex flex-column min-vh-100">

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
   
        <form method="POST" action="{{ url('/logowanie/odzyskaj_haslo/getPassword')}}" id="loginForm" role="form">
            @csrf
            <h1 class="text-center mb-3 mt-0 pt-0"> Odzyskaj hasło </h1>

            <div class="form-group">
                <label for="email">Adres email:</label>
                <input type="email" class="form-control" placeholder="Podaj email" id="email" name="email" required>
            </div>

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <button type="submit" id="log" class="btn btn-success"> Odzyskaj </button>
        </form>
    </div>
</section>
    </div>
    <!-- Footer -->
    <footer class="pt-4 pb-4 mt-auto" id="footer">
        @include('footer')
    </footer>

    <script src="{{ asset('public/js/indexJs.js')}}"></script>

</body>

</html>
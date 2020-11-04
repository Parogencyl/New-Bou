<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Admin </title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/client/registration.css')}}" rel="stylesheet">

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
    
        <!-- First menu -->
       <nav id="navbar2" class="text-right row pt-2">
        @include('nav2Admin')
        </nav>

    <!-- registration -->
    <section>
        <div class="container">
            <form method="POST" action="{{url('admin/registration/add')}}" id="registrationForm">
                {{ csrf_field() }}
                <h1 class="text-center mb-3 mt-0 pt-0"> Rejestracja </h1>

                <div class="form-group">
                    <label for="email">Adres email:</label>
                    <input type="email" class="form-control" placeholder="jakowalski@email.pl" id="email" name="email" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password"> Hasło: </label>
                    <input type="password" class="form-control" placeholder="Podaj hasło" id="password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="repeatPassword"> Powtórz hasło: </label>
                    <input type="password" class="form-control" placeholder="Powtórz hasło" id="repeatPassword" name="repeatPassword" required>
                    @if ($errors->has('repeatPassword'))
                        <span class="text-danger">{{ $errors->first('repeatPassword') }}</span>
                    @endif
                </div>

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <button type="submit" class="btn btn-danger" id="log"> Zarejestruj </button>
            </form>
        </div>
    </section>


</body>

</html>
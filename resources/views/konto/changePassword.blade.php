<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Moje konto</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/account/content.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/account/changePassword.css')}}" rel="stylesheet">

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
            <nav id="accountMenu">
            <ul class="nav flex-column">

                <li class="nav-item dropdown">
                    <a class="nav-link text-body" onclick="openAccount()" style="cursor: pointer"> Konto <span style="display: block; float: right;" id="iOne"> <i class="fas fa-caret-down"></i> </span> </a>
                    <div class="dropMenu" id="accountDrop">
                        <a href="{{ url('/panel/dane_konta')}}" class="nav-link"> Dane konta  </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link text-body" onclick="openShopping()" style="cursor: pointer"> Zakupy <span style="display: block; float: right;" id="iTwo"> <i class="fas fa-caret-down"></i> </span> </a>
                    <div class="dropMenu" id="shoppingDrop">
                        <a href="{{ url('/panel/historia_zakupow')}}" class="nav-link"> Historia </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link text-body" onclick="openSecurity()" style="cursor: pointer"> Bezpieczeństwo <span style="display: block; float: right;" id="iThree"> <i class="fas fa-caret-down"></i> </span> </a>
                    <div class="dropMenu" id="securityDrop">
                        <a href="{{ url('/panel/zmiana_hasla')}}" class="nav-link"> Zmiana hasła  </a>
                        <a href="{{ url('/panel/adres_pomocniczy')}}" class="nav-link"> Email pomocniczy </a>
                    </div>
                </li>

                <div id="logout">
                    <a class="nav-link" id="logoutButton" href="{{ url('/logout') }}">Wyloguj</a>
                </div>

            </ul>
            </nav>

            <!-- Zmiana hasła -->

            <div id="center">
                <h3> Zmiana hasła </h3>

                <div class="blockData">
                    <p> Hasło </p>
                    <form id="changePassword" action="{{ url('/panel/zmiana_hasla_formularz')}}" method="POST">
                        @csrf
                        <input type="password" placeholder="Aktualne hasło" id="currentPassword" name="currentPassword" required>
                        <div class="valid" id="valid1"></div>
                        <input type="password" placeholder="Nowe hasło" id="newPassword" name="newPassword" required>
                        <div class="valid" id="valid2"></div>
                        <input type="password" placeholder="Powtórz nowe hasło" name="repeatPassword" id="repeatPassword" required>
                        <div class="valid" id="valid3"></div>

                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <br>
                        <button type="submit" id="submit" name="submit"> Zmiana hasła </button>

                    </form>
                </div>
            </div>

        </section>
    </div>
    <!-- Footer -->
    <footer class="pt-4 pb-4" id="footer">
        @include('footer')
    </footer>

</body>

<script src="{{ asset('public/js/account/changePassword.js')}}"></script>

<script src="{{ asset('public/js/account/main.js')}}"></script>


</html>
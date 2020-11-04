<?

    $email = session()->get('email');

    $email_additional = DB::select("SELECT email_additional FROM clients WHERE email=?", [$email]);
    $email_additional = json_decode(json_encode($email_additional[0]), true);

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Moje konto</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/account/content.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/account/secondaryAddress.css')}}" rel="stylesheet">

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
                    <a class="nav-link text-body" onclick="openShopping()" style="cursor: pointer">  Zakupy <span style="display: block; float: right;" id="iTwo"> <i class="fas fa-caret-down"></i> </span> </a>
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

            <!-- Adres pomocniczy -->

            <div id="center">
                <h3> Adres pomocniczy </h3>

                <div class="blockData">
                    <p class="blockTitle"> Adres email </p>
                    <p id="currentEmail" class="emailAddress"> {{ $email }} </p>
                    <p class="blockTitle"> Dodatkowy adres email </p>
                    @if ($email_additional['email_additional'])
                        <p id="secondaryEmail" class="emailAddress">{{$email_additional['email_additional']}}</p> 
                        <div id="buttons">
                            <span class="change" id="changeAddress" onclick="changeEmail()"> Zmień </span>
                            <span class="change" id="deleteAddress"> 
                                <!--
                                <form method="POST" action="{{url('/panel/usun_email')}}">
                            @csrf
                                     <button type="submit" style="display: inline-block; background-color: rgb(251, 255, 249); border: none; color:rgb(161, 26, 26); "> Usuń </button> 
                                </form>
                                    </span>
                                -->
                        </div>  
                    @endif 
                    <div id="addEmailBlock">
                        <form id="addEmail" method="POST" action="{{url('/panel/dodanie_maila')}}">
                            @csrf
                            <p>Zabezpiecz swoje konto podając dodatkowy adres email. Daje to większą szansę na odzyskanie konta w przypadku zapomnienia emaila głównego i hasła, bądź w przypadku utraty konta.</p>
                            <input type="email" id="email" name="email" placeholder="Pomocniczy adres email" required>
                            <div class="valid" id="emailValid"></div>
                            <br>
                            <button id="addsubmit" name="submit" type="submit"> Dodaj adres </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Formularz do zmiany emaila -->

        <form id="changingForm" method="POST" action="{{url('/panel/zmiana_adresu_pomocniczego')}}">
            @csrf
                <h2> Zmiana danych </h2>
                <fieldset id="fieldOne">
                    <legend>Email pomocniczy</legend>
                    <input type="email" name="emailChange" id="emailChangeInput">
                </fieldset>
                <div class="valid" id="valid1"></div>

                <div>
                    <button type="reset" id="cancel" onclick="document.getElementById('changingForm').style.display='none'"> Anuluj </button>
                </div>

                <div>
                    <button type="submit" name="submit" id="submit" disabled> Zatwierdź </button>
                </div>
            </form>

        </section>
    </div>
    <!-- Footer -->
    <footer class="pt-4 pb-4" id="footer">
        @include('footer')
    </footer>

</body>

<script src="{{ asset('public/js/account/secondaryAddress.js')}}"></script>

<script src="{{ asset('public/js/account/main.js')}}"></script>

</html>
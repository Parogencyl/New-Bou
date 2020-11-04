<?

    $email = session()->get('email');

    $user = DB::select("SELECT * FROM clients WHERE email=?", [$email]);
    $user = json_decode(json_encode($user[0]), true);

    $name = $user['name']." ".$user['surname'];
    //$dateOfBirth = str_replace("-", " ", $user['date_of_birth']);
    $dateOfBirth = $user['date_of_birth'];

    $address = DB::select("SELECT * FROM clients_address WHERE User_Id=?", [$user["id_client"]]);
    $userAddress = json_decode(json_encode($address[0]), true);

    $address2 = DB::select("SELECT * FROM clients_add_address WHERE User_Id=?", [$user["id_client"]]);

    $userAddress2 = null;
    if($address2){
        $userAddress2 = json_decode(json_encode($address2[0]), true);
    }

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
    <link href="{{ asset('public/css/account/accountData.css')}}" rel="stylesheet">

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
                    <a class="nav-link text-body"onclick="openShopping()" style="cursor: pointer"> Zakupy <span style="display: block; float: right;" id="iTwo"> <i class="fas fa-caret-down"></i> </span> </a>
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
        <div id="center">
            <h3> Dane konta </h3>

            <div class="blockData">

                <p class="title">Imię i nazwisko</p>
            <span id="name"> {{ $name }}</span> <span class="change" id="changeName" onclick="changeName()"> Zmień </span>

                <p class="title">Email</p>
                <span id="email"> {{ $email }} </span> <span class="change" id="changeEmail" onclick="changeEmail()"> Zmień </span>

                <p class="title">Telefon</p>
                <span id="tel"> {{ $user['number'] }}</span> <span class="change" id="changeTel" onclick="changeTel()"> Zmień </span>

                <p class="title">Data urodzenia</p>
                <span id="birthOfDay"> {{ $dateOfBirth }} </span>
            </div>

            <div class="blockData">

                <div class="addressBlock col-sm-6 col-12">
                    <p class="title">Adres wysyłki</p>
                @if ($userAddress["Street"])
                    <p id="address">
                        <span> {{$userAddress["Street"]." ".$userAddress["Local_number"] }}</span><br>
                        <span> {{ $userAddress["Zip"]." ".$userAddress["Location"]}}</span><br>
                        <span> {{ $userAddress["Voivodeship"] }}</span><br>
                        <span> {{ $userAddress["Country"] }}</span><br>
                    </p>
                    <span class="change" id="changeAddress" onclick="changeAddress()"> Zmień </span>
                    @else
                    <span class="change" id="changeAddress" onclick="changeAddress()"> Dodaj </span>
                    @endif
                </div>

                <div class="addressBlock col-sm-6 col-12">
                    <p class="title">Alternatywny adres</p>
                @if ($userAddress2["Street"])

                    <p id="address">
                        <span> {{ $userAddress2["Street"]." ".$userAddress2["Local_Number"] }}</span><br>
                        <span> {{ $userAddress2["Zip"]." ".$userAddress2["Location"]}}</span><br>
                        <span> {{ $userAddress2["Voivodeship"] }}</span><br>
                        <span> {{ $userAddress2["Country"] }}</span><br>
                    </p>
                    <span class="change" id="changeAddress" onclick="changeAddress(); additionalAddress()"> Zmień </span>
                    @else
                    <span class="change" id="changeAddress" onclick="changeAddress(); additionalAddress()"> Dodaj </span>
                    @endif

                </div>

            </div>
        </div>


        <!-- Formularz -->

    <form id="changingForm" method="POST" action="{{ url('/panel/zmiana_danych')}}" role="form">
            @csrf
            <h2> Zmiana danych </h2>
            <fieldset id="fieldOne">
                <legend>Imię</legend>
                <input type="text" name="name" id="nameInput">
            </fieldset>
            <div class="valid" id="valid1"></div>

            <fieldset id="fieldTwo">
                <legend>Nazwisko</legend>
                <input type="text" name="surname" id="surname">
            </fieldset>
            <div class="valid" id="valid2"></div>

            <fieldset id="fieldThree" style="display: none;">
                <legend>Województwo</legend>
                <input type="text" name="province" id="province">
            </fieldset>
            <div class="valid" id="valid3"></div>

            <fieldset id="fieldFour" style="display: none;">
                <legend>Kraj</legend>
                <input type="text" name="country" id="country">
            </fieldset>
            <div class="valid" id="valid4"></div>

            <div>
                <button type="reset" id="cancel" onclick="document.getElementById('changingForm').style.display='none'"> Anuluj </button>
            </div>
            <div>
                <button type="submit" id="submit" name="submit" disabled> Zatwierdź </button>
            </div>
        </form>

    </section>

    <!-- Footer -->
    <footer class="pt-4 pb-4 mt-5">
        @include('footer')
    </footer>

</body>

<script src="{{ asset('public/js/account/main.js')}}"></script>
<script src="{{ asset('public/js/account/accountData.js')}}"></script>


</html>
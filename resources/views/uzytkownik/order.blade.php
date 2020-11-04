<?

    $email = session()->get('email');

    if($email){
        $user = DB::select("SELECT * FROM clients WHERE email=?", [$email]);
        $user = json_decode(json_encode($user[0]), true);

        $name = $user['name']." ".$user['surname'];
        $dateOfBirth = $user['date_of_birth'];

        $address = DB::select("SELECT * FROM clients_address WHERE User_Id=?", [$user["id_client"]]);
        $userAddress = json_decode(json_encode($address[0]), true);

        $address2 = DB::select("SELECT * FROM clients_add_address WHERE User_Id=?", [$user["id_client"]]);

        $userAddress2 = null;
        if($address2){
            $userAddress2 = json_decode(json_encode($address2[0]), true);
        }

        $client_cart = DB::select("SELECT * FROM clients_cart WHERE User_Id=?", [$user['id_client']]);
        if($client_cart){
            for ($i=0; $i < sizeof($client_cart); $i++) { 
                ${'client_cart'.$i} = json_decode(json_encode($client_cart[$i]), true); 
            }
            
            $price = 0;
            for ($i=0; $i < sizeof($client_cart); $i++) { 
                $price += ${'client_cart'.$i}['Price'];
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Logowanie</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/client/shoppingCart.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/client/order.css')}}" rel="stylesheet">

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

        <!-- login -->
        <section>
            <h1> Dane do zamówienia <i class="fas fa-shopping-basket text-secondary"></i></h1>

            <div id="products">
                <div class="blockData">


                    <p class="title">Imię i nazwisko</p>
                    <span id="name"> {{ $name }}</span> <span class="change" id="changeName" onclick="changeName(); changeNameOrder()"> Zmień </span>
        
                    <p class="title">Email</p>
                    <span id="email"> {{ $email }} </span> <span class="change" id="changeEmail" onclick="changeEmail(); changeEmailOrder()"> Zmień </span>
    
                    <p class="title">Telefon</p>
                    <span id="tel"> {{ $user['number'] }}</span> <span class="change" id="changeTel" onclick="changeTel(); changeTelOrder()"> Zmień </span>
        
                </div>

                <div class="blockData">
                    <div class="addressBlock col-md-7 col-sm-6 col-12">
                        <p class="title">Adres wysyłki</p>
                    @if ($userAddress["Street"])
                        <p id="address">
                            <span> {{ $userAddress["Street"]." ".$userAddress["Local_number"] }}</span><br>
                            <span> {{ $userAddress["Zip"]." ".$userAddress["Location"]}}</span><br>
                            <span> {{ $userAddress["Voivodeship"] }}</span><br>
                            <span> {{ $userAddress["Country"] }}</span><br>
                        </p>
                        <span class="change" id="changeAddress" onclick="changeAddress(); changeAddressOrder()"> Zmień </span>
                    @else
                        <span class="change" id="changeAddress" onclick="changeAddress(); changeAddressOrder()"> Dodaj </span>
                    @endif
                    </div>

                    <div id="changeTwoAddress">
                    <form method="POST" action="{{url('/zamowienie/zamiana_adresow')}}">
                        @csrf
                        <button type="submit" name="submit" style="border: none; background-color: inherit"> Zamień <br><i class="fas fa-exchange-alt"></i> </button>
                    </form>
                    </div>

                    <div class="addressBlock col-md-5 col-sm-6 col-12">
                        <p class="title">Alternatywny adres</p>
                @if ($userAddress2["Street"])

                    <p id="address">
                        <span> {{ $userAddress2["Street"]." ".$userAddress2["Local_Number"] }}</span><br>
                        <span> {{ $userAddress2["Zip"]." ".$userAddress2["Location"]}}</span><br>
                        <span> {{ $userAddress2["Voivodeship"] }}</span><br>
                        <span> {{ $userAddress2["Country"] }}</span><br>
                    </p>
                    <span class="change" id="changeAddress" onclick="changeAddress(); changeAddressOrder(); additionalAddress()"> Zmień </span>
                    @else
                    <span class="change" id="changeAddress" onclick="changeAddress(); changeAddressOrder(); additionalAddress()"> Dodaj </span>
                    @endif
                    </div>
                </div>

                <div class="blockData" id="transfers">
                    <h4> Wybór metody płatności </h4>
                        <p>
                            <input type="radio" id="payu" name="pay" value="payu">
                            <img src="https://wynalazca.tv/wp-content/uploads/2019/02/payu-logo.png" rel="payU">
                            <span>Szybki przelew </span>
                        </p>
                        <p>
                            <input type="radio" id="blik" name="pay" value="blik">
                            <img src="https://blikmobile.pl/wp-content/themes/blik/assets/images/logo.png" rel="blik">
                            <span>Szybka przelew Blik</span>
                        </p>
                        <p>
                            <input type="radio" id="visa" name="pay" value="visa">
                            <img src="https://icetrikes.com/wp-content/uploads/2019/11/payments.png" rel="Visa">
                            <span>Płatność kartą</span>
                        </p>
                </div>

            </div>

            <div id="summary">
                <h2> Płatność </h2>
                <hr>
                <p> Całkowity koszt <span id="prizeOfAll">{{$price}} zł</span></p>
                <hr>

            <form method="POST" action="{{url('/zamowienie/zakup')}}">
                @csrf
                <button id="buy" type="submit" style="cursor: pointer"> Zapłać </button>
            </form>
            </div>


            <!-- Formularz -->
            <div id="formChange">
                 <!-- Formularz -->

                <form id="changingForm" method="POST" action="{{ url('/zamowienie/zmiana_danych')}}" role="form">
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
            </div>

        </section>
    </div>

    <!-- Footer -->
    <footer class="pt-4 pb-4" id="footer">
        @include('footer')
    </footer>

    <script src="{{ asset('public/js/account/accountData.js')}}"></script>
    <script src="{{ asset('public/js/client/order.js')}}"></script>


</body>

</html>
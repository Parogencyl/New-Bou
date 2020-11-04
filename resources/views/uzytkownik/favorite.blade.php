<?

    $email = session()->get('email');
    if($email){
        $user = DB::select("SELECT * FROM clients WHERE email=?", [$email]);
        $user = json_decode(json_encode($user[0]), true);

        $client_favorite = DB::select("SELECT * FROM clients_favorite WHERE User_Id=?", [$user["id_client"]]);
        for ($i=0; $i < sizeof($client_favorite) ; $i++) { 
            ${'client_favorite'.$i} = json_decode(json_encode($client_favorite[$i]), true);
        }

        for ($i=0; $i < sizeof($client_favorite); $i++) { 
            ${'shoesInfo'.$i} = DB::select("SELECT * FROM Shoes WHERE Series=?", [${'client_favorite'.$i}["Series"]]);
            ${'shoesInfo'.$i} = json_decode(json_encode(${'shoesInfo'.$i}[0]), true);
        }

            // Pobranie pozostałych zdjęć
        for ($i=0; $i < sizeof($client_favorite); $i++) { 
            ${'id'.$i} = DB::select("SELECT * FROM Shoes_Images WHERE Shoes_Id=?", [${'shoesInfo'.$i}["Id_Shoes"]]);
            ${'id'.$i} = json_decode(json_encode(${'id'.$i}[0]), true);
            for ($j=2; $j < 5; $j++) { 
                ${'id'.$i.'_image'.$j} = json_decode(json_encode(${'id'.$i}['Image'.$j]), true);
            }

            ${'imagesNumber'.$i} = 4;
            if(${'id'.$i.'_image2'} == null){
                ${'imagesNumber'.$i} = 1;
            } else if (${'id'.$i.'_image3'} == null) {
                ${'imagesNumber'.$i} = 2;
            }else if (${'id'.$i.'_image4'} == null) {
                ${'imagesNumber'.$i} = 3;
            } 
        }
    }

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Logowanie</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/client/favorite.css')}}" rel="stylesheet">

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
            <h1> Ulubione produkty <i class="far fa-heart text-danger"></i> </h1>

            @if (session()->get('email'))

                @if ($client_favorite)
                @for ($i = 0; $i < sizeof($client_favorite); $i++)                
                <div class="blockData">
                    <div class="images">
                        <div class="imageShow">
                        <img src="{{asset(${'shoesInfo'.$i}['Image'])}}" alt="NewBou{{${'shoesInfo'.$i}['Series']}}">
                        </div>
                        <div class="imagesList">
                            <ul>
                                <li>
                                    <img src="{{asset(${'shoesInfo'.$i}['Image'])}}" id="bootImage1" alt="New Bou {{${'shoesInfo'.$i}['Series']}} - 1" onmouseover="hover(this)">
                                </li>
                                @if (${'imagesNumber'.$i} > 1)
                                <li>
                                    <img src="{{asset(${'id'.$i.'_image2'})}}" id="bootImage2" alt="New Bou {{${'shoesInfo'.$i}['Series']}} - 2" onmouseover="hover(this)">
                                </li>
                                @endif
            
                                @if (${'imagesNumber'.$i} > 2)
                                <li>
                                    <img src="{{asset(${'id'.$i.'_image3'})}}" id="bootImage3" alt="New Bou {{${'shoesInfo'.$i}['Series']}} - 3" onmouseover="hover(this)">
                                </li>
                                @endif
            
                                @if (${'imagesNumber'.$i} > 3)
                                <li>
                                    <img src="{{asset(${'id'.$i.'_image4'})}}" id="bootImage4" alt="New Bou {{${'shoesInfo'.$i}['Series']}} - 4" onmouseover="hover(this)">
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="information">
                        <h2 class="nameOfShoes"> New Bou {{${'shoesInfo'.$i}['Series']}} </h2>
                        @if(${'shoesInfo'.$i}['Price_new'] !=0)
                            <p class="priceOfShoes text-success"> {{ ${'shoesInfo'.$i}['Price_new'] }} zł <del> {{${'shoesInfo'.$i}['Price']}} zł</del> </p>
                        @else
                            <p class="priceOfShoes text-success"> {{ ${'shoesInfo'.$i}['Price'] }} zł</p>
                        @endif
                        <p class="description"> {{${'shoesInfo'.$i}['Description']}} </p>
                        <button class="buy bg-success"> <a href="{{ url('/obuwie', ${'shoesInfo'.$i}['Series'])}}"> Przejdź do aukcji </a> </button>

                    <form action="{{url('ulubione/nie_lubie')}}" method="POST">
                        @csrf
                        <input type="text" name="series" value="{{${('shoesInfo'.$i)}['Series']}}" style="display: none"/>
                        <button type="submit" class="favoriteButton"> Nie lubię <i class="fas fa-heart-broken"></i> </button>
                    </form>
                    </div>
                </div>
                @endfor
                @else

                <div id="empty" class=" text-center">
                    <p><i class="fas fa-shopping-bag"></i></p>
                    <p> Aktualnie na Twojej liście ulubionego obuwia nie znajduje się żaden z produktów. W celu dodania produktu do ulubionych należy przejść do aukcji z butami, wybrać obuwię, które Cię interesuje, a następnie wybrać opcję "Ulubione" </p>
                </div>

                @endif

            @else

            <div id="empty" class=" text-center">
                <p ><i class="fas fa-shopping-bag"></i></p>
                <p> W celu sprawdzenia zawartości ulubionych produktów, należy być zalogowanym. </p>
            </div>

            @endif
           
        </section>
    </div>
    <!-- Footer -->
    <footer class="pt-4 pb-4" id="footer">
        @include('footer')
    </footer>

    <script src="{{ asset('public/js/client/favorite.js')}}"></script>

</body>

</html>
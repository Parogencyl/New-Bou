<?
    $url = url()->current();

    if(strpos($url, 'http://www.bohun.vot.pl/newbou/obuwie/') !== false){
        $series = str_replace("http://www.bohun.vot.pl/newbou/obuwie/", "", $url);
    }

    if(strpos($url, 'http://bohun.vot.pl/newbou/obuwie/') !== false){
        $series = str_replace("http://bohun.vot.pl/newbou/obuwie/", "", $url);
    } 
    
    $price = DB::table("Shoes")->where("Series", "=", $series)->pluck('Price');
    $price = str_replace("[", "", $price);
    $price = str_replace("]", "", $price);

    $price_new = DB::table("Shoes")->where("Series", "=", $series)->pluck('Price_new');
    $price_new = str_replace("[", "", $price_new);
    $price_new = str_replace("]", "", $price_new);

    $image = DB::table("Shoes")->where("Series", "=", $series)->pluck('Image');
    $image = str_replace('"', "", $image);
    $image = str_replace('\\', "", $image);
    $image = str_replace("[", "", $image);
    $image = str_replace("]", "", $image);

    $category = DB::table("Shoes")->where("Series", "=", $series)->pluck('Category');
    $category = str_replace('"', "", $category);
    $category = str_replace('[', "", $category);
    $category = str_replace(']', "", $category);

    $seazon = DB::table("Shoes")->where("Series", "=", $series)->pluck('Seazon');
    $seazon = json_decode(json_encode($seazon[0]), true);

    $for_who = DB::table("Shoes")->where("Series", "=", $series)->pluck('For_who');
    $for_who = str_replace('"', "", $for_who);
    if($for_who == "[1]"){
        $for_who = "Mężczyzna";
    } else {
        $for_who = "Kobieta";
    }

    $availability = DB::table("Shoes")->where("Series", "=", $series)->pluck('Availability');
    
    $availability = str_replace('"', "", $availability);
    if($availability == "[1]"){
        $availability = "Dostępne";
    } else {
        $availability = "Niedostępne";
    }

    $description = DB::table("Shoes")->where("Series", "=", $series)->pluck('Description');
    $description = json_decode(json_encode($description[0]), true);

    // Pobranie pozostałych zdjęć
    $id = DB::table("Shoes")->where("Series", "=", $series)->pluck("Id_Shoes");

    $image2 = DB::table("Shoes_Images")->where("Shoes_Id", "=", $id)->pluck("Image2");
    $image2 = json_decode(json_encode($image2[0]), true);

    $image3 = DB::table("Shoes_Images")->where("Shoes_Id", "=", $id)->pluck("Image3");
    $image3 = json_decode(json_encode($image3[0]), true);

    $image4 = DB::table("Shoes_Images")->where("Shoes_Id", "=", $id)->pluck("Image4");
    $image4 = json_decode(json_encode($image4[0]), true);

    $imagesNumber = 4;

    if($image2 == null){
        $imagesNumber = 1;
    } else if ($image3 == null) {
        $imagesNumber = 2;
    }else if ($image4 == null) {
        $imagesNumber = 3;
    } 

    // Rozmiary obuwia
    $minSize = DB::table("Shoes")->where("Series", "=", $series)->pluck("Size_Min");
    $minSize = str_replace('[', "", $minSize);
    $minSize = str_replace(']', "", $minSize);
    $maxSize = DB::table("Shoes")->where("Series", "=", $series)->pluck("Size_Max");
    $maxSize = str_replace('[', "", $maxSize);
    $maxSize = str_replace(']', "", $maxSize);

    $opinions = DB::select("SELECT Opinion_stars, Opinion_description, Opinion_date, email FROM clients_shop_history 
    INNER JOIN clients ON id_client=User_Id WHERE Opinion='1' AND Series=? ORDER BY Opinion_date DESC LIMIT 10", [$series]);

    for ($i=0; $i < sizeof($opinions); $i++) { 
        ${'opinion'.$i} = json_decode(json_encode($opinions[$i]), true);   
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Obuwie</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/wyszukiwanie/boots.css')}}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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

    <!-- Center -->
    <section id="topSection">

        <div id="images">
            <div id="imagesList">
                <ul>
                    <li>
                        <img src="{{asset($image)}}" id="bootImage1" alt="New Bou {{$series}} - 1" onmouseover="hover(this)">
                    </li>
                    @if ($imagesNumber > 1)
                    <li>
                        <img src="{{asset($image2)}}" id="bootImage2" alt="New Bou {{$series}} - 2" onmouseover="hover(this)">
                    </li>
                    @endif

                    @if ($imagesNumber > 2)
                    <li>
                        <img src="{{asset($image3)}}" id="bootImage3" alt="New Bou {{$series}} - 3" onmouseover="hover(this)">
                    </li>
                    @endif

                    @if ($imagesNumber > 3)
                    <li>
                        <img src="{{asset($image4)}}" id="bootImage4" alt="New Bou {{$series}} - 4" onmouseover="hover(this)">
                    </li>
                    @endif
                    
                </ul>
            </div>
            <div id="imageShow">
            <img src="{{asset($image)}}" alt="New Bou {{$series}}">
            </div>
        </div>

        <div id="rightSide">
            <h2 id="nameOfShoes"> New Bou {{ $series }}</h2>

            @if($price_new !=0)
                <p id="priceOfShoes" class="text-success text-center font-weight-bold"> {{ $price_new }} zł <del> {{$price}} zł</del> </p>
            @else
                <p id="priceOfShoes" class="text-success text-center font-weight-bold"> {{ $price }} zł</p>
            @endif

            <p style="margin-bottom: 0;"> <strong> Rozmiar: </strong> </p>
            <div id="shoesSizes">
                @for ($i = $minSize; $i <= $maxSize; $i++)
                    <div class="col-sm-2 col-2" id="size{{$i}}" onclick="activeSize(this)"> {{$i}} </div>
                @endfor
                <!--<div class="col-sm-2 col-2 disable" id="size38" onclick="activeSize(this)"> 38 </div>-->
            </div>


            <form action="{{url('obuwie/dodaj_koszyk')}}" method="POST">
                @csrf
                <input type="text" name="size" id="inputSize" style="display: none">
                @if($price_new !=0)
                <input type="text" name="price" value="{{$price_new}}" style="display: none">
                @else
                <input type="text" name="price" value="{{$price}}" style="display: none">
                @endif

                <input type="text" name="series" value="{{$series}}" style="display: none">  
                <button type="submit" id="buy" class="bg-success"> Dodaj do koszyka <i class="fas fa-shopping-basket"></i></button>
            </form>

            @if ($message = Session::get('errorCart'))
                <div class="alert alert-danger alert-block mt-3">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('addedCart'))
                <div class="alert alert-success alert-block mt-3">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <form action="{{url('obuwie/dodaj_ulubione')}}" method="POST">
                @csrf
                <input type="text" name="series" value="{{$series}}" style="display: none">  
                <button type="submit" id="favoriteButton" class="text-body"> Ulubione <i class="far fa-heart"></i></button>
            </form>

            @if ($message = Session::get('errorFavorite'))
                <div class="alert alert-danger alert-block mt-1">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('addedFavorite'))
                <div class="alert alert-success alert-block mt-3">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
           
        </div>
    </section>

    <section id="bottomSection">

        <p id="descriptionName"> New Bou {{ $series }} </p>
        <p id="description"> {!! html_entity_decode($description) !!} </p>

        <ul id="information">
            <li>Kategoria: <span> {{ $category }}</span> </li>
            <li>Sezon: <span> {{ $seazon }}</span> </li>
            <li>Dla kogo: <span> {{ $for_who }}</span> </li>
            <li>Dostępność: <span> {{ $availability }}</span> </li>
            <li>Seria: <span> {{ $series }}</span> </li>
        </ul>

        <div id="opinion">
            <p id="opinionButton" onclick="opinionsOpen()">Opinie (<span id="opinionNumber">{{sizeof($opinions)}}</span>) <!--<span id="opinionStars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star"></i><i class="far fa-star"></i></span>--> <i class="fas fa-chevron-down" style="margin-left: 10px; font-size: 22px;"></i> </p>

            <div id="opinions">

                @for ($i = 0; $i < sizeof($opinions); $i++)

                    <div class="userOpinion">
                        <p class="opinionTitle"> <span class="opinionUserName"> 
                            {{ substr(${'opinion'.$i}['email'], 0, strpos (${'opinion'.$i}['email'], '@')) }} </span> 
                            <span class="opinionUserStars">
                                @if (${'opinion'.$i}['Opinion_stars'] == 1)
                                <span class="opinionStars"> <i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star">
                                </i><i class="far fa-star"></i><i class="far fa-star"></i> </span>
                                @endif
            
                                @if (${'opinion'.$i}['Opinion_stars'] == 2)
                                <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star">
                                </i><i class="far fa-star"></i><i class="far fa-star"></i> </span>
                                @endif
            
                                @if (${'opinion'.$i}['Opinion_stars'] == 3)
                                <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star">
                                </i><i class="far fa-star"></i><i class="far fa-star"></i> </span>
                                @endif
            
                                @if (${'opinion'.$i}['Opinion_stars'] == 4)
                                <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star">
                                </i><i class="fas fa-star"></i><i class="far fa-star"></i> </span>
                                @endif
            
                                @if (${'opinion'.$i}['Opinion_stars'] == 5)
                                <span class="opinionStars"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star">
                                </i><i class="fas fa-star"></i><i class="fas fa-star"></i> </span>
                                @endif 
                        </span> </p>
                    <p class="userOpinionText"> {{${'opinion'.$i}['Opinion_description']}}</p>
                    </div>
                
                @endfor
            
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="pt-4 pb-4">
        @include('footer')
    </footer>

</body>

<script src="{{ asset('public/js/searching/bootsScripts.js')}}">
</script>


</html>
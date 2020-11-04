<?
    $series = DB::table('Shoes')->pluck('Series');
    $price = DB::table('Shoes')->pluck('Price');
    $image = DB::table('Shoes')->pluck('Image');
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/main.css') }}">
    <link href="{{ asset('public/css/structure.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>


    <!-- Menu użytkownika -->
    <nav id="navbar1" class="text-right row pt-2">
        @include('nav1')
    </nav>

    <!-- Menu z kategoriami produktów -->
    <nav id="navbar2" class="text-center row bg-light text-center">
        @include('nav2')
    </nav>


    @if ($message = Session::get('bought'))
    <div class="alert alert-success alert-block mt-3 text-center">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <!-- Slider Advertisement -->
    <section>
        <div class="carousel slide container" data-ride="carousel" id="sliderAdvertisement">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#sliderAdvertisement" data-slide-to="0" class="active"></li>
                <li data-target="#sliderAdvertisement" data-slide-to="1"></li>
                <li data-target="#sliderAdvertisement" data-slide-to="2"></li>
            </ul>

            <!-- Images -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('public/graphics/main/photoSlide1.jpg')}}" alt="New Bou buty nowość">
                    <div class="carousel-caption">
                        <h3> Kolekcja jesienna </h3>
                        <h5> Hitem roku 2019 obuwie NB 220R</h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="public/graphics/main/photoSlide2.jpg" alt="New Bou buty nowość 2">
                    <div class="carousel-caption">
                        <h3> Stylowe i wygodne </h3>
                        <h5> W dobrej cenie świetna jakość</h5>
                    </div>
                </div>

                <div class="carousel-item ">
                    <img src="public/graphics/main/photoSlide3.jpg" alt="New Bou buty nowość 3">
                    <div class="carousel-caption">
                        <h3> Najlepsze obuwie sportowe </h3>
                        <h5> Aktualny hit NB 860</h5>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="carousel-control-prev" href="#sliderAdvertisement" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>

            <a class="carousel-control-next" href="#sliderAdvertisement" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>

    <!-- Slider Shoes -->
    <section>
        <div class="carousel carousel-multi-item slide container" data-ride="carousel" id="sliderShoes"
            data-interval="11000">
            <h2 class="font-weight-bold text-center mt-3"> Wybrane dla ciebie </h2>

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#sliderShoes" data-slide-to="0" class="active"></li>
                <li data-target="#sliderShoes" data-slide-to="1"></li>
                <li data-target="#sliderShoes" data-slide-to="2"></li>
            </ul>

            <!-- Images -->
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12 card border-0">
                            <a href="{{url('/obuwie',$series[0])}}" class="text-decoration-none">
                                <img class="card-img-top" src="{{$image[0]}}" alt="New Bou {{$series[0]}}">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark"> New Bou {{$series[0]}} </h5>
                                    <p class="card-text text-success text-center"> {{$price[0]}} zł</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12 card border-0 d-none d-sm-block">
                            <a href="{{url('/obuwie',$series[1])}}" class="text-decoration-none">
                                <img class="card-img-top" src="{{$image[1]}}" alt="New Bou {{$series[1]}}">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark"> New Bou {{$series[1]}} </h5>
                                    <p class="card-text text-success text-center"> {{$price[1]}} zł</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12 card border-0 d-none d-sm-block">
                            <a href="{{url('/obuwie',$series[2])}}" class="text-decoration-none">
                                <img class="card-img-top" src="{{$image[2]}}" alt="New Bou {{$series[2]}}">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark"> New Bou {{$series[2]}} </h5>
                                    <p class="card-text text-success text-center"> {{$price[2]}} zł</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12 card border-0 d-none d-sm-block">
                            <a href="{{url('/obuwie',$series[3])}}" class="text-decoration-none">
                                <img class="card-img-top" src="{{$image[3]}}" alt="New Bou {{$series[3]}}">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark"> New Bou {{$series[3]}} </h5>
                                    <p class="card-text text-success text-center"> {{$price[3]}} zł</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="carousel-item">

                    <div class="row">

                        <div class="col-md-3 col-sm-6 col-12 card border-0">
                            <a href="{{url('/obuwie',$series[4])}}" class="text-decoration-none">
                                <img class="card-img-top" src="{{$image[4]}}" alt="New Bou {{$series[4]}}">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark"> New Bou {{$series[4]}} </h5>
                                    <p class="card-text text-success text-center"> {{$price[4]}} zł</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12 card border-0 d-none d-sm-block">
                            <a href="{{url('/obuwie',$series[5])}}" class="text-decoration-none">
                                <img class="card-img-top" src="{{$image[5]}}" alt="New Bou {{$series[5]}}">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark"> New Bou {{$series[5]}} </h5>
                                    <p class="card-text text-success text-center"> {{$price[5]}} zł</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12 card border-0 d-none d-sm-block">
                            <a href="{{url('/obuwie',$series[6])}}" class="text-decoration-none">
                                <img class="card-img-top" src="{{$image[6]}}" alt="New Bou {{$series[6]}}">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark"> New Bou {{$series[6]}} </h5>
                                    <p class="card-text text-success text-center"> {{$price[6]}} zł</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12 card border-0 d-none d-sm-block">
                            <a href="{{url('/obuwie',$series[7])}}" class="text-decoration-none">
                                <img class="card-img-top" src="{{$image[7]}}" alt="New Bou {{$series[7]}}">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark"> New Bou {{$series[7]}} </h5>
                                    <p class="card-text text-success text-center"> {{$price[7]}} zł</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Controls -->
            <div class="controls-outside">
                <a id="carouselPrev" class="carousel-control-prev" href="#sliderShoes" data-slide="prev">
                    <i id="arrowPrev" class="fas fa-arrow-circle-left text-body"></i>
                </a>

                <a id="carouselNext" class="carousel-control-next" href="#sliderShoes" data-slide="next">
                    <i id="arrowNext" class="fas fa-arrow-circle-right text-body"></i>
                </a>
            </div>
        </div>
    </section>

    <div class="container" id="moreShoes">
        <a class="btn btn-outline-dark text-body mx-auto btn-block mt-2 mb-5 bg-light" href="{{url('/obuwie')}}"> Zobacz
            więcej </a>
    </div>

    <!-- Categories Men - Women -->
    <section id="categories">
        <div class="row m-0 p-0">

            <div class="col-xl-2 col-sm-1 categoriesBrake"></div>

            <div class="col-xl-4 col-sm-5 col-12 card border-0">
                <img class="card-img" src="public/graphics/main/men.jpg" alt="men shoes">
                <div class="card-img-overlay ">
                    <h3 class="card-title text-light text-center font-weight-bold "> Buty Męskie </h3>
                    <a href="obuwie?kategoria=Meskie"
                        class="btn btn-outline-dark bg-light text-body border-0 d-block mx-auto font-weight-bold ">
                        Zobacz kolekcję >> </a>
                </div>
            </div>

            <div class="col-xl-4 col-sm-5 col-12 card border-0 d-block">
                <img class="card-img" src="public/graphics/main/girl2.jpeg" alt="men shoes">
                <div class="card-img-overlay">
                    <h3 class="card-title text-light text-center font-weight-bold"> Buty Damskie </h3>
                    <a href="obuwie?kategoria=Damskie"
                        class="btn btn-outline-dark bg-light text-body border-0 d-block mx-auto font-weight-bold">
                        Zobacz kolekcję >> </a>
                </div>
            </div>

        </div>
    </section>

    <!-- Why this shop -->
    <section id="whyThisShop">
        <h2 class="font-weight-bold text-center mb-5"> Dlaczego zakupy na New Bou</h2>

        <div class="row p-0 m-0">
            <div class="col-sm-2 whyThisShopBreak"></div>
            <div class="col text-center text-danger">
                <i class="far fa-clock"></i>
                <p class="text-body font-weight-bold text-break"> Realizacja zamówienia w 24h </p>
            </div>

            <div class="col text-center text-danger">
                <i class="fas fa-truck"></i>
                <p class="text-body font-weight-bold text-break"> Darmowa wysyłka </p>
            </div>

            <div class="col text-center text-danger">
                <i class="fas fa-box-open"></i>
                <p class="text-body font-weight-bold text-break"> Darmowy zwrot </p>
            </div>
            <div class="col-sm-2 whyThisShopBreak"></div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="pt-4 pb-4 mt-5">
        @include('footer')
    </footer>

    <script src="{{ asset('public/js/indexJs.js')}}"></script>

</body>

</html>

<div class="col-md-1 col-lg-2 col-sm-0"></div>
<div id="logo" class="col-lg-2 col-md-4 col-12 text-center">
    <a href="{{ url('/')}}">
        <img src="{{ asset('public/graphics/main/logo2.jpg')}}" alt="logo new balance" height="60px">
    </a>
</div>
<div class="col-md-1 col-lg-2 col-sm-0"></div>
<div id="account" class="col-lg-2 col-md-2 col-4 text-center pt-1">
    <a href="{{ url('/admin/panel')}}" class="nav-link text-body">
        <i class="fas fa-cart-plus"></i> </br>
            Dodaj produkt
    </a>
</div>
<div id="favorite" class="col-lg-2 col-md-2 col-4 text-center pt-1">
    <a href="{{ url('/edytuj')}}" class="nav-link text-body">
        <i class="fas fa-edit"></i></br>
        Edytuj produkty
    </a>
</div>
<div id="basket" class="col-lg-2 col-md-2 col-4 text-center pt-1">
    <a href="{{ url('/obuwie')}}" class="nav-link text-body">
        <i class="fas fa-shopping-basket text-secondary"></i> </br>
        Sklep 
    </a>
</div>
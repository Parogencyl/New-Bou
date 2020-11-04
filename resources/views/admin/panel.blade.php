
<!DOCTYPE html>
<html lang="pl">

<head>
    <title>New Bou | Admin</title>
    <link rel="shortcut icon" href="{{ asset('public/graphics/icons8-sneakers-64.png') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/css/structure.css')}}" rel="stylesheet">

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

    <!-- Second menu -->
   <nav id="navbar2" class="text-right row pt-2">
    @include('nav2Admin')
    </nav>

    <section>
        <div class="container">
            <form
            action="{{ url('admin/panel/add')}}"
              method="POST"
              class="p-3 pl-5 pr-5 shadow-lg p-3 mb-5 mt-5 rounded border border-secondary bg-light"
              enctype="multipart/form-data"
            >
              <h2 class="mt-3 mb-5 text-center">
                <i class="fas fa-minus text-danger"></i> Dodaj produkt
                <i class="fas fa-minus text-danger"></i>
              </h2>

              @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
              @csrf
    
              <div class="form-group row">
                <label for="series" class="col-sm-2 col-form-label font-weight-bold"
                  >Seria:</label
                >
                <input
                  type="text"
                  class="form-control col-sm-10"
                  placeholder="R100"
                  id="series"
                  name="series"
                  required
                />
              </div>
    
              <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label font-weight-bold"
                  >Cena:</label
                >
                <input
                  type="text"
                  class="form-control col-sm-10"
                  placeholder="200"
                  id="price"
                  name="price"
                  required
                />
              </div>
    
              <div class="form-group row">
                <label
                  for="description"
                  class="col-sm-2 col-form-label font-weight-bold"
                  >Opis:</label
                >
                <textarea
                  type="text"
                  class="form-control col-sm-10"
                  placeholder="Opis produktu"
                  id="description"
                  name="description"
                  required
                ></textarea>
              </div>
    
              <div class="form-group row">
                <label
                  for="category"
                  class="col-sm-2 col-form-label font-weight-bold"
                  >Kategoria:</label
                >
                <select
                  class="form-control col-sm-10"
                  id="category"
                  name="category"
                  required
                >
                  <option value="">Wybierz kategorię</option>
                  <option value="Klasyczne">Klasyczne</option>
                  <option value="Sportowe">Sportowe</option>
                  <option value="Trampki">Trampki</option>
                  <option value="Klapki">Klapki</option>
                </select>
              </div>
    
              <div class="form-group row">
                <label for="seazon" class="col-sm-2 col-form-label font-weight-bold"
                  >Sezon:</label
                >
                <input
                  type="text"
                  class="form-control col-sm-10"
                  placeholder="Wiosna, Lato, Jesień"
                  id="seazon"
                  name="seazon"
                  required
                />
              </div>
    
              <div class="form-group row">
                <label
                  for="for_who"
                  class="col-sm-2 col-form-label font-weight-bold"
                  >Dla kogo:</label
                >
                <select
                  class="form-control col-sm-10"
                  id="for_who"
                  name="for_who"
                  required
                >
                  <option value="">Wybierz dla kogo</option>
                  <option value="1">Męskie</option>
                  <option value="0">Damskie</option>
                </select>
              </div>
    
              <div class="form-group row">
                <label for="size_min" class="col-sm-2 font-weight-bold"
                  >Najmniejszy rozmiar:</label
                >
                <input
                  type="number"
                  min="34"
                  max="47"
                  class="form-control col-sm-10"
                  placeholder="34-47"
                  id="size_min"
                  name="size_min"
                  required
                />
              </div>
    
              <div class="form-group row">
                <label for="size_max" class="col-sm-2 font-weight-bold"
                  >Największy rozmiar:</label
                >
                <input
                  type="number"
                  min="34"
                  max="47"
                  class="form-control col-sm-10"
                  placeholder="34-47"
                  id="size_max"
                  name="size_max"
                  required
                />
              </div>
    
              <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label font-weight-bold"
                  >Zdjęcie:</label
                >
                <div class="input-group col-sm-10" style="padding: 0">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01"
                      >Przeglądaj</span
                    >
                  </div>
                  <div class="custom-file">
                    <input
                      type="file"
                      class="custom-file-input"
                      id="image"
                      aria-describedby="inputGroupFileAddon01"
                      name="image"
                      required
                    />
                    <label class="custom-file-label" for="image"
                      >Wybierz zdjęcie...</label
                    >
                  </div>
                </div>
              </div>
    
              <h4 class="text-center">Dodatkowe zdjęcia</h4>
    
              <div class="form-group row">
                <label for="image2" class="col-sm-2 col-form-label font-weight-bold"
                  >Zdjęcie 2:</label
                >
                <div class="input-group col-sm-10" style="padding: 0">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon02"
                      >Przeglądaj</span
                    >
                  </div>
                  <div class="custom-file">
                    <input
                      type="file"
                      class="custom-file-input"
                      id="image2"
                      aria-describedby="inputGroupFileAddon02"
                      name="image2"
                    />
                    <label class="custom-file-label" for="image2"
                      >Wybierz zdjęcie...</label
                    >
                  </div>
                </div>
              </div>
    
              <div class="form-group row">
                <label for="image3" class="col-sm-2 col-form-label font-weight-bold"
                  >Zdjęcie 3:</label
                >
                <div class="input-group col-sm-10" style="padding: 0">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon03"
                      >Przeglądaj</span
                    >
                  </div>
                  <div class="custom-file">
                    <input
                      type="file"
                      class="custom-file-input"
                      id="image3"
                      aria-describedby="inputGroupFileAddon03"
                      name="image3"
                    />
                    <label class="custom-file-label" for="image3"
                      >Wybierz zdjęcie...</label
                    >
                  </div>
                </div>
              </div>
    
              <div class="form-group row">
                <label for="image4" class="col-sm-2 col-form-label font-weight-bold"
                  >Zdjęcie 4:</label
                >
                <div class="input-group col-sm-10" style="padding: 0">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon04"
                      >Przeglądaj</span
                    >
                  </div>
                  <div class="custom-file">
                    <input
                      type="file"
                      class="custom-file-input"
                      id="image4"
                      aria-describedby="inputGroupFileAddon04"
                      name="image4"
                    />
                    <label class="custom-file-label" for="image4"
                      >Wybierz zdjęcie...</label
                    >
                  </div>
                </div>
              </div>
    
              <button
                type="submit"
                class="btn btn-success btn-lg btn-block pr-4 pl-4 mb-3 mt-4"
                name="submit"
              >
                Dodaj
              </button>
            </form>

        </div>
    </section>



      </body>
    </html>
    
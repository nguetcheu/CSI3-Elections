<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @vite(['resources/js/app.js'])
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Participants</title>



  <!-- Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
  <div class="card uper">
    <div class="card-header text-center">
      Ajouter un participant
    </div>

    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div><br />
      @endif

      <div class="container">
        <div class="row">
          <div class="col-6">
            <form method="post" action="/participant_store">
              @csrf
              <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" name="nom" />
              </div>

              <label for="num_cni">Num_cni:</label>
              <input type="text" class="form-control" name="num_cni" />

              <label for="age">Age:</label>
              <input type="number" class="form-control" name="age" />

              <div class="form-group">
                <label for="sexe">Choisir le sexe </label>
                <select class="form-control" id="sexe" name="sexe">
                  <option>M</option>
                  <option>F</option>
                </select>
              </div>

              <div class="form-group">
                <label for="id_region">Region ID:</label>
                <select name="id_region" class="form-control">
                  @foreach(App\Models\Region::pluck('id') as $regionId)
                  <option value="{{ $regionId }}">{{ $regionId }}</option>
                  @endforeach
                </select>
              </div>

              <label for="login">Login:</label>
              <input type="text" class="form-control" name="login" />

              <label for="pwd">Mot de passe:</label>
              <input type="password" class="form-control" name="pwd" />

              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email" />

              <label for="tel">Télephone:</label>
              <input type="text" class="form-control" name="tel" />

              <button type="submit" class="btn btn-primary">Ajouter</button>
            </form><br>
          </div>
          <div class=" m-4 col-4">
            <h3 class="text-center">Veuillez remplir le formulaire</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <td>ID</td>
                  <td>Label</td>
                </tr>
              </thead>

              <tbody>
                @foreach($regions as $region)
                <tr>
                  <td>{{$region->id}}</td>
                  <td>{{$region->label}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <a href="/" class="btn btn-outline-danger"> Retourner a l'accueil </a>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
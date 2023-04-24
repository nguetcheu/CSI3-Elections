<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @vite(['resources/js/app.js'])
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Mise a jour d'un Participant</title>

  <!-- Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>

  <style>
    .uper {
      margin-top: 40px;
    }
  </style>

  <div class="card uper">
    <div class="card-header">
      Modifier un participant
    </div>
    <a href="/" class="text-end btn btn-outline-danger"> Retourner a l'accueil </a>

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

      <form method="post" action="/participant/{{ $participant->id }}">
        @csrf
        <div class="form-group">
          <label for="nom">Nom du participant:</label>
          @method('PUT')
          <input type="text" class="form-control" name="nom" value="{{$participant->nom}}" />

          <label for="num_cni">Num cni du participant:</label>
          @method('PUT')
          <input type="text" class="form-control" name="num_cni" value="{{$participant->num_cni}}" />

          <label for="age">Age du participant:</label>
          @method('PUT')
          <input type="text" class="form-control" name="age" value="{{$participant->age}}" />

          <label for="sexe">Sexe du participant:</label>
          @method('PUT')
          <select class="form-control" id="sexe" name="sexe" value="{{$participant->sexe}}">
            <option>M</option>
            <option>F</option>
          </select>


          <label for="id_region">Id region:</label>
          @method('PUT')
          <select name="id_region" class="form-control">
            @foreach(App\Models\Region::pluck('id') as $regionId)
            <option value="{{ $regionId }}">{{ $regionId }}</option>
            @endforeach
          </select>

          <label for="login">Login du participant:</label>
          @method('PUT')
          <input type="text" class="form-control" name="login" value="{{$participant->login}}" />

          <label for="pwd">Password du participant:</label>
          @method('PUT')
          <input type="password" class="form-control" name="pwd" value="{{$participant->pwd}}" />

          <label for="email">Email du participant:</label>
          @method('PUT')
          <input type="text" class="form-control" name="email" value="{{$participant->email}}" />

          <label for="tel">Télephone du participant:</label>
          @method('PUT')
          <input type="text" class="form-control" name="tel" value="{{$participant->tel}}" />
        </div>
        <button type="submit" value="update" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
  </div>
</body>

</html>
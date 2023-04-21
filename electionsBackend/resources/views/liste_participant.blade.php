<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @vite(['resources/js/app.js'])
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Liste des participants</title>



  <!-- Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<body>

  <h1> Liste des participants</h1>

  <div class="uper">

    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
    @endif

    <table class="table table-striped">

      <thead>
        <tr>
          <td>ID</td>
          <td>nom</td>
          <td>num_cni</td>
          <td>age</td>
          <td>sexe</td>
          <td>id_region</td>
          <td>login</td>
          <td>password</td>
          <td>email</td>
          <td>télephone</td>
        </tr>
      </thead>

      <tbody>
        @foreach($participants as $participant)
        <tr>
          <td>{{$participant->id}}</td>
          <td>{{$participant->nom}}</td>
          <td>{{$participant->num_cni}}</td>
          <td>{{$participant->age}}</td>
          <td>{{$participant->sexe}}</td>
          <td>{{$participant->id_region}}</td>
          <td>{{$participant->login}}</td>
          <td>{{$participant->pwd}}</td>
          <td>{{$participant->email}}</td>
          <td>{{$participant->tel}}</td>
          <td>
            @method('DELETE')
            <a href="/participant_delete/{{$participant->id}}" class="btn btn-outline-danger">Supprimer</a>

            <a href="/form_update_participant/{{$participant ->id}}" class="btn btn-outline-primary">Editer</a>
          </td>
        </tr>
        @endforeach
      </tbody>
      <a href="/" class="btn btn-outline-primary"> Accueil </a>
    </table>
    <div>
</body>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Election</title>



    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
    <h1 class="mt-4 text-center alert alert-success"> Election Laravel CSI3 </h1>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <a href="/regions_create" class="btn btn-outline-primary"> Créer une région </a>
                <a href="/region_index" class="btn btn-outline-danger"> Lister les regions </a>
            </div>
            <div class="col-6">
                <a href="/participant_create" class="btn btn-outline-secondary"> Créer un participant </a>
                <a href="/participant_index" class="btn btn-outline-danger"> Lister les participants </a>
            </div>
        </div>
    </div>
</body>

</html>
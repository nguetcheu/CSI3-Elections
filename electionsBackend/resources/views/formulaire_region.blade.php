<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>REGIONS</title>



    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container" >
        <form class="row g-3" style="border: 2px solid green; border: radius 5px;" action="/region_store" method="post" >
        @csrf   
        <div class="col-auto">
                <div class="mb-3">

                    <label for="exampleFormControlInput1" class="form-label">Ajout de region</label>
                    <input type="text" class="form-floating mb-3" id="titre" placeholder="Centre">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">OK</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
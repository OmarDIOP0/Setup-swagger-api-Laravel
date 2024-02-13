<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <form action="/api/users" method="POST">
        @csrf
          <div>
            <div class="input-group flex-nowrap mb-3 mt-3 w-25">
                <span for="name" class="input-group-text">Nom :</span>
                <input type="text" id="name" name="name" class="form-control" placeholder="Saisir le prenom et nom">
            </div>
            <div class="input-group flex-nowrap mb-3 w-25">
                <span class="input-group-text">Email :</span>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="input-group flex-nowrap mb-3 w-25">
                <span class="input-group-text">Password</span>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>



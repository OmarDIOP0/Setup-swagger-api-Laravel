<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel-OpenAPI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    @if(Session::has('success'))
    <div class="bg-primary border border-red-400 text-white px-4 py-4 rounded relative" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    @if(Session::has('fail'))
    <div class="bg-danger border border-red-400 text-red-700 px-4 py-4 rounded relative" role="alert">
        {{ Session::get('fail') }}
    </div>
    @endif
    <form action="/api/users" method="POST">
        @csrf
          <div>
            <div class="input-group flex-nowrap mb-3 mt-3 w-25">
                <span for="name" class="input-group-text">Nom :</span>
                <input type="text" id="name" name="name" class="form-control" placeholder="Saisir le prenom et nom">
            </div>
            <div class="input-group flex-nowrap mb-3 w-25">
                <span class="input-group-text">Email :</span>
                <input type="email" id="email" name="email" class="form-control" placeholder="Saisir votre email">
            </div>
            <div class="input-group flex-nowrap mb-3 w-25">
                <span class="input-group-text">Password</span>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
    <div class="mt-3">
        <h5>Nbre: <strong class="text-primary">{{$nbre}}</strong></h5>
    </div>
        <div class="mt-2 w-50">
            @if(!empty($users))
            <table class="table table-striped-columns table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><button class="btn btn-danger"><a href="/delete/{{$user->id}}" style="text-decoration: none;color:white" onclick="return confirm('Etes vous sur ??')">DELETE</a></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h3>La liste est vide</h3>
            @endif
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>



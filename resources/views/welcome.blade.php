<form action="/users" method="POST">
    @csrf
    <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email">
    </div>
    <div class="">
        <label for="password">Password</label>
        <input type="password" name="password" id="">
    </div>
    <!-- Autres champs de l'utilisateur... -->
    <button type="submit" style="margin-top:10px;color:black;background-color:aqua;border:none;padding:10px;cursor: pointer;">Créer utilisateur</button>
</form>

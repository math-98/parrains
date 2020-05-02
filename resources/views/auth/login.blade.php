@extends("shared.center")

@section("title", "Connexion")

@section("content")
    <form method="post" target="">
        @csrf
        <div class="form-group">
            <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email"  placeholder="Addresse email" required="required" autofocus="autofocus">
                <label for="inputEmail">Adresse email</label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Mot de passe" required="required">
                <label for="inputPassword">Mot de passe</label>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember">
                    Se souvenir de moi
                </label>
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-block" value="Connexion"/>
    </form>
@endsection

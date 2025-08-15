<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'utilisateur</title>
</head>
<body>
    <form id="editUserForm" method="POST" action="">
        @csrf
        @method('PATCH')
        <input type="hidden" name="user_id" id="editUserId" value="{{ $user->id }}">
        <div>
            <label for="edit_name">Nom</label>
            <input type="text" name="name" id="edit_name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label for="edit_email">Email</label>
            <input type="email" name="email" id="edit_email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label for="edit_password">Mot de passe</label>
            <input type="password" name="password" id="edit_password">
        </div>
        <button type="submit">Mettre à jour</button>
        <button type="button" onclick="closeModal()">Annuler</button>
    </form>
</body>
</html>
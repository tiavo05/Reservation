<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-950 text-white flex items-center justify-center min-h-screen">

<!-- BACKGROUND -->
<div class="absolute inset-0">
    <div class="absolute top-10 left-10 w-72 h-72 bg-violet-600 blur-3xl opacity-30 rounded-full"></div>
    <div class="absolute bottom-10 right-10 w-72 h-72 bg-pink-600 blur-3xl opacity-30 rounded-full"></div>
</div>

<!-- CARD -->
<div class="relative w-full max-w-md p-8 rounded-2xl bg-white/5 border border-white/10 backdrop-blur">

    <h2 class="text-3xl font-bold text-center mb-6">
        Inscription
    </h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <label>Nom</label>
            <input type="text" name="name"
                   class="w-full mt-1 p-3 rounded-lg bg-black/30 border border-white/10 focus:ring-2 focus:ring-violet-500">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email"
                   class="w-full mt-1 p-3 rounded-lg bg-black/30 border border-white/10 focus:ring-2 focus:ring-violet-500">
        </div>

        <div>
            <label>Mot de passe</label>
            <input type="password" name="password"
                   class="w-full mt-1 p-3 rounded-lg bg-black/30 border border-white/10 focus:ring-2 focus:ring-violet-500">
        </div>

        <div>
            <label>Confirmer mot de passe</label>
            <input type="password" name="password_confirmation"
                   class="w-full mt-1 p-3 rounded-lg bg-black/30 border border-white/10 focus:ring-2 focus:ring-violet-500">
        </div>

        <button class="w-full py-3 rounded-lg bg-gradient-to-r from-violet-600 to-pink-500 font-semibold hover:opacity-90">
            Créer un compte
        </button>
    </form>

    <p class="text-center text-gray-400 mt-4">
        Déjà un compte ?
        <a href="/login" class="text-pink-400">Connexion</a>
    </p>

</div>

</body>
</html>
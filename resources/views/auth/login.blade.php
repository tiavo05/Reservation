<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-950 text-white flex items-center justify-center min-h-screen">

<!-- BACKGROUND EFFECT -->
<div class="absolute inset-0">
    <div class="absolute top-20 left-20 w-72 h-72 bg-violet-600 blur-3xl opacity-30 rounded-full"></div>
    <div class="absolute bottom-20 right-20 w-72 h-72 bg-pink-600 blur-3xl opacity-30 rounded-full"></div>
</div>

<!-- LOGIN CARD -->
<div class="relative w-full max-w-md p-8 rounded-2xl bg-white/5 border border-white/10 backdrop-blur">

    <h2 class="text-3xl font-bold text-center mb-6">
        Connexion
    </h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

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

        <button class="w-full py-3 rounded-lg bg-gradient-to-r from-violet-600 to-pink-500 font-semibold hover:opacity-90">
            Se connecter
        </button>
    </form>

    <p class="text-center text-gray-400 mt-4">
        Pas de compte ?
        <a href="/register" class="text-violet-400">Inscription</a>
    </p>

</div>

</body>
</html>
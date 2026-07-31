<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppReservation</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900 dark:bg-gray-950 dark:text-white transition-colors duration-300">

<!-- NAVBAR -->
<nav class="fixed w-full z-50 backdrop-blur bg-white/70 dark:bg-black/40 border-b border-gray-200 dark:border-white/10">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-2xl font-bold bg-gradient-to-r from-pink-500 to-violet-500 bg-clip-text text-transparent">
            AppReservation
        </h1>

       

        <div class="space-x-6">
        <button id="theme-toggle"
            class="px-3 py-2 rounded bg-gray-200 dark:bg-gray-700 dark:text-white text-gray-900">
            🌙 / ☀️
        </button>
            <a href="/login" class="text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white">
                Connexion
            </a>

            <a href="/register"
               class="px-4 py-2 rounded-lg bg-gradient-to-r from-violet-600 to-pink-500 hover:opacity-90 text-white">
                Inscription
            </a>
        </div>

    </div>
</nav>

<!-- HERO -->
<section class="min-h-screen flex items-center justify-center relative overflow-hidden bg-white dark:bg-gray-950">

    <div class="absolute inset-0">
        <div class="absolute top-20 left-20 w-72 h-72 bg-violet-300 dark:bg-violet-600 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute bottom-20 right-20 w-72 h-72 bg-pink-300 dark:bg-pink-600 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="relative text-center px-6 max-w-4xl">

        <h2 class="text-5xl md:text-6xl font-bold leading-tight text-gray-900 dark:text-white">
            Réservez vos
            <span class="bg-gradient-to-r from-violet-500 to-pink-500 bg-clip-text text-transparent">
                rendez-vous
            </span>
            en toute simplicité
        </h2>

        <p class="mt-6 text-gray-600 dark:text-gray-300 text-lg">
            Une plateforme moderne pour gérer vos réservations, notifications et planning en temps réel.
        </p>

        <div class="mt-10 flex justify-center gap-4">
             @if(Auth::check())

                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.reservations.index') }}">
                        Accéder au tableau de bord
                    </a>
                @else
                    <a href="{{ route('dashboard') }}">
                        Accéder au tableau de bord
                    </a>
                @endif

                @else

                <a href="{{ route('register') }}" class="px-6 py-3 rounded-xl border border-gray-300 dark:border-white/20 hover:bg-gray-100 dark:hover:bg-white/10">
                    Commencer
                </a>

            @endif

            <a href="#about"
               class="px-6 py-3 rounded-xl border border-gray-300 dark:border-white/20 hover:bg-gray-100 dark:hover:bg-white/10">
                En savoir plus
            </a>
        </div>

    </div>

</section>

<!-- ABOUT -->
<section id="about" class="py-24 bg-gray-100 dark:bg-gray-900">

    <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        <div>
            <h3 class="text-4xl font-bold mb-6 text-gray-900 dark:text-white">
                Une gestion intelligente des rendez-vous
            </h3>

            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                AppReservation simplifie la prise de rendez-vous pour les utilisateurs
                et donne aux administrateurs un contrôle total sur les demandes.
            </p>

            <p class="mt-4 text-gray-600 dark:text-gray-400">
                Tout est automatisé : réservation, validation, notifications.
            </p>
        </div>

        <div class="grid gap-4">

            <div class="p-6 rounded-xl bg-white dark:bg-white/5 border border-gray-200 dark:border-white/10 hover:bg-gray-200 dark:hover:bg-gray-100 dark:hover:text-black">
                Rapide et simple
            </div>

            <div class="p-6 rounded-xl bg-white dark:bg-white/5 border border-gray-200 dark:border-white/10 hover:bg-gray-200 dark:hover:bg-gray-100 dark:hover:text-black">
                Notifications automatiques
            </div>

            <div class="p-6 rounded-xl bg-white dark:bg-white/5 border border-gray-200 dark:border-white/10 hover:bg-gray-200 dark:hover:bg-gray-100 dark:hover:text-black">
                Dashboard admin puissant
            </div>

        </div>

    </div>

</section>

<!-- FEATURES -->
<section class="py-24 bg-white dark:bg-black">

    <div class="container mx-auto px-6 text-center">

        <h3 class="text-4xl font-bold mb-12 text-gray-900 dark:text-white">
            Fonctionnalités
        </h3>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="p-6 rounded-xl bg-gray-100 dark:bg-white/5 border border-gray-200 dark:border-white/10 hover:scale-105 transition">
                <h4 class="text-xl font-semibold mt-3 text-gray-900 dark:text-white">Réservation simple</h4>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Quelques clics suffisent pour réserver.</p>
            </div>

            <div class="p-6 rounded-xl bg-gray-100 dark:bg-white/5 border border-gray-200 dark:border-white/10 hover:scale-105 transition">
                <h4 class="text-xl font-semibold mt-3 text-gray-900 dark:text-white">Gestion admin</h4>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Accepter ou refuser facilement.</p>
            </div>

            <div class="p-6 rounded-xl bg-gray-100 dark:bg-white/5 border border-gray-200 dark:border-white/10 hover:scale-105 transition">
                <h4 class="text-xl font-semibold mt-3 text-gray-900 dark:text-white">Notifications</h4>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Email et alertes en temps réel.</p>
            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="py-24 bg-gradient-to-r from-violet-600 to-pink-500 text-center text-white">

    <h3 class="text-4xl font-bold">
        Prêt à commencer ?
    </h3>

    <p class="mt-4 text-white/80">
        Crée ton compte et gère tes rendez-vous facilement.
    </p>

    <a href="/register"
       class="mt-8 inline-block px-8 py-3 bg-black dark:bg-white dark:text-black text-white rounded-xl font-semibold">
        S'inscrire maintenant
    </a>

</section>

<!-- FOOTER -->
<footer class="py-10 text-center text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-black">
    © 2026 AppReservation - Tous droits réservés
</footer>

</body>
</html>
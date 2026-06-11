<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Tableau de bord
        </h2>
    </x-slot>

    <div class="p-6 space-y-6">

        <!-- NOTIFICATIONS -->
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-bold mb-4 text-gray-800">
                🔔 Notifications récentes
            </h3>

            <div class="space-y-2">
                @forelse(auth()->user()->notifications as $notification)
                    <div class="p-4 rounded-lg border-l-4 border-purple-500 bg-purple-50">
                        <p class="text-gray-700">
                            {{ $notification->data['message'] ?? 'Notification' }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500">Aucune notification pour le moment</p>
                @endforelse
            </div>
        </div>

        <!-- ADMIN -->
        @if(auth()->user()->role === 'admin')

            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white p-6 rounded-xl shadow">
                <h1 class="text-xl font-bold">
                    🛠 Espace Administrateur
                </h1>

                <p class="mt-2 opacity-90">
                    Gérer les réservations et les utilisateurs en temps réel
                </p>

                <a href="{{ route('admin.reservations.index') }}"
                   class="inline-block mt-4 bg-white text-purple-700 px-5 py-2 rounded-lg font-semibold hover:bg-gray-100">
                    Voir les réservations
                </a>
            </div>

        @else

            <!-- ACTIONS -->
            <div class="grid md:grid-cols-2 gap-6">

                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="font-bold text-lg">📅 Nouvelle réservation</h3>
                    <p class="text-gray-600 mt-2">
                        Créez un rendez-vous rapidement
                    </p>

                    <a href="{{ route('reservations.create') }}"
                       class="inline-block mt-4 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        Réserver
                    </a>
                </div>

                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h3 class="font-bold text-lg">📋 Mes réservations</h3>
                    <p class="text-gray-600 mt-2">
                        Suivi de vos demandes
                    </p>

                    <a href="{{ route('reservations.index') }}"
                       class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Consulter
                    </a>
                </div>

            </div>

            <!-- STATS -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-bold mb-4">
                    📊 Statistiques
                </h3>

                <div class="grid grid-cols-3 gap-4">

                    <div class="bg-yellow-50 p-4 rounded-lg text-center">
                        <p class="text-sm text-gray-600">En attente</p>
                        <p class="text-2xl font-bold text-yellow-600">
                            {{ auth()->user()->reservations()->where('statut','en_attente')->count() }}
                        </p>
                    </div>

                    <div class="bg-green-50 p-4 rounded-lg text-center">
                        <p class="text-sm text-gray-600">Acceptées</p>
                        <p class="text-2xl font-bold text-green-600">
                            {{ auth()->user()->reservations()->where('statut','accepte')->count() }}
                        </p>
                    </div>

                    <div class="bg-red-50 p-4 rounded-lg text-center">
                        <p class="text-sm text-gray-600">Refusées</p>
                        <p class="text-2xl font-bold text-red-600">
                            {{ auth()->user()->reservations()->where('statut','refuse')->count() }}
                        </p>
                    </div>

                </div>
            </div>

        @endif

    </div>
</x-app-layout>
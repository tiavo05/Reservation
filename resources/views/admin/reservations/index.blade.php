<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Admin - Gestion des Réservations
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left">

                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Heure</th>
                        <th class="px-4 py-3">Statut</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @foreach($reservations as $r)
                        <tr class="hover:bg-gray-50">

                            <td class="px-4 py-3 font-medium text-gray-900">
                                {{ $r->nom }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $r->date_rdv }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $r->heure_rdv }}
                            </td>

                            <td class="px-4 py-3">
                                @if($r->statut == 'en_attente')
                                    <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                                        En attente
                                    </span>
                                @elseif($r->statut == 'accepte')
                                    <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                                        Accepté
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-700">
                                        Refusé
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3 flex gap-2">

                                <form method="POST" action="{{ route('admin.reservations.accepter', $r) }}">
                                    @csrf
                                    <button class="px-3 py-1 text-xs bg-green-500 text-white rounded hover:bg-green-700">
                                         Accepter
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('admin.reservations.refuser', $r) }}">
                                    @csrf
                                    <button class="px-3 py-1 text-xs bg-red-500 text-white rounded hover:bg-red-700">
                                         Refuser
                                    </button>
                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

    </div>
</x-app-layout>
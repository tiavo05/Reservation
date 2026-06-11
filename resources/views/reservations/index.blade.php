<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Mes réservations
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto">

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('reservations.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded">
                Nouvelle réservation
            </a>

            <table class="w-full mt-6 border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-3">Date</th>
                        <th class="p-3">Heure</th>
                        <th class="p-3">Motif</th>
                        <th class="p-3">Statut</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($reservations as $reservation)
                        <tr class="border-t">
                            <td class="p-3">
                                {{ $reservation->date_rdv }}
                            </td>

                            <td class="p-3">
                                {{ $reservation->heure_rdv }}
                            </td>

                            <td class="p-3">
                                {{ $reservation->motif }}
                            </td>

                            <td class="p-3">
                                {{ $reservation->statut }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-4">
                                Aucune réservation trouvée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
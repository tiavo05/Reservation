<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nouvelle réservation
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded-lg shadow">

                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Nom</label>
                        <input type="text"
                               name="nom"
                               class="w-full border rounded-lg p-3"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Email</label>
                        <input type="email"
                               name="email"
                               class="w-full border rounded-lg p-3"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Téléphone</label>
                        <input type="text"
                               name="telephone"
                               class="w-full border rounded-lg p-3"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">
                            Date du rendez-vous
                        </label>
                        <input type="date"
                               name="date_rdv"
                               class="w-full border rounded-lg p-3"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">
                            Heure du rendez-vous
                        </label>
                        <input type="time"
                               name="heure_rdv"
                               class="w-full border rounded-lg p-3"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-2">
                            Motif
                        </label>
                        <textarea name="motif"
                                  rows="4"
                                  class="w-full border rounded-lg p-3"
                                  required>
                        </textarea>
                    </div>

                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg">
                        Réserver
                    </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
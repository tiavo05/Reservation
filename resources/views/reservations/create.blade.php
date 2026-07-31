<x-app-layout>
    <x-slot name="header">
    <div class="text-center mb-10">

        <h1 class="text-4xl font-bold 
            bg-gradient-to-r from-violet-500 to-pink-500 
            bg-clip-text text-transparent">
            Réserver un rendez-vous
        </h1>

        <p class="mt-3 text-gray-600 dark:text-gray-400">

            Remplissez le formulaire pour envoyer votre demande.

        </p>
    </div>
    </x-slot>

    <div class="py-8">
    <div class="bg-white/80 dark:bg-white/5 
        backdrop-blur-xl 
        border border-gray-200 dark:border-white/10
        rounded-3xl shadow-xl p-8">

            <div class="bg-white p-6 rounded-lg shadow">

                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium mb-2 ">Nom</label>
                        <input 
                            type="text"
                            name="nom"
                            value="{{ old('nom') }}"
                            placeholder="Votre nom"
                            class="w-full rounded-xl 
                                bg-gray-100 dark:bg-gray-900
                                border-gray-300 dark:border-gray-700
                                focus:ring-violet-500">
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
                    @error('heure_rdv')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

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
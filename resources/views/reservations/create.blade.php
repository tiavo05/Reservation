<x-app-layout>

    <x-slot name="header">

        <div class="text-center mb-8">

            <h1 class="text-4xl font-bold 
            bg-gradient-to-r from-violet-500 to-pink-500 
            bg-clip-text text-transparent">

                Réserver un rendez-vous

            </h1>


            <p class="mt-3 text-gray-600 dark:text-gray-400">

                Choisissez une date et un créneau disponible.

            </p>

        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-3xl mx-auto 
        bg-white/80 dark:bg-white/5
        backdrop-blur-xl
        border border-gray-200 dark:border-white/10
        rounded-3xl
        shadow-xl
        p-8">

        <form action="{{ route('reservations.store') }}" method="POST">
         @csrf

            <!-- NOM -->

            <div class="mb-5">
                <label class="block font-semibold mb-2">
                     Nom
                 </label>

                <input 
                type="text"
                name="nom"
                value="{{ Auth::user()->name }}"
                class="w-full rounded-xl
                bg-gray-100 dark:bg-gray-900
                border-gray-300
                focus:ring-violet-500"
                required>
            </div>

            <!-- EMAIL -->

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Email
                </label>
                <input 
                type="email"
                name="email"
                value="{{ Auth::user()->email }}"
                class="w-full rounded-xl
                bg-gray-100 dark:bg-gray-900
                border-gray-300"
                required>
            </div>

            <!-- TELEPHONE -->

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Téléphone
                </label>
                <input 
                type="text"
                name="telephone"
                placeholder="034 xx xxx xx"
                class="w-full rounded-xl
                bg-gray-100 dark:bg-gray-900
                border-gray-300"
                required>

            </div>

            <!-- DATE -->

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Choisir une date
                </label>
                <input 
                type="date"
                name="date_rdv"
                value="{{ date('Y-m-d') }}"
                class="w-full rounded-xl
                bg-gray-100 dark:bg-gray-900
                border-gray-300"
                required>

            </div>

            <!-- CRENEAUX -->

            <div class="mb-5">
                <label class="block font-semibold mb-3">
                    Créneaux disponibles
                </label>

              <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                @foreach($disponibilites as $disponibilite)

                <label class="cursor-pointer">
                    <input 
                    type="radio"
                    name="heure_rdv"
                    value="{{ $disponibilite->heure }}"
                    class="hidden peer"
                    required>

                    <div class="
                        p-4
                        text-center
                        rounded-xl
                        border
                        border-gray-300
                        dark:border-gray-700
                        peer-checked:bg-violet-600
                        peer-checked:text-white
                        hover:bg-violet-100
                        dark:hover:bg-violet-900
                        transition">


                        {{ \Carbon\Carbon::parse($disponibilite->heure)->format('H:i') }}

                    </div>
                </label>

                @endforeach
              </div>
            </div>

            <!-- MOTIF -->

            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Motif du rendez-vous
                </label>

                <textarea
                name="motif"
                rows="4"
                class="w-full rounded-xl
                bg-gray-100 dark:bg-gray-900
                border-gray-300"
                placeholder="Expliquez la raison du rendez-vous..."
                required></textarea>
            </div>

            <button 
                type="submit"
                class="
                w-full
                py-3
                rounded-xl
                bg-gradient-to-r
                from-violet-600
                to-pink-500
                text-white
                font-semibold
                shadow-lg
                hover:opacity-90
                transition">

                Confirmer la réservation
            </button>
        </form>
      </div>

    </div>

</x-app-layout>
<x-app-layout>

<div class="min-h-screen bg-gray-100 dark:bg-gray-950 p-6">


<!-- HEADER -->

<div class="flex justify-between items-center mb-8">


    <div>

        <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
        Mes réservations
        </h1>


        <p class="text-gray-600 dark:text-gray-400 mt-2">
        Gérez vos demandes de rendez-vous facilement.
        </p>


    </div>



    <a href="{{ route('reservations.create') }}"
        class="px-6 py-3 rounded-xl
        bg-gradient-to-r from-violet-600 to-pink-500
        text-white font-semibold
        shadow-lg hover:opacity-90">

         + Nouveau rendez-vous

    </a>


    </div>





    <!-- CARTE TABLEAU -->


    <div class="
        bg-white/80 dark:bg-white/5
        backdrop-blur
        border border-gray-200 dark:border-white/10
        rounded-2xl
        shadow-xl
        p-6
    ">



    <div class="flex justify-between mb-6">


            <h2 class="text-2xl font-bold dark:text-white">

            Historique

            </h2>



            <input 
                type="text"
                placeholder="Rechercher..."
                class="
                px-4 py-2
                rounded-xl
                bg-gray-100
                dark:bg-gray-800
                border-none
                "
            />


        </div>





        <div class="overflow-x-auto">


            <table class="w-full">


                    <thead>

                        <tr class="text-left text-gray-500 dark:text-gray-400">


                            <th class="p-4">
                                Date
                            </th>


                            <th class="p-4">
                                Heure
                            </th>


                            <th class="p-4">
                                Motif
                            </th>


                            <th class="p-4">
                                Statut
                            </th>


                            <th class="p-4">
                                Actions
                            </th>

                        </tr>


                    </thead>

                <tbody>


                    @forelse($reservations as $reservation)


                    <tr class="
                        border-t
                        border-gray-200
                        dark:border-white/10
                        hover:bg-gray-100
                        dark:hover:bg-white/5
                        transition
                        ">


                        <td class="p-4 text-gray-700 dark:text-white">

                            {{ $reservation->date_rdv }}

                        </td>

                        <td class="p-4 text-gray-700 dark:text-white">

                            {{ $reservation->heure_rdv }}

                        </td>

                        <td class="p-4 text-gray-700 dark:text-white">

                            {{ $reservation->motif }}

                        </td>

                        <td class="p-4">


                            @if($reservation->statut == 'accepte')


                            <span class="
                                px-4 py-2 rounded-full
                                bg-green-100 text-green-700
                                ">

                                ✓ Accepté

                            </span>

                            @elseif($reservation->statut == 'refuse')


                            <span class="
                                px-4 py-2 rounded-full
                                bg-red-100 text-red-700
                                ">

                            ✕ Refusé

                            </span>
                            @else

                            <span class="
                                px-4 py-2 rounded-full
                                bg-yellow-100 text-yellow-700
                                ">
                                ⌛ En attente

                            </span>

                            @endif


                        </td>

                        <td class="p-4">


                            <a href="#"
                                class="
                                    text-violet-600
                                    hover:text-pink-500
                                    font-semibold
                                ">

                                Voir
                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5"
                            class="p-6 text-center text-gray-500">
                            Aucune réservation trouvée.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>
<x-app-layout>

<div class="space-y-8">


    <!-- HEADER -->
    <div class="flex justify-between items-center">

        <div>
            <h1 class="text-4xl font-bold text-gray-100 dark:text-white">
                Bonjour {{ Auth::user()->name }} 
            </h1>

            <p class="text-gray-500 dark:text-gray-400 mt-2">
                Gérez facilement vos rendez-vous depuis votre espace personnel.
            </p>
        </div>


        <a href="{{ route('reservations.create') }}"
           class="px-6 py-3 rounded-xl 
           bg-gradient-to-r from-violet-600 to-pink-500 
           text-white font-semibold
           hover:opacity-90 transition">

            + Nouveau rendez-vous

        </a>

    </div>



    <!-- STATISTIQUES -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- TOTAL -->

        <div class="group p-6 rounded-2xl
        bg-white/70 dark:bg-white/5
        backdrop-blur-xl
        border border-gray-200 dark:border-white/10
        shadow-lg
        hover:scale-105
        transition duration-300">


            <p class="text-gray-500 dark:text-gray-400">
                Total rendez-vous
            </p>


            <h2 class="mt-3 text-4xl font-bold
            bg-gradient-to-r from-violet-500 to-pink-500
            bg-clip-text text-transparent">

                {{ $totalReservations }}

            </h2>

        </div>

        <!-- ACCEPTES -->

        <div class="group p-6 rounded-2xl
        bg-white/70 dark:bg-white/5
        backdrop-blur-xl
        border border-gray-200 dark:border-white/10
        shadow-lg
        hover:scale-105
        transition duration-300">


            <p class="text-gray-500 dark:text-gray-400">
                Acceptés
            </p>


            <h2 class="mt-3 text-4xl font-bold text-green-500">

                {{ $acceptedReservations }}

            </h2>

        </div>

        <!-- EN ATTENTE -->

        <div class="group p-6 rounded-2xl
        bg-white/70 dark:bg-white/5
        backdrop-blur-xl
        border border-gray-200 dark:border-white/10
        shadow-lg
        hover:scale-105
        transition duration-300">


            <p class="text-gray-500 dark:text-gray-400">
                En attente
            </p>


            <h2 class="mt-3 text-4xl font-bold text-orange-500">

                {{ $pendingReservations }}

            </h2>


        </div>


</div>

    <!-- DERNIERS RENDEZ-VOUS -->

    <div class="rounded-2xl 
    bg-white/80 dark:bg-white/5 
    backdrop-blur
    border border-gray-200 dark:border-white/10
    shadow-xl p-6">


        <h2 class="text-2xl font-bold mb-6">

            Mes derniers rendez-vous

        </h2>



        <div class="overflow-x-auto">


            <table class="w-full">


                <thead>

                <tr class="border-b dark:border-white/10 text-left">

                    <th class="p-3">
                        Date
                    </th>

                    <th class="p-3">
                        Heure
                    </th>

                    <th class="p-3">
                        Motif
                    </th>

                    <th class="p-3">
                        Statut
                    </th>

                </tr>

                </thead>


                <tbody>


                @foreach($reservations as $reservation)


                <tr class="border-b dark:border-white/10">


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


                        @if($reservation->statut == 'accepte')

                            <span class="px-3 py-1 rounded-full 
                            bg-green-100 text-green-700">

                                Accepté

                            </span>


                        @elseif($reservation->statut == 'refuse')


                            <span class="px-3 py-1 rounded-full 
                            bg-red-100 text-red-700">

                                Refusé

                            </span>


                        @else


                            <span class="px-3 py-1 rounded-full 
                            bg-yellow-100 text-yellow-700">

                                En attente

                            </span>


                        @endif


                    </td>


                </tr>


                @endforeach


                </tbody>


            </table>


        </div>

    </div>

</div>
</x-app-layout>
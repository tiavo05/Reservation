<x-app-layout>

<div class="min-h-screen bg-gray-100 dark:bg-gray-950 p-6">


    <!-- HEADER -->

    <div class="mb-8 flex justify-between items-center">


        <div>

            <h1 class="text-4xl font-bold text-gray-900 dark:text-white">

                Bonjour {{ Auth::user()->name }}

            </h1>


            <p class="mt-2 text-gray-600 dark:text-gray-400">

                Consultez et gérez vos demandes de rendez-vous.

            </p>

        </div>



        <a href="{{ route('reservations.create') }}"

        class="
        px-6 py-3
        rounded-xl
        bg-gradient-to-r from-violet-600 to-pink-500
        text-white
        font-semibold
        shadow-lg
        hover:opacity-90
        transition
        ">

            + Nouveau rendez-vous

        </a>


    </div>





    <!-- STATISTIQUES -->


    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">



        <!-- TOTAL -->


        <div class="
        p-6 rounded-2xl
        bg-white/80 dark:bg-white/5
        backdrop-blur
        border border-gray-200 dark:border-white/10
        shadow-xl
        ">


            <p class="text-gray-500 dark:text-gray-400">

                Total rendez-vous

            </p>


            <h2 class="
            mt-3
            text-4xl
            font-bold
            bg-gradient-to-r from-violet-500 to-pink-500
            bg-clip-text
            text-transparent">

                {{ $totalReservations }}

            </h2>


        </div>





        <!-- ACCEPTES -->


        <div class="
        p-6 rounded-2xl
        bg-white/80 dark:bg-white/5
        backdrop-blur
        border border-gray-200 dark:border-white/10
        shadow-xl
        ">


            <p class="text-gray-500 dark:text-gray-400">

                Rendez-vous acceptés

            </p>


            <h2 class="
            mt-3
            text-4xl
            font-bold
            text-green-500">

                {{ $acceptedReservations }}

            </h2>


        </div>






        <!-- EN ATTENTE -->


        <div class="
        p-6 rounded-2xl
        bg-white/80 dark:bg-white/5
        backdrop-blur
        border border-gray-200 dark:border-white/10
        shadow-xl
        ">


            <p class="text-gray-500 dark:text-gray-400">

                En attente

            </p>


            <h2 class="
            mt-3
            text-4xl
            font-bold
            text-orange-500">

                {{ $pendingReservations }}

            </h2>


        </div>



    </div>







    <!-- TABLEAU -->


    <div class="
    bg-white/80
    dark:bg-white/5
    backdrop-blur
    border border-gray-200 dark:border-white/10
    rounded-2xl
    shadow-xl
    p-6
    ">



        <div class="flex justify-between items-center mb-6">


            <h2 class="
            text-2xl
            font-bold
            text-gray-900
            dark:text-white">

                Mes rendez-vous

            </h2>



            <a href="{{ route('reservations.index') }}"

            class="
            px-4 py-2
            rounded-lg
            bg-violet-600
            text-white
            hover:bg-violet-700
            transition">

                Voir tout

            </a>


        </div>





        <div class="overflow-x-auto">


            <table class="w-full">



                <thead>


                    <tr class="
                    text-left
                    text-gray-500
                    dark:text-gray-400
                    border-b
                    dark:border-white/10
                    ">


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


                    </tr>


                </thead>





                <tbody>


                @forelse($reservations as $reservation)


                    <tr class="
                    border-b
                    dark:border-white/10
                    hover:bg-gray-100
                    dark:hover:bg-white/5
                    transition
                    ">


                        <td class="p-4 dark:text-white">

                            {{ $reservation->date_rdv }}

                        </td>


                        <td class="p-4 dark:text-white">

                            {{ $reservation->heure_rdv }}

                        </td>


                        <td class="p-4 dark:text-white">

                            {{ $reservation->motif }}

                        </td>




                        <td class="p-4">


                            @if($reservation->statut == 'accepte')


                                <span class="
                                px-3 py-1
                                rounded-full
                                bg-green-100
                                text-green-700">

                                    Accepté

                                </span>



                            @elseif($reservation->statut == 'refuse')


                                <span class="
                                px-3 py-1
                                rounded-full
                                bg-red-100
                                text-red-700">

                                    Refusé

                                </span>



                            @else


                                <span class="
                                px-3 py-1
                                rounded-full
                                bg-orange-100
                                text-orange-700">

                                    En attente

                                </span>



                            @endif



                        </td>



                    </tr>



                @empty


                    <tr>

                        <td colspan="4"
                        class="
                        p-6
                        text-center
                        text-gray-500">

                            Aucun rendez-vous trouvé.

                        </td>


                    </tr>


                @endforelse



                </tbody>



            </table>


        </div>



    </div>



</div>


</x-app-layout>
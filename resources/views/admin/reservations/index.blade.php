<x-app-layout>

<div class="min-h-screen bg-gray-100 dark:bg-gray-950 p-6">


    <!-- HEADER ADMIN -->

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
            Tableau de bord Administrateur
        </h1>

        <p class="text-gray-600 dark:text-gray-400 mt-2">
            Gérez les demandes de rendez-vous des utilisateurs.
        </p>

    </div>



    <!-- STATISTIQUES -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">


        <div class="p-6 rounded-2xl bg-white dark:bg-white/5 shadow-xl">

            <p class="text-gray-500">
                Total demandes
            </p>

            <h2 class="text-4xl font-bold text-violet-600">
                {{ $reservations->count() }}
            </h2>

        </div>



        <div class="p-6 rounded-2xl bg-white dark:bg-white/5 shadow-xl">

            <p class="text-gray-500">
                En attente
            </p>

            <h2 class="text-4xl font-bold text-orange-500">

                {{ $reservations->where('statut','en_attente')->count() }}

            </h2>

        </div>



        <div class="p-6 rounded-2xl bg-white dark:bg-white/5 shadow-xl">

            <p class="text-gray-500">
                Acceptés
            </p>

            <h2 class="text-4xl font-bold text-green-500">

                {{ $reservations->where('statut','accepte')->count() }}

            </h2>

        </div>


    </div>





    <!-- LISTE RESERVATIONS -->


    <div class="
        bg-white/80 
        dark:bg-white/5
        backdrop-blur
        rounded-2xl
        shadow-xl
        p-6
    ">


        <h2 class="text-2xl font-bold mb-6 dark:text-white">

            Gestion des rendez-vous

        </h2>




        <div class="overflow-x-auto">


        <table class="w-full">


            <thead>

                <tr class="text-left text-gray-500">

                    <th class="p-4">
                        Client
                    </th>


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


            @foreach($reservations as $reservation)


            <tr class="border-t dark:border-white/10">


                <td class="p-4 dark:text-white">

                    {{ $reservation->nom }}

                    <br>

                    <span class="text-sm text-gray-500">

                        {{ $reservation->email }}

                    </span>

                </td>



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

                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
                            Accepté
                        </span>


                    @elseif($reservation->statut == 'refuse')

                        <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">
                            Refusé
                        </span>


                    @else

                        <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700">
                            En attente
                        </span>


                    @endif


                </td>





                <td class="p-4">


                    @if($reservation->statut == 'en_attente')


                    <div class="flex gap-2">


                    <form method="POST"
                    action="{{ route('admin.reservations.accepter',$reservation->id) }}">

                        @csrf

                        <button
                        class="px-4 py-2 bg-green-500 text-white rounded-lg">

                            Accepter

                        </button>

                    </form>




                    <form method="POST"
                    action="{{ route('admin.reservations.refuser',$reservation->id) }}">

                        @csrf

                        <button
                        class="px-4 py-2 bg-red-500 text-white rounded-lg">

                            Refuser

                        </button>

                    </form>


                    </div>


                    @else

                        <span class="text-gray-400">
                            Traité
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
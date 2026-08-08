<x-app-layout>

```
<x-slot name="header">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Nouveau rendez-vous
            </h1>

            <p class="mt-1 text-gray-500 dark:text-gray-400">
                Choisissez une date et un créneau disponible pour envoyer votre demande.
            </p>
        </div>

        <a href="{{ route('reservations.index') }}"
           class="inline-flex items-center justify-center px-5 py-2.5
                  rounded-xl
                  bg-gray-100 dark:bg-white/10
                  border border-gray-200 dark:border-white/10
                  text-gray-700 dark:text-gray-200
                  font-medium
                  hover:bg-gray-200 dark:hover:bg-white/20
                  transition">

            ← Mes réservations

        </a>

    </div>

</x-slot>


<div class="py-8">

    <div class="max-w-5xl mx-auto space-y-8">

        <!-- INTRODUCTION -->

        <div class="relative overflow-hidden
                    rounded-3xl
                    bg-gradient-to-r from-violet-600/20 to-pink-500/20
                    dark:bg-white/5
                    border border-gray-200 dark:border-white/10
                    backdrop-blur-xl
                    shadow-xl
                    p-8">

            <div class="absolute -top-20 -right-20
                        w-64 h-64
                        bg-pink-500/20
                        blur-3xl
                        rounded-full">
            </div>

            <div class="absolute -bottom-20 -left-20
                        w-64 h-64
                        bg-violet-500/20
                        blur-3xl
                        rounded-full">
            </div>

            <div class="relative">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-2xl
                                bg-gradient-to-r from-violet-600 to-pink-500
                                flex items-center justify-center
                                text-white text-xl shadow-lg">

                        📅

                    </div>

                    <div>

                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Planifier votre rendez-vous
                        </h2>

                        <p class="mt-1 text-gray-500 dark:text-gray-400">
                            Sélectionnez une date puis choisissez l'un des créneaux disponibles.
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <!-- FORMULAIRE -->

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- INFORMATIONS UTILISATEUR -->

            <div class="lg:col-span-1">

                <div class="bg-white/80 dark:bg-white/5
                            backdrop-blur-xl
                            border border-gray-200 dark:border-white/10
                            rounded-3xl
                            shadow-xl
                            p-6
                            sticky top-6">

                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                        Vos informations
                    </h2>

                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 mb-6">
                        Vérifiez vos informations avant l'envoi.
                    </p>


                    <!-- NOM -->

                    <div class="mb-5">

                        <label class="block text-sm font-semibold
                                      text-gray-700 dark:text-gray-300 mb-2">
                            Nom
                        </label>

                        <div class="relative">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2
                                         text-gray-400">
                                👤
                            </span>

                            <input
                                type="text"
                                name="nom"
                                form="reservation-form"
                                value="{{ Auth::user()->name }}"
                                class="w-full pl-11 pr-4 py-3
                                       rounded-xl
                                       bg-gray-100 dark:bg-gray-900
                                       border border-gray-200 dark:border-gray-700
                                       text-gray-900 dark:text-white
                                       focus:ring-2 focus:ring-violet-500
                                       focus:border-transparent"
                                required>

                        </div>

                    </div>


                    <!-- EMAIL -->

                    <div class="mb-5">

                        <label class="block text-sm font-semibold
                                      text-gray-700 dark:text-gray-300 mb-2">
                            Email
                        </label>

                        <div class="relative">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2
                                         text-gray-400">
                                ✉
                            </span>

                            <input
                                type="email"
                                name="email"
                                form="reservation-form"
                                value="{{ Auth::user()->email }}"
                                class="w-full pl-11 pr-4 py-3
                                       rounded-xl
                                       bg-gray-100 dark:bg-gray-900
                                       border border-gray-200 dark:border-gray-700
                                       text-gray-900 dark:text-white
                                       focus:ring-2 focus:ring-violet-500
                                       focus:border-transparent"
                                required>

                        </div>

                    </div>


                    <!-- TELEPHONE -->

                    <div>

                        <label class="block text-sm font-semibold
                                      text-gray-700 dark:text-gray-300 mb-2">
                            Téléphone
                        </label>

                        <div class="relative">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2
                                         text-gray-400">
                                ☎
                            </span>

                            <input
                                type="text"
                                name="telephone"
                                form="reservation-form"
                                placeholder="034 xx xxx xx"
                                class="w-full pl-11 pr-4 py-3
                                       rounded-xl
                                       bg-gray-100 dark:bg-gray-900
                                       border border-gray-200 dark:border-gray-700
                                       text-gray-900 dark:text-white
                                       focus:ring-2 focus:ring-violet-500
                                       focus:border-transparent"
                                required>

                        </div>

                    </div>

                </div>

            </div>


            <!-- DATE + CRENEAUX + MOTIF -->

            <div class="lg:col-span-2">

                <div class="bg-white/80 dark:bg-white/5
                            backdrop-blur-xl
                            border border-gray-200 dark:border-white/10
                            rounded-3xl
                            shadow-xl
                            p-8">

                    <form id="reservation-form"
                          action="{{ route('reservations.store') }}"
                          method="POST">

                        @csrf


                        <!-- DATE -->

                        <div class="mb-8">

                            <div class="flex items-center gap-3 mb-3">

                                <div class="w-9 h-9 rounded-xl
                                            bg-violet-100 dark:bg-violet-500/20
                                            flex items-center justify-center">
                                    📅
                                </div>

                                <div>

                                    <h2 class="font-bold text-gray-900 dark:text-white">
                                        Choisir une date
                                    </h2>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Sélectionnez le jour de votre rendez-vous.
                                    </p>

                                </div>

                            </div>


                            <input
                                type="date"
                                id="date_rdv"
                                name="date_rdv"
                                min="{{ date('Y-m-d') }}"
                                class="w-full px-4 py-3
                                       rounded-xl
                                       bg-gray-100 dark:bg-gray-900
                                       border border-gray-200 dark:border-gray-700
                                       text-gray-900 dark:text-white
                                       focus:ring-2 focus:ring-violet-500
                                       focus:border-transparent"
                                required>

                        </div>


                        <!-- CRENEAUX -->

                        <div class="mb-8">

                            <div class="flex items-center justify-between mb-4">

                                <div>

                                    <h2 class="font-bold text-gray-900 dark:text-white">
                                        Créneaux disponibles
                                    </h2>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Choisissez l'heure qui vous convient.
                                    </p>

                                </div>

                                <span class="px-3 py-1
                                             rounded-full
                                             bg-green-100 dark:bg-green-500/10
                                             text-green-700 dark:text-green-400
                                             text-xs font-semibold">
                                    Disponible
                                </span>

                            </div>


                            <div id="slots"
                                 class="grid grid-cols-2 md:grid-cols-4 gap-4">

                                <div class="col-span-full
                                            p-6
                                            rounded-2xl
                                            border border-dashed
                                            border-gray-300 dark:border-gray-700
                                            text-center">

                                    <div class="text-3xl mb-2">
                                        📅
                                    </div>

                                    <p class="text-gray-500 dark:text-gray-400">
                                        Choisissez d'abord une date
                                    </p>

                                </div>

                            </div>


                            @error('heure_rdv')

                                <p class="mt-3 text-sm text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        <!-- MOTIF -->

                        <div class="mb-8">

                            <div class="flex items-center gap-3 mb-3">

                                <div class="w-9 h-9 rounded-xl
                                            bg-pink-100 dark:bg-pink-500/20
                                            flex items-center justify-center">
                                    📝
                                </div>

                                <div>

                                    <h2 class="font-bold text-gray-900 dark:text-white">
                                        Motif du rendez-vous
                                    </h2>

                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Expliquez brièvement la raison de votre demande.
                                    </p>

                                </div>

                            </div>


                            <textarea
                                name="motif"
                                rows="5"
                                class="w-full px-4 py-3
                                       rounded-xl
                                       bg-gray-100 dark:bg-gray-900
                                       border border-gray-200 dark:border-gray-700
                                       text-gray-900 dark:text-white
                                       focus:ring-2 focus:ring-violet-500
                                       focus:border-transparent"
                                placeholder="Exemple : Demande d'entretien concernant..."
                                required></textarea>

                        </div>


                        <!-- BOUTON -->

                        <div class="pt-6
                                    border-t
                                    border-gray-200 dark:border-white/10
                                    flex flex-col sm:flex-row
                                    gap-4
                                    justify-end">

                            <a href="{{ route('reservations.index') }}"
                               class="px-6 py-3
                                      rounded-xl
                                      bg-gray-100 dark:bg-white/10
                                      border border-gray-200 dark:border-white/10
                                      text-gray-700 dark:text-gray-200
                                      font-semibold
                                      text-center
                                      hover:bg-gray-200 dark:hover:bg-white/20
                                      transition">

                                Annuler

                            </a>


                            <button
                                type="submit"
                                class="px-7 py-3
                                       rounded-xl
                                       bg-gradient-to-r
                                       from-violet-600
                                       to-pink-500
                                       text-white
                                       font-semibold
                                       shadow-lg
                                       hover:opacity-90
                                       hover:scale-[1.02]
                                       transition">

                                Confirmer le rendez-vous →

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

    document
        .getElementById('date_rdv')
        .addEventListener('change', function () {

            let date = this.value;

            let slots = document.getElementById('slots');

            slots.innerHTML = `
                <div class="col-span-full p-6 text-center">
                    <div class="animate-pulse text-violet-500 font-semibold">
                        Chargement des créneaux...
                    </div>
                </div>
            `;


            fetch('/disponibilites/' + date)

                .then(response => {

                    if (!response.ok) {
                        throw new Error('Erreur lors du chargement des créneaux');
                    }

                    return response.json();

                })

                .then(data => {

                    slots.innerHTML = '';


                    if (data.length === 0) {

                        slots.innerHTML = `

                            <div class="col-span-full
                                        p-6
                                        rounded-2xl
                                        border border-dashed
                                        border-red-300
                                        dark:border-red-500/30
                                        text-center">

                                <div class="text-3xl mb-2">
                                    ⚠️
                                </div>

                                <p class="text-red-500">
                                    Aucun créneau disponible pour cette date.
                                </p>

                            </div>

                        `;

                        return;
                    }


                    data.forEach(disponibilite => {

                        slots.innerHTML += `

                            <label class="cursor-pointer">

                                <input
                                    type="radio"
                                    name="heure_rdv"
                                    value="${disponibilite.heure}"
                                    class="hidden peer"
                                    required>

                                <div class="
                                    group
                                    p-5
                                    rounded-2xl
                                    border
                                    border-gray-200
                                    dark:border-white/10
                                    bg-gray-50
                                    dark:bg-white/5
                                    text-center
                                    transition
                                    hover:border-violet-400
                                    hover:bg-violet-50
                                    dark:hover:bg-violet-500/10
                                    peer-checked:border-violet-500
                                    peer-checked:bg-gradient-to-r
                                    peer-checked:from-violet-600
                                    peer-checked:to-pink-500
                                    peer-checked:text-white
                                    peer-checked:shadow-lg
                                ">

                                    <div class="text-2xl mb-1">
                                        🕐
                                    </div>

                                    <div class="font-bold text-lg">
                                        ${disponibilite.heure.substring(0,5)}
                                    </div>

                                    <div class="text-xs mt-1
                                                text-green-600
                                                dark:text-green-400
                                                peer-checked:text-white/80">
                                        Disponible
                                    </div>

                                </div>

                            </label>

                        `;

                    });

                })

                .catch(error => {

                    console.error(error);

                    slots.innerHTML = `

                        <div class="col-span-full
                                    p-6
                                    rounded-2xl
                                    border border-dashed
                                    border-red-300
                                    dark:border-red-500/30
                                    text-center">

                            <div class="text-3xl mb-2">
                                ❌
                            </div>

                            <p class="text-red-500">
                                Impossible de charger les créneaux.
                            </p>

                        </div>

                    `;

                });

        });

</script>
```

</x-app-layout>

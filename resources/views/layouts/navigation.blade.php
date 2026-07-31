<nav x-data="{ open: false }"
class="sticky top-0 z-50 backdrop-blur-xl bg-white/80 dark:bg-gray-950/80 border-b border-gray-200 dark:border-white/10 shadow-sm">


    <!-- ===========================
         NAVBAR PRINCIPALE
    ============================ -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center h-20">


            <!-- ===========================
                 LOGO APPLICATION
            ============================ -->

            <div class="flex items-center">

                <a href="{{ auth()->user()->role === 'admin'
                    ? route('admin.reservations.index')
                    : route('dashboard') }}">


                    <span class="text-2xl font-bold 
                    bg-gradient-to-r from-violet-600 to-pink-500 
                    bg-clip-text text-transparent">

                        AppReservation

                    </span>


                </a>


            </div>





            <!-- ===========================
                 MENU DESKTOP
            ============================ -->


            <div class="hidden sm:flex items-center gap-3">


                @if(auth()->user()->role === 'admin')


                    <a href="{{ route('admin.reservations.index') }}"
                    class="px-4 py-2 rounded-xl transition
                    hover:bg-violet-100 dark:hover:bg-violet-900
                    {{ request()->routeIs('admin.*') 
                    ? 'bg-violet-100 dark:bg-violet-900 text-violet-600' 
                    : '' }}">


                        ⚙️ Administration


                    </a>



                @else


                    <a href="{{ route('dashboard') }}"
                    class="px-4 py-2 rounded-xl transition
                    hover:bg-violet-100 dark:hover:bg-violet-900
                    {{ request()->routeIs('dashboard') 
                    ? 'bg-violet-100 dark:bg-violet-900 text-violet-100'
                    : '' }}">


                        🏠 Dashboard


                    </a>



                    <a href="{{ route('reservations.index') }}"
                    class="px-4 py-2 rounded-xl transition
                    hover:bg-pink-100 dark:hover:bg-pink-900
                    {{ request()->routeIs('reservations.*') 
                    ? 'bg-pink-300 dark:bg-pink-900 text-pink-100'
                    : '' }}">


                        📅 Mes réservations


                    </a>



                @endif



            </div>







            <!-- ===========================
                 PROFIL UTILISATEUR
            ============================ -->


            <div class="hidden sm:flex items-center">


                <x-dropdown align="right" width="56">


                    <x-slot name="trigger">


                        <button
                        class="flex items-center gap-3 px-4 py-2 rounded-xl
                        bg-white dark:bg-gray-900
                        border border-gray-200 dark:border-gray-700
                        shadow hover:shadow-lg transition">


                            <!-- Avatar -->


                            <div class="w-10 h-10 rounded-full
                            bg-gradient-to-r from-violet-600 to-pink-500
                            flex items-center justify-center
                            text-white font-bold">


                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}


                            </div>





                            <div class="text-left">


                                <div class="font-semibold text-gray-800 dark:text-white">

                                    {{ Auth::user()->name }}

                                </div>



                                <div class="text-xs text-gray-500">

                                    {{ Auth::user()->role }}

                                </div>


                            </div>



                            <svg class="w-4 h-4 text-gray-500"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">


                                <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"/>


                            </svg>



                        </button>



                    </x-slot>





                    <!-- MENU DROPDOWN -->


                    <x-slot name="content">


                        <x-dropdown-link :href="route('profile.edit')">


                            👤 Profil


                        </x-dropdown-link>





                        <form method="POST" action="{{ route('logout') }}">


                            @csrf



                            <x-dropdown-link
                            :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">


                                🚪 Déconnexion


                            </x-dropdown-link>



                        </form>



                    </x-slot>



                </x-dropdown>



            </div>









            <!-- ===========================
                 BOUTON MOBILE
            ============================ -->


            <div class="sm:hidden">


                <button
                @click="open=!open"
                class="p-2 rounded-lg
                hover:bg-gray-100
                dark:hover:bg-gray-800">


                    <svg class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">


                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>


                    </svg>


                </button>


            </div>



        </div>


    </div>









    <!-- ===========================
         MENU MOBILE
    ============================ -->


    <div x-show="open"
    class="sm:hidden px-6 pb-6">


        @if(auth()->user()->role === 'admin')


            <a href="{{ route('admin.reservations.index') }}"
            class="block py-3 rounded-lg hover:bg-violet-100">

                ⚙️ Administration

            </a>



        @else


            <a href="{{ route('dashboard') }}"
            class="block py-3 rounded-lg hover:bg-violet-100">

                🏠 Dashboard

            </a>




            <a href="{{ route('reservations.index') }}"
            class="block py-3 rounded-lg hover:bg-pink-100">

                📅 Mes réservations

            </a>



        @endif




        <hr class="my-4 border-gray-200 dark:border-gray-700">



        <div class="text-sm text-gray-500">


            {{ Auth::user()->email }}


        </div>



        <form method="POST" action="{{ route('logout') }}"
        class="mt-3">


            @csrf



            <button
            class="text-red-500">


                🚪 Déconnexion


            </button>


        </form>



    </div>



</nav>
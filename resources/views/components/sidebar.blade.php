<nav
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div
        class="md:flex-col md:items-Illuminate\Support\Stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">

        <a class="text-gray-500 block" onclick="toggleNavbar('sidebar')">
            <div class="items-center flex space-x-4">
                <span style="min-width: 48px"
                    class="w-12 h-12 text-sm text-white bg-gray-200 inline-flex items-center justify-center rounded-full"><img
                        alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                        src="{{ asset('assets/img/team-1-800x800.jpg') }}" /></span>
                <div class="justify-center text-xl font-bold">
                    {{ Illuminate\Support\Str::title(Illuminate\Support\Facades\Auth::user()->name) }}</div>
            </div>
            <input id="userid" class="hidden" value="{{ Illuminate\Support\Facades\Auth::id() }}">
        </a>

        <div class="md:flex md:flex-col md:items-Illuminate\Support\Stretch md:opacity-100 md:relative md:mt-2 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden bg-white"
            id="sidebar">
            <a class="text-gray-500 md:hidden block" onclick="toggleNavbar('sidebar')">
                <div class="items-center flex space-x-4">
                    <span style="min-width: 48px"
                        class="w-12 h-12 text-sm text-white bg-gray-200 inline-flex items-center justify-center rounded-full"><img
                            alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                            src="{{ asset('assets/img/team-1-800x800.jpg') }}" /></span>
                    <div class="justify-center text-xl font-bold">
                        {{ Illuminate\Support\Str::title(Illuminate\Support\Facades\Auth::user()->name) }}</div>
                </div>
            </a>

            <form class="mt-6 mb-4 md:hidden">
                <div class="mb-3 pt-0">
                    <input type="text" placeholder="Search"
                        class="border px-3 py-2 h-12 border-solid border-gray-500 placeholder-gray-300 text-gray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal" />
                </div>
            </form>

            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-gray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Layout Pages
            </h6>
            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="/dashboard"
                        class="text-xs uppercase py-3 font-bold block text-pink-500 hover:text-pink-600">
                        <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                        Dashboard
                    </a>
                </li>

                <li class="items-center">
                    <a href="/message/list"
                        class="text-xs uppercase py-3 font-bold block text-gray-700 hover:text-gray-500">
                        <i class="fa fa-message text-sm opacity-75 text-gray-300"></i>
                        Message
                        <p id="unseen"
                            class="bg-red-500 rounded-full text-white p-1 w-7 text-center inline {{ $unseen > 0 ? '' : 'hidden' }}">
                            {{ $unseen }}
                        </p>
                    </a>
                </li>

                @if (!Illuminate\Support\Facades\Auth::user()->hasRole('shop'))
                    <li class="items-center">
                        <a href="/shop/register"
                            class="text-xs uppercase py-3 font-bold block text-gray-700 hover:text-gray-500">
                            <i class="fa fa-shop mr-2 text-sm opacity-75 text-gray-300"></i>
                            Start selling
                        </a>
                    </li>
                @endif


                {{-- <li class="items-center">
                    <a href="./settings.html"
                        class="text-xs uppercase py-3 font-bold block text-gray-700 hover:text-gray-500">
                        <i class="fas fa-tools mr-2 text-sm text-gray-300"></i>
                        Settings
                    </a>
                </li>

                <li class="items-center">
                    <a href="./tables.html"
                        class="text-xs uppercase py-3 font-bold block text-gray-700 hover:text-gray-500">
                        <i class="fas fa-table mr-2 text-sm text-gray-300"></i>
                        Tables
                    </a>
                </li>

                <li class="items-center">
                    <a href="./maps.html"
                        class="text-xs uppercase py-3 font-bold block text-gray-700 hover:text-gray-500">
                        <i class="fas fa-map-marked mr-2 text-sm text-gray-300"></i>
                        Maps
                    </a>
                </li> --}}
            </ul>


            @if (Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                <!-- Divider -->
                <hr class="my-4 md:min-w-full" />
                <!-- Heading -->
                <h6 class="md:min-w-full text-gray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                    Categories
                </h6>
                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <a href="/admin/categories/list"
                            class="text-xs uppercase py-3 font-bold block text-gray-700 hover:text-gray-500">
                            <i class="fas fa-clipboard-list mr-2 text-sm text-gray-300"></i>
                            List Categories
                        </a>
                    </li>

                    <li class="items-center">
                        <a href="/admin/categories/create"
                            class="text-xs uppercase py-3 font-bold block text-gray-700 hover:text-gray-500">
                            <i class="fas fa-plus mr-2 text-sm text-gray-300"></i>
                            Add Category
                        </a>
                    </li>
                </ul>
            @endif

            @if (Illuminate\Support\Facades\Auth::user()->hasRole('shop'))
                <!-- Divider -->
                <hr class="my-4 md:min-w-full" />
                <!-- Heading -->
                <h6 class="md:min-w-full text-gray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                    Shop
                </h6>
                <ul class="md:flex-col md:min-w-full flex flex-col list-none">

                    <li class="items-center">
                        <a href="/shop/view/{{ Illuminate\Support\Facades\Auth::user()->shop->id }}"
                            class="text-xs uppercase py-3 font-bold block text-gray-700 hover:text-gray-500">
                            <i class="fa fa-shop mr-2 text-sm text-gray-300"></i>
                            My shop
                        </a>
                    </li>

                    <li class="items-center">
                        <a href="/products/list"
                            class="text-xs uppercase py-3 font-bold block text-gray-700 hover:text-gray-500">
                            <i class="fas fa-clipboard-list mr-2 text-sm text-gray-300"></i>
                            List Products
                        </a>
                    </li>

                    <li class="items-center">
                        <a href="/products/create"
                            class="text-xs uppercase py-3 font-bold block text-gray-700 hover:text-gray-500">
                            <i class="fas fa-plus mr-2 text-sm text-gray-300"></i>
                            Add Product
                        </a>
                    </li>
                </ul>
            @endif

            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-gray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Auth Layout Pages
            </h6>
            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="items-center">
                    <a href="/password/change"
                        class="text-gray-700 hover:text-gray-500 text-xs uppercase py-3 font-bold block">
                        <i class="fas fa-fingerprint text-gray-300 mr-2 text-sm"></i>
                        Change Password
                    </a>
                </li>
                <li class="items-center">
                    <a href="/logout" class="text-gray-700 hover:text-gray-500 text-xs uppercase py-3 font-bold block">
                        <i class="fas fa-fingerprint text-gray-300 mr-2 text-sm"></i>
                        Logout
                    </a>
                </li>
            </ul>

            {{-- <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-gray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                No Layout Pages
            </h6>
            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="items-center">
                    <a href="../landing.html"
                        class="text-gray-700 hover:text-gray-500 text-xs uppercase py-3 font-bold block">
                        <i class="fas fa-newspaper text-gray-300 mr-2 text-sm"></i>
                        Landing Page
                    </a>
                </li>

                <li class="items-center">
                    <a href="../profile.html"
                        class="text-gray-700 hover:text-gray-500 text-xs uppercase py-3 font-bold block">
                        <i class="fas fa-user-circle text-gray-300 mr-2 text-sm"></i>
                        Profile Page
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-gray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Documentation
            </h6>
            <!-- Navigation -->
            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="inline-flex">
                    <a href="https://www.creative-tim.com/learning-lab/tailwind/js/colors/notus" target="_blank"
                        class="text-gray-700 hover:text-gray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fas fa-paint-brush mr-2 text-gray-300 text-base"></i>
                        Styles
                    </a>
                </li>

                <li class="inline-flex">
                    <a href="https://www.creative-tim.com/learning-lab/tailwind/js/alerts/notus" target="_blank"
                        class="text-gray-700 hover:text-gray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fab fa-css3-alt mr-2 text-gray-300 text-base"></i>
                        CSS Components
                    </a>
                </li>

                <li class="inline-flex">
                    <a href="https://www.creative-tim.com/learning-lab/tailwind/angular/overview/notus"
                        target="_blank"
                        class="text-gray-700 hover:text-gray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fab fa-angular mr-2 text-gray-300 text-base"></i>
                        Angular
                    </a>
                </li>

                <li class="inline-flex">
                    <a href="https://www.creative-tim.com/learning-lab/tailwind/js/overview/notus" target="_blank"
                        class="text-gray-700 hover:text-gray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fab fa-js-square mr-2 text-gray-300 text-base"></i>
                        Javascript
                    </a>
                </li>

                <li class="inline-flex">
                    <a href="https://www.creative-tim.com/learning-lab/tailwind/nextjs/overview/notus" target="_blank"
                        class="text-gray-700 hover:text-gray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fab fa-react mr-2 text-gray-300 text-base"></i>
                        NextJS
                    </a>
                </li>

                <li class="inline-flex">
                    <a href="https://www.creative-tim.com/learning-lab/tailwind/react/overview/notus" target="_blank"
                        class="text-gray-700 hover:text-gray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fab fa-react mr-2 text-gray-300 text-base"></i>
                        React
                    </a>
                </li>

                <li class="inline-flex">
                    <a href="https://www.creative-tim.com/learning-lab/tailwind/svelte/overview/notus" target="_blank"
                        class="text-gray-700 hover:text-gray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fas fa-link mr-2 text-gray-300 text-base"></i>
                        Svelte
                    </a>
                </li>

                <li class="inline-flex">
                    <a href="https://www.creative-tim.com/learning-lab/tailwind/vue/overview/notus" target="_blank"
                        class="text-gray-700 hover:text-gray-500 text-sm block mb-4 no-underline font-semibold">
                        <i class="fab fa-vuejs mr-2 text-gray-300 text-base"></i>
                        VueJS
                    </a>
                </li>
            </ul> --}}
            <div class="text-xs font-serif text-gray-400">
                Created by TrickSlayer
            </div>
        </div>
    </div>
</nav>
<script>
    /* Function for opning navbar on mobile */
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
</script>

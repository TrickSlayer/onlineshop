<x-layout>
    <x-slot name="title">
        {{ isset($title) ? $title : 'Online shop' }}
    </x-slot>

    <x-slot name="head">
        {{ isset($head) ? $head : '' }}
    </x-slot>

    <x-slot name="header">
        {{ isset($header) ? $header : '' }}
    </x-slot>

    <x-slot name="main">
        <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg">
            <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                    <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                        href="/dashboard">Shop</a><button
                        class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                        type="button" onclick="toggleNavbar('example-collapse-navbar')">
                        <i class="text-white fas fa-bars"></i>
                    </button>
                </div>
                <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden"
                    id="example-collapse-navbar">
                    <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
                        <li class="flex items-center">
                            <a class="lg:text-white lg:hover:text-gray-200 text-gray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdemos.creative-tim.com%2Fnotus-js%2F"
                                target="_blank"><i
                                    class="lg:text-gray-200 text-gray-400 fab fa-facebook text-lg leading-lg"></i><span
                                    class="lg:hidden inline-block ml-2">Share</span></a>
                        </li>
                        <li class="flex items-center">
                            <a class="lg:text-white lg:hover:text-gray-200 text-gray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fdemos.creative-tim.com%2Fnotus-js%2F&text=Start%20your%20development%20with%20a%20Free%20Tailwind%20CSS%20and%20JavaScript%20UI%20Kit%20and%20Admin.%20Let%20Notus%20JS%20amaze%20you%20with%20its%20cool%20features%20and%20build%20tools%20and%20get%20your%20project%20to%20a%20whole%20new%20level."
                                target="_blank"><i
                                    class="lg:text-gray-200 text-gray-400 fab fa-twitter text-lg leading-lg"></i><span
                                    class="lg:hidden inline-block ml-2">Tweet</span></a>
                        </li>
                        <li class="flex items-center">
                            <a class="lg:text-white lg:hover:text-gray-200 text-gray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href="https://github.com/creativetimofficial/notus-js?ref=njs-login" target="_blank"><i
                                    class="lg:text-gray-200 text-gray-400 fab fa-github text-lg leading-lg"></i><span
                                    class="lg:hidden inline-block ml-2">Star</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <section class="relative w-full h-full pt-5 min-h-screen">
                <div class="absolute top-0 w-full h-full bg-gray-800 bg-full bg-no-repeat"
                    style="background-image: url({{ asset('assets/img/register_bg_2.png') }})"></div>
                <div class="container mx-auto px-4">
                    <div class="flex content-center items-center justify-center">
                        {{ isset($main) ? $main : '' }}
                    </div>
                </div>
            </section>
        </main>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
        <script>
            /* Function for opning navbar on mobile */
            function toggleNavbar(collapseID) {
                document.getElementById(collapseID).classList.toggle("hidden");
                document.getElementById(collapseID).classList.toggle("block");
            }
            /* Function for dropdowns */
            function openDropdown(event, dropdownID) {
                let element = event.target;
                while (element.nodeName !== "A") {
                    element = element.parentNode;
                }
                Popper.createPopper(element, document.getElementById(dropdownID), {
                    placement: "bottom-start",
                });
                document.getElementById(dropdownID).classList.toggle("hidden");
                document.getElementById(dropdownID).classList.toggle("block");
            }
        </script>
    </x-slot>

    <x-slot name="footer">
        {{ isset($footer) ? $footer : '' }}
    </x-slot>

</x-layout>

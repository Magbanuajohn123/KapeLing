<nav class="bg-neutral-primary fixed top-4 left-4 right-4 rounded-4xl z-40 border border-light">
    <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto p-4">

        {{-- LOGO --}}
        <a href="{{ route('home.view') }}" class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" class="h-7" alt="Logo" />
            <span class="text-xl font-[Poppins] text-heading font-semibold">
                Kape<span class="text-accent">Ling</span>
            </span>
        </a>

        {{-- RIGHT SECTION --}}
        <div class="flex items-center md:order-2 space-x-3">

            {{-- USER BUTTON --}}
            <button type="button"
                class="flex text-sm bg-neutral-primary rounded-full focus:ring-4 focus:ring-neutral-tertiary"
                id="user-menu-button"
                data-dropdown-toggle="user-dropdown">

                <img class="w-8 h-8 rounded-full"
                    src="/docs/images/people/profile-picture-5.jpg"
                    alt="user photo">
            </button>

            {{-- DROPDOWN --}}
            <div class="z-50 hidden bg-neutral-primary-medium border border-default-medium rounded-xl shadow-lg w-44"
                id="user-dropdown">

                <div class="px-4 py-3 text-sm border-b border-default">
                    <span class="block text-heading font-medium">User Name</span>
                    <span class="block text-body truncate">user@email.com</span>
                </div>

                <ul class="p-2 text-sm text-body font-medium">

                    <li>
                        <a href="#"
                            class="block p-2 rounded hover:bg-neutral-tertiary-medium hover:text-heading">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="block p-2 rounded hover:bg-neutral-tertiary-medium hover:text-heading">
                            Settings
                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="block p-2 rounded hover:bg-neutral-tertiary-medium hover:text-heading">
                            Sign out
                        </a>
                    </li>

                </ul>
            </div>

            {{-- MOBILE BUTTON --}}
            <button data-collapse-toggle="navbar-user" type="button"
                class="md:hidden p-2 rounded hover:bg-neutral-secondary-soft"
                aria-controls="navbar-user">

                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- NAV LINKS --}}
        <div class="hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">

            @php
                $active = 'text-heading font-semibold';
                $inactive = 'text-gray-400 hover:text-heading';
            @endphp

            <ul class="flex flex-col md:flex-row md:space-x-8 mt-4 md:mt-0">

                <li>
                    <a href="{{ route('home.view') }}"
                       class="{{ request()->routeIs('home.view') ? $active : $inactive }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('item.view') }}"
                       class="{{ request()->routeIs('item.view') ? $active : $inactive }}">
                        Menu
                    </a>
                </li>

                <li>
                    <a href=""
                       class="{{ $inactive }}">
                        Cart
                    </a>
                </li>

                <li>
                    <a href=""
                       class="{{ $inactive }}">
                        Order
                    </a>
                </li>

                <li>
                    <a href=""
                       class="{{ $inactive }}">
                        Gallery
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">
        @livewireStyles
</head>

<body class="bg-[#ffffff] font-[Poppins]  ">
    <x-navbar/>
    <section class="pt-15 sm:pt-25 min-h-screen">
        <div class="max-w-7xl p-4 mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="pt-10 lg:pt-20">
                    <p class="ms-2 text-[rgba(0,0,0,0.4)] text-center sm:text-start text-normal mb-4">EST. 2021 — SMALL-BATCH</p>
                    <h1 class="text-3xl lg:text-7xl mb-4 text-center sm:text-start font-bold text-[#1A1A1A]">Quietly
                        crafted
                        coffee,
                        <br>served slowly.
                    </h1>
                    <p class="mt-2 text-center sm:text-start mb-4 text-[rgba(0,0,0,0.4)]">Every cup at KapeLing is a
                        small
                        ritual — single-origin beans, <br> skilled baristas, and slow craft.
                        Discover
                        your new favorite,<br> delivered fresh to your door.</p>
                    <div class="flex mt-3 items-center justify-center sm:justify-start gap-2">
                        <button class="bg-[#f66738] border border-[#5e1f1fe5] p-2 rounded-2xl">Order Now</button>
                        <button class="border border-[brown] p-2 rounded-2xl">Explore Menu</button>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('images/background.jpg') }}" class="rounded-2xl mt-5 h-40 lg:h-130 w-full" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="pt-25 sm:pt-25 min-h-screen">
        <div class="max-w-7xl p-4 mx-auto">
            <livewire:product-filter />
        </div>
    </section>
    <!-- Final Fixed Navbar: Button stays visible on click in md/sm screens -->
    <!-- Final Navbar: structural fix + restored active link styling -->


    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>


    <!-- Active Link Highlighting Script (Scroll Spy) -->

@livewireScripts
</body>

</html>

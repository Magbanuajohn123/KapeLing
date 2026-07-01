<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Menu List</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">
           @livewireStyles
</head>

<body class="bg-[#ffffff] font-[Poppins] ">
   <x-navbar/>
    <section class="pt-25 min-h-screen">
         <div class="max-w-7xl p-4 mx-auto">
            <livewire:customer-product-list />
            
        </div>
    </section>
    <!-- Final Fixed Navbar: Button stays visible on click in md/sm screens -->
    <!-- Final Navbar: structural fix + restored active link styling -->


    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navbar = document.getElementById("navbar");

            window.addEventListener("scroll", function () {
                if (window.scrollY > 50) {
                    navbar.classList.add(
                        "bg-white/5",
                        "backdrop-blur-xl",
                        "border-b",
                        "border-white/10",

                    );
                } else {
                    navbar.classList.remove(
                        "bg-white/10",
                        "backdrop-blur-lg",
                        "border-b",
                        "border-white/10",
                        "shadow-lg"
                    );
                }
            });
        });
    </script>

    <!-- Active Link Highlighting Script (Scroll Spy) -->

@livewireScripts
</body>

</html>

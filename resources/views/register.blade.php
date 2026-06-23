<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title> Register</title>

    <!-- Laravel Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-50 font-sans text-slate-900 antialiased min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-lg">
        <!-- Back Navigation -->


        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">
            <div class="p-8 md:p-10">
                <!-- Header -->
                <div class="mb-6">
            <button onclick="history.back()"
                class="group flex items-center text-sm font-medium text-slate-500 hover:text-brand transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-xl mb-1">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-20 w-20">
                    </div>
                    <p class="text-slate-500  text-sm">Join us today and start your journey</p>
                </div>

                <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Name Group -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="fname" class="block text-sm font-semibold text-slate-700 mb-1.5">First Name</label>
                            <input type="text" id="fname" name="Firstname" required
                                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all duration-200 outline-none placeholder:text-slate-400 text-sm"
                                placeholder="John">
                        </div>
                        <div>
                            <label for="mname" class="block text-sm font-semibold text-slate-700 mb-1.5">Middle Name</label>
                            <input type="text" id="mname" name="Middlename"
                                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all duration-200 outline-none placeholder:text-slate-400 text-sm"
                                placeholder="Quincy">
                        </div>
                    </div>

                    <div>
                        <label for="lname" class="block text-sm font-semibold text-slate-700 mb-1.5">Last Name</label>
                        <input type="text" id="lname" name="Lastname" required
                            class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all duration-200 outline-none placeholder:text-slate-400 text-sm"
                            placeholder="Doe">
                    </div>
                    <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Address</label>
                            <input type="text" id="email" name="Address" required
                                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all duration-200 outline-none placeholder:text-slate-400 text-sm"
                                placeholder="john@example.com">
                        </div>
                    <!-- Contact & Email -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="contact" class="block text-sm font-semibold text-slate-700 mb-1.5">Contact No.</label>
                            <input type="tel" id="contact" name="Contact_No" required
                                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all duration-200 outline-none placeholder:text-slate-400 text-sm"
                                placeholder="0912 345 6789">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Email Address</label>
                            <input type="email" id="email" name="Email" required
                                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all duration-200 outline-none placeholder:text-slate-400 text-sm"
                                placeholder="john@example.com">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                        <div class="relative group">
                            <input type="password" id="password" name="Password" required
                                class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand/20 focus:border-brand transition-all duration-200 outline-none placeholder:text-slate-400 text-sm"
                                placeholder="••••••••">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer hover:text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>
                        <p class="mt-1.5 text-xs text-slate-500">Must be at least 8 characters long.</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full py-2 px-4 bg-[brown] hover:bg-brand-dark text-white font-bold rounded-lg shadow-lg shadow-brand/20 transition-all duration-200 transform active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-brand focus:ring-offset-2">
                            Create Account
                        </button>
                    </div>

                    <!-- Footer Link -->
                    <div class="text-center mt-6">
                        <p class="text-sm text-slate-600">
                            Already have an account?
                            <a href="/login" class="font-bold text-brand hover:underline decoration-2 underline-offset-4">
                                Sign In
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });
        setTimeout(() => {
            window.location.href = "";
        }, 2000);
    </script>
    @endif
    @if(session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });
        setTimeout(() => {
            window.location.href = "";
        }, 2000);
    </script>
    @endif
</body>

</html>

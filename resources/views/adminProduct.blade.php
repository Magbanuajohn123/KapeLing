<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>KapeLing Corp. - Category</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="bg-[#ffffff] font-[Poppins] ">


    <nav class="fixed top-0 z-40 w-full bg-neutral-primary-soft border-b border-default">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="top-bar-sidebar" data-drawer-toggle="top-bar-sidebar"
                        aria-controls="top-bar-sidebar" type="button"
                        class="sm:hidden text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-base text-sm p-2 focus:outline-none">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M5 7h14M5 12h14M5 17h10" />
                        </svg>
                    </button>
                    <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                        <img src="{{ asset('images/logo.png') }}" class="h-10 me-3" alt="FlowBite Logo" />
                        <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-dark">KapeLing
                            Corp.</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44"
                            id="dropdown-user">
                            <div class="px-4 py-3 border-b border-default-medium" role="none">
                                <p class="text-sm font-medium text-heading" role="none">
                                    Neil Sims
                                </p>
                                <p class="text-sm text-body truncate" role="none">
                                    neil.sims@flowbite.com
                                </p>
                            </div>
                            <ul class="p-2 text-sm text-body font-medium" role="none">
                                <li>
                                    <a href="#"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded"
                                        role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded"
                                        role="menuitem">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded"
                                        role="menuitem">Earnings</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout.proceed') }}" method="POST">
                                        @csrf
                                        <button type="submit">Sign Out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <x-sidebar />

    <div class="p-4 sm:ml-64 mt-14">
        <div class="p-4  flex flex-col gap-4">


            <!-- Modal toggle -->
            <div class="flex justify-end">
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="text-white bg-black box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none"
                    type="button">
                    <i class="fa-solid fa-plus"></i>Add Product
                </button>
            </div>

            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-100 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div
                        class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                            <h3 class="text-lg font-medium text-heading">
                                Create new product
                            </h3>
                            <button type="button"
                                class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="crud-modal">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-4 grid-cols-2 py-4 md:py-6">
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2.5 text-sm font-medium text-heading">Product Name</label>
                                    <input type="text" name="Product_Name" id="name"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="Type product name" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="category" class="block mb-2.5 text-sm font-medium text-heading">
                                        Product Category
                                    </label>

                                    <select name="Category_Id" id="category"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs">

                                        <option value="">Select Category</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->Category_Id }}">
                                                {{ $category->Category_Name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2.5 text-sm font-medium text-heading">Product Image</label>
                                    <input type="number" name="Product_Price" id="name"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="Type product name" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2.5 text-sm font-medium text-heading">Product Image</label>
                                    <input type="file" name="Product_Image" id="name"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                        placeholder="Type product name" required="">
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">
                                <button type="submit"
                                    class="inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                    <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 12h14m-7 7V5" />
                                    </svg>
                                    Add new product
                                </button>
                                <button data-modal-hide="crud-modal" type="button"
                                    class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3 font-medium">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr
                                class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                <th scope="row" class="px-6 py-4 font-medium flex text-heading whitespace-nowrap">
                                    <img class="h-10 mx-2" src="{{ asset('storage/' . $product->Product_Image) }}"
                                        alt="">{{ $product->Product_Name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $product->category->Category_Name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->category->Description }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->Product_Price }}
                                </td>
                                <td class="px-6 py-4 ">
                                    <button data-modal-target="update-product-{{ $product->Product_Id }}"
                                        data-modal-toggle="update-product-{{ $product->Product_Id }}"
                                        class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none"
                                        type="button">
                                        Edit
                                    </button>

                                    <button data-modal-target="delete-product-{{ $product->Product_Id }}"
                                        data-modal-toggle="delete-product-{{ $product->Product_Id }}"
                                        class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none"
                                        type="button">
                                        Delete
                                    </button>

                                </td>
                            </tr>
                            <div id="delete-product-{{ $product->Product_Id }}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div
                                        class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                                        <button type="button"
                                            class="absolute top-3 indet-e-2.5 text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                            data-modal-hide="popup-modal">
                                            <svg class="w-5 h-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18 17.94 6M18 18 6.06 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <form action="{{ route('product.delete', $product->Product_Id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <h3 class="mb-6 text-body">Are you sure you want to delete this product
                                                    from your account?</h3>
                                                <div class="flex items-center space-x-4 justify-center">
                                                    <button data-modal-hide="popup-modal" type="submit"
                                                        class="text-white bg-danger box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                                        Yes, I'm sure
                                                    </button>
                                                    <button data-modal-hide="popup-modal" type="button"
                                                        class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">No,
                                                        cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="update-product-{{ $product->Product_Id }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div
                                        class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                                            <h3 class="text-lg font-medium text-heading">
                                                Create new product
                                            </h3>
                                            <button type="button"
                                                class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="update-product-{{ $product->Product_Id }}">
                                                <svg class="w-5 h-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18 17.94 6M18 18 6.06 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="{{ route('product.update',$product->Product_Id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="grid gap-4 grid-cols-2 py-4 md:py-6">
                                                <div class="col-span-2">
                                                    <label for="name"
                                                        class="block mb-2.5 text-sm font-medium text-heading">Product Name</label>
                                                    <input type="text" name="Product_Name" id="name"
                                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                        placeholder="Type product name" required=""
                                                        value="{{ $product->Product_Name }}">
                                                </div>

                                                <div class="col-span-2">
                                                    <label for="category"
                                                        class="block mb-2.5 text-sm font-medium text-heading">Category</label>
                                                    <select id="category" name="Category_Id"
                                                        class="block w-full px-3  bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand  py-2.5 shadow-xs placeholder:text-body">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->Category_Id }}">
                                                                {{ $category->Category_Name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="name"
                                                        class="block mb-2.5 text-sm font-medium text-heading">Product
                                                        Image</label>
                                                        <p>Current Image</p>
                                                        <img src="{{ asset('storage/'.$product->Product_Image) }}" alt="">
                                                    <input type="file" name="Product_Image" id="name"
                                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                        placeholder="Type product name" required="" value="{{ $product->Product_Image }}">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="name"
                                                        class="block mb-2.5 text-sm font-medium text-heading">Product Price</label>
                                                    <input type="text" name="Product_Price" id="name"
                                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                        placeholder="Type product name" required=""
                                                        value="{{ $product->Product_Price }}">
                                                </div>
                                            </div>
                                            <div
                                                class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6">
                                                <button type="submit"
                                                    class="inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                                    <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 12h14m-7 7V5" />
                                                    </svg>
                                                    Add new product
                                                </button>
                                                <button data-modal-hide="crud-modal" type="button"
                                                    class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>





        </div>
    </div>



    <!-- Final Fixed Navbar: Button stays visible on click in md/sm screens -->
    <!-- Final Navbar: structural fix + restored active link styling -->


    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
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
        </script>
    @endif
    @if (session('error'))
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
        </script>
    @endif
    <!-- Active Link Highlighting Script (Scroll Spy) -->


</body>

</html>

<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductModel;
use App\Models\CategoryModel;

new class extends Component {

    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $selectedCategory = null;

    public function filter($id = null)
    {
        $this->selectedCategory = $id;
        $this->resetPage();
    }

    public function getCategoriesProperty()
    {
        return CategoryModel::withCount('products')->get();
    }

    public function getProductsProperty()
    {
        return ProductModel::with('category')
            ->when($this->selectedCategory, function ($query) {
                $query->where('Category_Id', $this->selectedCategory);
            })
            ->paginate(2);
    }

    public function getTotalProductsProperty()
    {
        return ProductModel::count();
    }
};
?>

<div class="flex flex-col h-full">

    {{-- CATEGORY FILTER --}}
    <div class="flex justify-between p-4 rounded-2xl mb-6 border">

        <h1 class="text-lg font-semibold">Menu</h1>

        <div class="flex gap-3 flex-wrap">

            <button wire:click="filter(null)" class="px-3 py-1 rounded-full text-sm
                {{ is_null($selectedCategory)
    ? 'bg-black text-white'
    : 'bg-gray-200 text-gray-600' }}">
                All ({{ $this->totalProducts }})
            </button>

            @foreach($this->categories as $category)
                    <button wire:click="filter({{ $category->Category_Id }})" class="px-3 py-1 rounded-full text-sm
                            {{ $selectedCategory == $category->Category_Id
                ? 'bg-black text-white'
                : 'bg-gray-200 text-gray-600' }}">
                        {{ $category->Category_Name }}
                        ({{ $category->products_count }})
                    </button>
            @endforeach

        </div>

    </div>

    {{-- PRODUCTS --}}
    <div class="flex-1">

        @if($this->products->count())

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                @foreach($this->products as $p)

                    <form action="{{ route('product.view', $p->Product_Id) }}" method="GET">
                        @csrf
                        <div class="border rounded-xl p-3 bg-white shadow-sm hover:shadow-md transition">

                            <img src="{{ asset('storage/' . $p->Product_Image) }}" alt="{{ $p->Product_Name }}"
                                class="w-full h-40 object-cover rounded-lg">

                            <h5 class="mt-3 font-semibold text-lg">
                                {{ $p->Product_Name }}
                            </h5>

                            <p class="text-gray-500 text-sm">
                                {{ optional($p->category)->Category_Name }}
                            </p>
                            <button type="submit">Add To Cart</button>
                        </div>
                    </form>

                @endforeach

            </div>

        @else

            <div class="flex flex-col items-center justify-center py-32 text-center">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6a4 4 0 004 4h8a4 4 0 004-4z" />
                </svg>

                <h3 class="text-2xl font-semibold text-gray-700">
                    No Products Found
                </h3>

                <p class="text-gray-500 mt-2">
                    We couldn't find any products in this category.
                </p>

                <button wire:click="filter(null)"
                    class="mt-5 px-6 py-3 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                    Browse All Products
                </button>

            </div>

        @endif

    </div>

    {{-- PAGINATION --}}
    @if($this->products->count())
        <div class="pt-10 flex justify-center">
            {{ $this->products->links('vendor.pagination.tailwind') }}
        </div>
    @endif

</div>

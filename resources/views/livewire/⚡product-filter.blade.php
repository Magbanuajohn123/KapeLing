<?php

use Livewire\Component;
use App\Models\ProductModel;
use App\Models\CategoryModel;

new class extends Component {

    public $selectedCategory = null;

    public function filter($id)
    {
        $this->selectedCategory = $id;
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
            ->get();
    }

    public function getTotalProductsProperty()
    {
        return ProductModel::count();
    }
};
?>

<div>

    {{-- CATEGORY FILTER --}}
    <div class="flex justify-between p-4 rounded-2xl bg-gray mb-4 border border-light">

        <h1 class="text-lg font-semibold">Menu</h1>

        <div class="flex gap-3">

            {{-- ALL BUTTON --}}
            <button
                wire:click="filter(null)"
                class="px-3 py-1 rounded-full text-sm transition
                {{ is_null($selectedCategory)
                    ? 'bg-black text-white'
                    : 'bg-gray-200 text-gray-600 hover:bg-gray-300' }}">

                All ({{ $this->totalProducts }})
            </button>

            {{-- CATEGORY BUTTONS --}}
            @foreach($this->categories as $category)
                <button
                    wire:click="filter({{ $category->Category_Id }})"
                    class="px-3 py-1 rounded-full text-sm transition flex items-center gap-2
                    {{ $selectedCategory == $category->Category_Id
                        ? 'bg-black text-white'
                        : 'bg-gray-200 text-gray-600 hover:bg-gray-300' }}">

                    {{ $category->Category_Name }}

                    <span class="text-xs opacity-70">
                        ({{ $category->products_count }})
                    </span>
                </button>
            @endforeach

        </div>
    </div>

    {{-- PRODUCTS GRID --}}
    <div class="grid grid-cols-1 px-2 py-2 lg:grid-cols-4 gap-4">

        @foreach($this->products as $p)
            <div class="border px-2 py-2 rounded hover:shadow-md transition">

                <img src="{{ asset('storage/' . $p->Product_Image) }}"
                     class="rounded mb-2">

                <h5 class="font-semibold">{{ $p->Product_Name }}</h5>

                <p class="text-sm text-gray-500">
                    {{ optional($p->category)->Category_Name }}
                </p>

            </div>
        @endforeach

    </div>

</div>

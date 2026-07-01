@if ($paginator->hasPages())
    <nav class="flex flex-col md:flex-row items-center justify-between gap-4 mt-8">

        {{-- Results --}}
        <div class="text-sm text-gray-600">
            Showing
            <span class="font-semibold">{{ $paginator->firstItem() }}</span>
            to
            <span class="font-semibold">{{ $paginator->lastItem() }}</span>
            of
            <span class="font-semibold">{{ $paginator->total() }}</span>
            results
        </div>

        {{-- Pagination --}}
        <div class="flex items-center gap-2">

            {{-- Previous --}}
            <button
                wire:click="previousPage"
                wire:loading.attr="disabled"
                @disabled($paginator->onFirstPage())
                class="px-4 py-2 rounded-xl font-medium transition-all duration-200
                {{ $paginator->onFirstPage()
                    ? 'bg-gray-200 text-gray-400 cursor-not-allowed'
                    : 'bg-black text-white hover:bg-gray-800 shadow-md' }}">
                ← Previous
            </button>

            {{-- Pages --}}
            @foreach ($elements as $element)

                @if (is_string($element))
                    <span class="px-2 text-gray-400">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())
                            <span
                                class="w-11 h-11 px-3 py-2 flex items-center justify-center rounded-xl bg-black text-white font-bold shadow-md">
                                {{ $page }}
                            </span>
                        @else
                            <button
                                wire:click="gotoPage({{ $page }})"
                                class="w-11 h-11 px-3 py-2 flex items-center justify-center rounded-xl border border-gray-300 bg-white text-gray-700 hover:bg-black hover:text-white transition-all duration-200">
                                {{ $page }}
                            </button>
                        @endif

                    @endforeach
                @endif

            @endforeach

            {{-- Next --}}
            <button
                wire:click="nextPage"
                wire:loading.attr="disabled"
                @disabled(!$paginator->hasMorePages())
                class="px-4 py-2 rounded-xl font-medium transition-all duration-200
                {{ !$paginator->hasMorePages()
                    ? 'bg-gray-200 text-gray-400 cursor-not-allowed'
                    : 'bg-black text-white hover:bg-gray-800 shadow-md' }}">
                Next →
            </button>

        </div>

    </nav>
@endif

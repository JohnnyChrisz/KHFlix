<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input wire:model.live.debounce.500ms="search" type="text"
        class="w-64 px-4 py-1 pl-8 text-sm bg-gray-800 rounded-full focus:outline-none focus:shadow-outline"
        placeholder="Search (Press '/' to focus)" x-ref="search"
        @keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true" @keydown="isOpen = true" @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false">
    <div class="absolute top-0">
        <svg class="w-4 mt-2 ml-2 text-gray-500 fill-current" viewBox="0 0 24 24">
            <path class="heroicon-ui"
                d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" />
        </svg>
    </div>
    @if (strlen($search) >= 2)
        <div class="absolute z-50 w-64 mt-4 text-sm bg-gray-800 rounded" x-show.transition.opacity="isOpen">
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                        <li class="border-b border-gray-700 ">
                            <a href="{{ route('movies.show', $result['id']) }}"
                                class="flex items-center px-3 py-3 hover:bg-gray-700"
                                @if ($loop->last) @keydown.tab="isOpen =
                    false" @endif>

                                @if ($result['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w92{{ $result['poster_path'] }}" alt="poster"
                                        class="w-10">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-10">
                                @endif
                                <span class="ml-4">{{ $result['title'] }}</span>
                            </a>
                        </li>
                    @endforeach

                </ul>
            @else
                <div class="px-3 py-3 text-sm text-gray-500">No results found for "{{ $search }}".</div>
            @endif

        </div>

    @endif

</div>

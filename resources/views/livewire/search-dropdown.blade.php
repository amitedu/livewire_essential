<div>
    <div class="flex-1 flex items-center justify-center px-2 lg:ml-6 mt-32">
        <div class="max-w-lg w-full">
            <label for="search" class="sr-only">Search for songs</label>
            <div class="relative">
{{--                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"></div>--}}
                <input
                    wire:model.debounce.300ms="search"
                    type="search"
                    id="search"
                    autocomplete="off"
                    placeholder="Search for songs..."
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white
                    placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300
                    focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                >
                @if(strlen($search) > 2)
                    <ul class="absolute z-50 bg-white border border-gray-300 w-full rounded-md mt-2 text-gray-700 text-sm
                    divide-y divide-gray-200"
                    >
                        @forelse ($searchResults as $result)
                            <li>
                                <a href="{{ $result['trackViewUrl'] ?? '#' }}"
                                   class="flex items-center px-4 py-4 hover:bg-gray-200 transition ease-in-out duration-150"
                                >
                                    <img src="{{ $result['artworkUrl60'] ?? '#' }}" alt="album art" class="w-10">
                                    <div class="ml-4 leading-tight">
                                        <div class="font-semibold">{{ $result['trackName'] ?? '#' }}</div>
                                        <div class="text-gray-600">{{ $result['artistName'] ?? '#'}}</div>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="px-4 py-2">No results found</li>
                        @endforelse
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>

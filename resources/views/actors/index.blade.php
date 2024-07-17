@extends('layouts.main')

@section('content')
    <div class="container px-4 py-16 mx-auto">
        <div class="popular-actors">
            <h2 class="text-lg font-semibold tracking-wider text-orange-500 uppercase">Popular Actors</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($popularActors as $actor)
                    <div class="mt-8 actor">
                        <a href="{{ route('actors.show', $actor['id']) }}">
                            <img src="{{ $actor['profile_path'] }}" alt="profile image" class="transition duration-150 ease-in-out hover:opacity-75">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                            <div class="text-sm text-gray-400 truncate">{{ $actor['known_for'] }}</div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div> <!-- end popular-actors -->


        <div class="my-8 page-load-status">
            <div class="flex justify-center">
                <p class="infinite-scroll-request">Loading...</p>
            </div>

            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">Error</p>
        </div>

        {{-- <div class="flex justify-between mt-16">
            @if ($previous)
                <a href="/actors/page/{{ $previous }}">Previous</a>
            @else
                <div></div>
            @endif

            @if ($next)
                <a href="/actors/page/{{ $next }}">Next</a>
            @else
                <div></div>
            @endif
        </div> --}}
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/infinite-scroll@4.0.1/dist/infinite-scroll.pkgd.min.js"></script>


    <script>
        var elem = document.querySelector('.grid');
        var infScroll = new InfiniteScroll(elem, {
            // options
            path: '/actors/page/@{{#}}',
            append: '.actor',
            status: '.page-load-staus',
            // history: false,
        });
    </script>
@endsection

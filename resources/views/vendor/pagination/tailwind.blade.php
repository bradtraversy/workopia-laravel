@if($paginator->hasPages())
<nav class="flex justify-center" role="navigation">
    {{-- Prev link --}}
    @if($paginator->onFirstPage())
    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded-l-lg">Previous</span>
    @else
    <a href="{{$paginator->previousPageUrl()}}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-l-lg">
        Previous
    </a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{--"Three Dots" Separator --}}
    @if (is_string($element))
    <span class="px-4 py-2 bg-gray-300 text-gray-500">{{ $element }}</span>
    @endif
    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <span class="px-4 py-2 bg-blue-500 text-white ">{{ $page }}</span>
    @else
    <a href="{{ $url }}" class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-blue-600 hover:text-white">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next link --}}
    @if($paginator->hasMorePages())
    <a href="{{$paginator->nextPageUrl()}}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-r-lg">
        Next
    </a>
    @else
    <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded-r-lg">Next</span>
    @endif
</nav>
@else

@endif
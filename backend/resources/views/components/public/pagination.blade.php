@if ($paginator->hasPages())
    <div class="pagination d-flex justify-content-center mt-5">
        @if ($paginator->onFirstPage())
            <a href="#" class="rounded disabled">&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="rounded">&laquo;</a>
        @endif

    
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a href="#" class="rounded disabled">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="active rounded">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}" class="rounded">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="rounded">&raquo;</a>
        @else
            <a href="#" class="rounded disabled">&raquo;</a>
        @endif
        
    </div>
@endif
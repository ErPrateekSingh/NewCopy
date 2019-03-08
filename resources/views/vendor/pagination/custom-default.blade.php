@if ($paginator->hasPages())
    <ul class="pagination pagination">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        @if($paginator->currentPage() > 6)
            <li class="hidden-xs"><a href="{{ $paginator->url(1) }}">1</a></li>
        @endif
        @if($paginator->currentPage() > 6)
            <li class="disabled hidden-xs"><span>...</span></li>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($paginator->currentPage() <= 6 && $i <= 9)
              @if ($i == $paginator->currentPage())
                  <li class="active"><span>{{ $i }}</span></li>
              @else
                <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
              @endif
            @elseif($paginator->currentPage() > 6 && $i >= $paginator->currentPage() - 3 && $i <= $paginator->currentPage() + 3 && $paginator->currentPage() < $paginator->lastPage() - 6 )
                @if ($i == $paginator->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @elseif($paginator->currentPage() > $paginator->lastPage() - 6 && $i >= $paginator->lastPage() - 8)
                @if ($i == $paginator->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                  <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 6)
            <li class="disabled hidden-xs"><span>...</span></li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 5)
            <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @endif
    </ul>
@endif

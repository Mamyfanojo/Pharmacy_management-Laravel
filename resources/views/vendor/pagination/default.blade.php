

@if ($paginator->hasPages())

<div class="container my-3 d-flex justify-content-between flex-row gap-1 align-items-center">
    <div class="fw-bolder">Page {{$paginator->currentPage()}}</div>
        <div class="d-flex justify-content-center flex-row gap-1 align-items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="btn btn-outline-primary disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">Precedent</span>
                </li>
            @else
             
                    <a class="btn btn-outline-primary" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Precedent</a>
            
            @endif           
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="btn btn-outline-primary active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <a class="btn btn-outline-primary" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach        
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
               
                    <a class="btn btn-outline-primary" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Suivant</a>
                
            @else
                <li class="btn btn-outline-primary disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">Suivant</span>
                </li>
            @endif            
        
    </div>
</div>

@endif

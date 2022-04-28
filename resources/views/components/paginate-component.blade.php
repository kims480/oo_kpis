@if ($items->hasPages())
<ul  class="pagination w-full flex justify-items-center align-middle justify-center  ">
    {{-- Previous Page Link --}}
    @if ($items->onFirstPage())
        <li class="page-item  border border-l-slate-50 py-2 px-4 bg-slate-300 text-xs text-center text-slate-900 rounded-l-md disabled"
            aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true">«</span>
        </li>
    @else
        <li
            class="page-item flex border border-l-slate-50 bg-slate-300 text-xs text-center rounded-l-md text-slate-900 hover:bg-amber-200">
            <a class="page-link align-middle py-2 px-4" href="{{ $items->previousPageUrl() }}"
                rel="prev" aria-label="@lang('pagination.previous')">«</a>
        </li>
    @endif

    {{-- Pagination Elements --}}

    {{-- "Three Dots" Separator --}}
    {{-- @if (is_string($items->getUrlRange(1, $items->total() / $items->perPage())))
        <li class="page-item  border border-l-slate-50 py-2 px-4 bg-slate-300 text-xs text-center text-slate-900 disabled"
            aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
    @endif --}}

    {{-- Array Of Links --}}
    @if (is_array($items->getUrlRange(0, $items->total() / $items->perPage())))
        @foreach ($items->getUrlRange(0, $items->total() / $items->perPage()) as $element)
            {{-- @foreach ($element as $page => $url) --}}
                @if ($loop->iteration == $items->currentPage())
                    <li class="page-item  border border-l-slate-50 flex  text-xs text-center text-slate-50 bg-slate-700 active"
                        aria-current="page">
                        <span  class="page-link align-middle py-2 px-4">
                            {{ $loop->iteration }}
                        </span>
                    </li>
                @else
                    <li
                        class="page-item  border border-l-slate-50 flex bg-slate-300 text-xs text-center text-slate-900 hover:bg-amber-200">
                        <a class="page-link align-middle w-full h-full px-4 py-2 "
                            href="{{ $element  }}">{{  $loop->iteration  }}</a></li>
                @endif
            {{-- @endforeach --}}
        @endforeach
    @endif

    {{-- Next Page Link --}}
    @if ($items->hasMorePages())
        <li
            class="page-item flex  border border-l-slate-50 rounded-r-md  bg-slate-300 text-xs text-center text-slate-900 hover:bg-amber-200">
            <a class="page-link align-middle py-2 px-4 " href="{{ $items->nextPageUrl() }}" rel="next"
                aria-label="@lang('pagination.next')">»</a>
        </li>
    @else
        <li class="page-item  border border-l-slate-50 rounded-r-md py-2 px-4 bg-slate-300 text-xs text-center text-slate-900 disabled"
            aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="page-link" aria-hidden="true">»</span>
        </li>
    @endif
</ul>
@endif

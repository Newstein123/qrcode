@if ($paginator->lastPage() > 1)
    <div class="d-flex justify-content-center align-items-center">
        <ul class="pagination">
            <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @if ($paginator->lastPage() <= 6)
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
            @else
                @if ($paginator->currentPage() <= 4)
                    @for ($i = 1; $i <= 6; $i++)
                        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                @elseif ($paginator->currentPage() > $paginator->lastPage() - 4)
                    @for ($i = $paginator->lastPage() - 5; $i <= $paginator->lastPage(); $i++)
                        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                @else
                    @for ($i = $paginator->currentPage() - 2; $i <= $paginator->currentPage() + 2; $i++)
                        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                @endif
            @endif
            <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </div>
@endif

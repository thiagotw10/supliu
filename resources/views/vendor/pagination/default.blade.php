@if ($paginator->hasPages())
    <nav>
        <ul class="pagination" style="background: white;box-shadow: 0px 0px 1px black; height: 50px">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span style="font-size: 30px; padding: 0 15px 0 15px; color:#1F3F7C;" aria-hidden="true">
                        <svg width="17" height="17" viewBox="0 0 17 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.8435 4L6.84351 14L16.8435 24L14.8435 28L0.843506 14L14.8435 0L16.8435 4Z" fill="#1F3F7C"/>
                        </svg>
                    </span>
                </li>
            @else
                <li style="background-color: #1F3F7C; border-radius: 5px 0 0 5px;">
                    <a style="font-size: 30px; padding: 0 15px 0 15px; color: white;" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <svg width="17" height="17" viewBox="0 0 17 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.8435 4L6.84351 14L16.8435 24L14.8435 28L0.843506 14L14.8435 0L16.8435 4Z" fill="white"/>
                        </svg>
                    </a>
                </li>
            @endif

            

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li style="background-color: #1F3F7C; border-radius: 0 5px 5px 0;">
                    <a style="font-size: 30px; padding: 0 15px 0 15px; color: white;" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <svg width="17" height="17" viewBox="0 0 17 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.843506 24L10.8435 14L0.843506 4L2.84351 0L16.8435 14L2.84351 28L0.843506 24Z" fill="white"/>
                    </svg>

                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span style="font-size: 30px; padding: 0 15px 0 15px; color:#1F3F7C;" aria-hidden="true">
                    <svg width="17" height="17" viewBox="0 0 17 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.843506 24L10.8435 14L0.843506 4L2.84351 0L16.8435 14L2.84351 28L0.843506 24Z" fill="#1F3F7C"/>
                    </svg>

                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif

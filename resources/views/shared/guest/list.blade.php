@php
    $items = isset($items) ? $items : false;
@endphp
@if ($items)
    <nav class="w-full overflow-auto lg:overflow-unset -mb-2">
        <ul class="flex gap-2 text-x-black text-md font-medium w-max">
            @foreach ($items as $item)
                <li>
                    <a {{ count($item) > 1 ? 'href=' . $item[1] : '' }}>{{ $item[0] }}</a>
                </li>
                @if ($loop->index < count($items) - 1)
                    <li>-</li>
                @endif
            @endforeach
        </ul>
    </nav>
@endif

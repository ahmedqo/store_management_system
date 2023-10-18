@php
    $scene = isset($scene) ? $scene : false;
    $patch = isset($patch) ? $patch : false;
    $clear = isset($clear) ? $clear : false;
@endphp

<div class="w-max h-full mx-auto flex items-center gap-[2px] justify-center rounded-md overflow-hidden">
    @if ($scene)
        <a title="scene" href="{{ $scene }}"
            class="px-3 py-1 flex items-center justify-center rounded-sm text-x-white hover:text-x-black focus-within:text-x-black bg-slate-400 hover:bg-slate-300 focus-within:bg-slate-300 outline-none">
            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M99-272q-19.325 0-32.662-13.337Q53-298.675 53-318v-319q0-20.3 13.338-33.15Q79.675-683 99-683h73q18.9 0 31.95 12.85T217-637v319q0 19.325-13.05 32.663Q190.9-272 172-272H99Zm224 96q-20.3 0-33.15-13.05Q277-202.1 277-221v-513q0-19.325 12.85-32.662Q302.7-780 323-780h314q20.3 0 33.15 13.338Q683-753.325 683-734v513q0 18.9-12.85 31.95T637-176H323Zm465-96q-18.9 0-31.95-13.337Q743-298.675 743-318v-319q0-20.3 13.05-33.15Q769.1-683 788-683h73q19.325 0 33.162 12.85Q908-657.3 908-637v319q0 19.325-13.838 32.663Q880.325-272 861-272h-73Z" />
            </svg>
        </a>
    @endif

    @if ($patch)
        <a title="patch" href="{{ $patch }}"
            class="px-3 py-1 flex items-center justify-center rounded-sm text-x-white hover:text-x-black focus-within:text-x-black bg-amber-400 hover:bg-amber-300 focus-within:bg-amber-300 outline-none">
            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M170-103q-32 7-53-14.5T103-170l39-188 216 216-188 39Zm235-78L181-405l435-435q27-27 64.5-27t63.5 27l96 96q27 26 27 63.5T840-616L405-181Z" />
            </svg>
        </a>
    @endif

    @if ($clear)
        <form action="{{ $clear }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" title="clear"
                class="px-3 py-1 flex items-center justify-center rounded-sm text-x-white hover:text-x-black focus-within:text-x-black bg-red-400 hover:bg-red-300 focus-within:bg-red-300 outline-none">
                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                    <path
                        d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                </svg>
            </button>
        </form>
    @endif
</div>

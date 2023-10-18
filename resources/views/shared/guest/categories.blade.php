<aside class="w-full flex flex-col gap-2">
    <div id="filter"
        class="!flex justify-between items-center gap-4 bg-x-light lg:bg-transparent rounded-x-core p-4 lg:p-0">
        <h4 class="text-x-black text-lg lg:text-xl font-x-core">
            {{ ucwords(__('Categories')) }}
        </h4>
        <button x-toggle targets="#categories, #filter" properties="hidden, bg-x-light, p-4"
            class="w-5 h-5 flex lg:hidden items-center justify-center text-x-black outline-none hover:text-x-prime focus:text-x-prime">
            <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                <path
                    d="M385-205q-20.75 0-33.375-13.36Q339-231.719 339-251.86q0-20.14 12.625-32.64T385-297h431q19.775 0 32.888 12.675Q862-271.649 862-251.509q0 20.141-13.112 33.325Q835.775-205 816-205H385Zm0-229q-20.75 0-33.375-13.36Q339-460.719 339-479.86q0-20.14 12.625-32.64T385-525h431q19.775 0 32.888 12.675Q862-499.649 862-479.509q0 19.141-13.112 32.325Q835.775-434 816-434H385ZM145-663q-20.75 0-33.375-12.86Q99-688.719 99-709.86 99-729 111.625-742T145-755h671q19.775 0 32.888 13.175Q862-728.649 862-709.509q0 21.141-13.112 33.825Q835.775-663 816-663H145Z" />
            </svg>
        </button>
    </div>
    <nav id="categories" class="!bg-x-light rounded-x-core !p-4 hidden lg:block">
        <ul class="x-category relative">
            @foreach ($categories as $base)
                @if (!$base->Category)
                    @include('shared.guest.items', [
                        'base' => $base,
                    ])
                @endif
            @endforeach
        </ul>
    </nav>
</aside>

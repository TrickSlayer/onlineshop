<h2> {{ $title }}
    <a href="{{ request()->url() }}" class="mr-2
        @if ($sort == null)
            font-bold
        @endif ">Default</a>
    <a href="{{ request()->fullUrlWithQuery([$name => 'asc']) }}"  class="mr-2
        @if ($sort == 'asc')
            font-bold
        @endif ">Increase</a>
    <a href="{{ request()->fullUrlWithQuery([$name => 'desc']) }}"  class="mr-2
        @if ($sort == 'desc')
            font-bold
        @endif ">Decrease</a>
</h2>

<div class="mt-2">

    @if ($check)
        <p class="ml-5"><strong>{{ Illuminate\Support\Str::title($message->user->name) }}:</strong></p>
    @endif

    <div class="py-2 px-5 max-w-screen-sm rounded {{ $check ? 'bg-gray-200 ml-5 ' : 'bg-blue-100 mr-5 ml-auto' }}">

        @if ($message->thumb)
            <div class="box-border w-full mx-auto overflow-hidden my-3">
                <img class="object-cover w-full h-full" src="{{ $message->thumb }}">
            </div>
        @endif

        <div class="text-ellipsis overflow-hidden">
            {{ $message->content }}
        </div>
    </div>

    <div class="text-sm text-gray-500 {{ $check ? 'text-left ml-5' : 'text-right mr-5' }}">
        <p>{{ $message->created_at }}</p>
    </div>

</div>

<div class="mt-2">
    @if ($user->name != $message->user->name)
        <p class="ml-5"><strong>{{ Illuminate\Support\Str::title($message->user->name) }}:</strong></p>
        <div class="bg-gray-200 py-2 px-5 max-w-screen-sm ml-5 rounded">
            <div class="text-ellipsis overflow-hidden">
                {{ $message->content }}
            </div>
        </div>
        <div class="text-left text-sm ml-5 text-gray-500">
            <p>{{ $message->created_at }}</p>
        </div>
    @else
        <div class="bg-blue-100 py-2 px-5 max-w-screen-sm mr-5 rounded ml-auto">
            <div class="text-ellipsis overflow-hidden">
                {{ $message->content }}
            </div>
        </div>
        <div class="text-right text-xs mr-5 text-gray-500">
            <p>{{ $message->created_at }}</p>
        </div>
    @endif

    
</div>

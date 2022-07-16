@if (count($comments) > 0)
    <x-sort :title="'Star:'" :name="'star'" :sort="request()->input('star')">
    </x-sort>
@endif

@if ($myComment)
    <div class="bg-gray-300 px-5 pt-2 pb-5 mt-2 rounded">
        <h2 class="capitalize font-bold">{{ $myComment->user->name }}
            <div class="inline text-gray-400 text-xs ml-5">
                {{ $myComment->updated_at }}
            </div>
            @if (Illuminate\Support\Facades\Auth::id() == $myComment->user_id)
                <div class="inline text-blue-400 text-xs cursor-pointer" id="delete">Delete</div>
            @endif
        </h2>
        <div class="flex mt-2">
            <div class="box-border border-1 mx-auto overflow-hidden flex-initial w-44 h-60">
                <img class="object-cover w-full h-full" src="{{ $myComment->thumb }}">
            </div>
            <p class="flex-1 ml-5">{{ $myComment->content }}</p>
        </div>
    </div>
@endif

@foreach ($comments as $comment)
    <div class="bg-gray-300 px-5 pt-2 pb-5 mt-2 rounded">
        <h2 class="capitalize font-bold">{{ $comment->user->name }}
            <div class="inline text-gray-400 text-xs ml-5">
                {{ $comment->updated_at }}
            </div>
            @if (Illuminate\Support\Facades\Auth::id() == $comment->user_id)
                <div class="inline text-blue-400 text-xs cursor-pointer delete">Delete</div>
            @endif
        </h2>
        <div class="flex mt-2">
            <div class="box-border border-1 mx-auto overflow-hidden flex-initial w-44 h-60">
                <img class="object-cover w-full h-full" src="{{ $comment->thumb }}">
            </div>
            <p class="flex-1 ml-5">{{ $comment->content }}</p>
        </div>
    </div>
@endforeach

<div class="m-5" id="page">
    {!! $comments->appends($request->except('page'))->render() !!}
</div>

<script>
    const pageBlock = $("#page");
    const aTags = pageBlock.find("a");

    aTags.attr("href", function() {
        urlPart = $(this).attr('href').split("?");
        var url = urlPart[0].replace("/search", "");
        if (urlPart.length > 1) url = url + "?" + urlPart[1];
        return url;
    });
</script>

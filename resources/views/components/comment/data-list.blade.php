<x-sort :title="'Star:'" :name="'star'" :sort="request()->input('star')">
</x-sort>

@foreach ($comments as $comment)
    <div class="bg-gray-300 px-5 pt-2 pb-5 mt-2 rounded">
        <h2 class="capitalize font-bold">{{ $comment->user->name }} <div class="inline text-gray-400 text-xs">{{ $comment->updated_at }}</div> </h2> 
        
        {{ $comment->content }}
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
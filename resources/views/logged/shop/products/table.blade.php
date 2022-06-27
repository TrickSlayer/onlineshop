<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                @sortablelink('name', 'Product name')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('description', 'Description')
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                Active
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr class="odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{ $product->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $product->description }}
                </td>
                <td class="px-6 py-4" style="place-content: center">
                    @if ($product->active == 1)
                        <div class="text-center text-white rounded"
                            style="--tw-bg-opacity: 1; background-color: rgb(34 197 94 / var(--tw-bg-opacity)); max-width: 100px; min-width: 70px">
                            <b>Active</b>
                        </div>
                    @else
                        <div class="text-center text-white rounded"
                            style="--tw-bg-opacity: 1; background-color: rgb(239 68 68 / var(--tw-bg-opacity)); max-width: 100px; min-width: 70px">
                            <b>Inactive</b>
                        </div>
                    @endif
                </td>
                <td class="px-6 py-4 place-content-center">
                    <div class="text-right flex space-x-3">
                        <a class="font-medium text-green-500 hover:text-green-700"
                            href="/products/edit/{{ $product->id }}">Edit</a>
                        <a class="font-medium text-red-500 hover:text-red-700 cursor-pointer"
                            onclick="removeRow( {{ $product->id }}, 'product {{ $product->name }}' )">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="m-5" id="page">
    {!! $products->appends($request->except('page'))->render() !!}
</div>
<script>
    const pageBlock = $("#page");
    const aTags = pageBlock.find("a");

    aTags.attr("href", function() {
        urlPart = $(this).attr('href').split("?");
        var url =  urlPart[0].replace("/search","");
        if (urlPart.length > 1) url = url + "?" + urlPart[1];
        return url;
    });
</script>

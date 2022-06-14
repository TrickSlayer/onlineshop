<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                @sortablelink('name', 'Category name')
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
        @foreach ($categories as $category)
            <tr class="odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{ $category->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $category->description }}
                </td>
                <td class="px-6 py-4" style="place-content: center">
                    @if ($category->active == 1)
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
                <td class="px-6 py-4 text-right flex space-x-3">
                    <a class="font-medium text-green-500 hover:text-green-700" href="/admin/categories/edit/{{ $category->id }}">Edit</a>
                    <a class="font-medium text-red-500 hover:text-red-700 cursor-pointer" onclick="removeRow( {{ $category->id }}, 'category {{ $category->name }}' )">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="m-5">
    {!! $categories->appends(\Request::except('page'))->render() !!}
</div>


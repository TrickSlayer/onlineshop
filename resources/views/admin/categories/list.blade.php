@extends('layouts.logged.datatable')

@section('title', 'List Categories')

@section('content')
    <div class="w-full px-4 mt-5">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white rounded">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Category name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
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
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links('pagination::tailwind'); }}
        </div>
    </div>
@endsection

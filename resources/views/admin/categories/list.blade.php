@extends('layouts.logged.datatable')

@section('title', 'List Categories')

@section('content')
    <div class="w-full px-4 mt-5">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white rounded">
            <div class="my-5 ml-6">
                <label class="font-medium">Search</label>
                <input type="text" class="" id="filter" name="filter" placeholder="Category name..."
                    value="{{ $filter }}">
            </div>
            <div id="table">
                @include('admin.categories.table')
            </div>
        </div>
    </div>
@endsection

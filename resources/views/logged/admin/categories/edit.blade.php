@extends('layouts.logged.form')
@section('title',  $title)

@section('content')
    <div class="w-full lg:w-8/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <h2 class="mt-10 font-medium leading-tight text-2xl mb-2 ">{{ $title }}</h2>
                <div class="mt-5">
                    @include('layouts.alert')
                </div>
                <form action="/admin/categories/edit/{{ $category->id }}" method="post" enctype="multipart/form-data">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2" for="grid-password">Menu
                            Name</label>
                        <input type="text" name="name" value="{{ old('name') ?: $category->name }}"
                            class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                    </div>

                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2" for="grid-password">Short
                            description</label>
                        <textarea name="description"
                            class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{ old('description') ?: $category->description }}</textarea>
                    </div>

                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                            for="grid-password">Detail</label>
                        <textarea name="content" id="content"
                            class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">{{ old('content') ?: $category->content }}</textarea>
                    </div>

                    <div class="flex">
                        <div>
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                for="grid-password">Active</label>
                            <div class="form-check inline-block">
                                <input
                                    class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="radio" name="active" id="flexRadioDefault1" value="1"
                                    {{ $category->active == 1 ? 'checked' : '' }}>
                                <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check inline-block">
                                <input
                                    class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="radio" name="active" id="flexRadioDefault2" value="0"
                                    {{ $category->active == 0 ? 'checked' : '' }}>
                                <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                            for="grid-password">Picture</label>
                        <input type="file" id="upload" name="file"
                            class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
                        <div class="mt-2" id="image_show">
                            <a target="_blank" href="{{ $category->thumb }}">
                                <img src="{{ $category->thumb }}" target="_blank">
                            </a>
                        </div>
                        <input type="hidden" name="thumb" id="file" value="{{ old('thumb') ?: $category->thumb }}">
                    </div>

                    <div class="text-center mt-6">
                        <button
                            class="bg-gray-800 text-white active:bg-gray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                            type="submit">
                            Edit
                        </button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.logged_form')
@section('title', 'Reset Password')

@section('content')
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0">
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <div class="text-gray-400 text-center mb-3 font-bold">
                        </div>
                        @include('layouts.alert')
                        <form action="/password/change" method="post">

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password">
                                    Old Password
                                </label>
                                <input type="password" name="old_password" autocomplete="on"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Password" value="{{ old('old_password') }}" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password">
                                    Password
                                </label>
                                <input type="password" name="password" autocomplete="on"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Password" value="{{ old('password') }}" />
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password">
                                    Confirm Password
                                </label>
                                <input type="password" name="password_confirmation" autocomplete="on"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Password" value="{{ old('password_confirmation') }}" />
                            </div>
                            <div class="text-center mt-6">
                                <button
                                    class="bg-gray-800 text-white active:bg-gray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                    type="submit">
                                    Set New Password
                                </button>
                            </div>
                            @csrf
                        </form>
                        <div class="flex flex-wrap">
                            <div class="w-1/2">
                                <a href="forgot" class="text-gray-500 text-sm font-bold"><small>Forgot password?</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

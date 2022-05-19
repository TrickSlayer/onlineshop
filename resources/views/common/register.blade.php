@extends('layouts.common')
@section('title', 'Register')

@section('content')

    <div class="w-full lg:w-6/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
            <div class="rounded-t mb-0 px-6 py-6">
                <div class="text-center mb-3">
                    <h6 class="text-blueGray-500 text-sm font-bold">
                        Sign up with
                    </h6>
                </div>
                <div class="btn-wrapper text-center">
                    <button
                        class="bg-white active:bg-blueGray-50 text-blueGray-700 px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                        type="button">
                        <img alt="..." class="w-5 mr-1" src="{{ asset('assets/img/github.svg') }}" />
                        Github
                    </button>
                    <button
                        class="bg-white active:bg-blueGray-50 text-blueGray-700 px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                        type="button">
                        <img alt="..." class="w-5 mr-1" src="{{ asset('assets/img/google.svg') }}" />
                        Google
                    </button>
                </div>
                <hr class="mt-6 border-b-1 border-blueGray-300" />
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <div class="text-blueGray-400 text-center mb-3 font-bold">
                    <small>Or sign up with credentials</small>
                </div>
                @include('layouts.alert')
                <form action="register" method="post">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Name
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Name" />
                    </div>

                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Email
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Email" />
                    </div>

                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Password
                        </label>
                        <input type="password" name="password" autocomplete="on" value="{{ old('password') }}"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Password" />
                    </div>

                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlFor="grid-password">
                            Confirm Password
                        </label>
                        <input type="password" name="password_confirmation" autocomplete="on"
                            value="{{ old('password_confirmation') }}"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Password" />
                    </div>

                    <div>
                        <label class="inline-flex items-center cursor-pointer">
                            <input id="customCheckLogin" type="checkbox" name="check"
                                class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" />
                            <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                I agree with the
                                <a href="javascript:void(0)" class="text-pink-500">
                                    Privacy Policy
                                </a>
                            </span>
                        </label>
                    </div>

                    <div class="text-center mt-6">
                        <button
                            class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                            type="submit">
                            Create Account
                        </button>
                    </div>
                    @csrf
                </form>
                <div class="flex flex-wrap">
                    <div class="w-1/2">
                        <a href="password/forgot" class="text-blueGray-500 text-sm font-bold"><small>Forgot
                                password?</small></a>
                    </div>
                    <div class="w-1/2 text-right">
                        <a href="login" class="text-blueGray-500 text-sm font-bold"><small>Login</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

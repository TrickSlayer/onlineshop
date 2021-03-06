<x-common :title="'Login'">
    <x-slot name='main'>
        <div class="w-full lg:w-4/12 px-4">
            <div class="pt-20"></div>
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0">
                <div class="rounded-t mb-0 px-6 py-6">
                    <div class="text-center mb-3">
                        <h6 class="text-gray-500 text-sm font-bold">
                            Sign in with
                        </h6>
                    </div>
                    <div class="btn-wrapper text-center">
                        <button
                            class="bg-white active:bg-gray-50 text-gray-700 px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                            type="button">
                            <img alt="..." class="w-5 mr-1"
                                src="{{ asset('assets/img/github.svg') }}" />Github</button><button
                            class="bg-white active:bg-gray-50 text-gray-700 px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                            type="button">
                            <img alt="..." class="w-5 mr-1" src="{{ asset('assets/img/google.svg') }}" />Google
                        </button>
                    </div>
                    <hr class="mt-6 border-b-1 border-gray-300" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <div class="text-gray-400 text-center mb-3 font-bold">
                        <small>Or sign in with credentials</small>
                    </div>
                    <x-alert></x-alert>
                    <form action="login" method="post">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                for="grid-password">Email</label><input type="email"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Email" name="email" value="{{ old('email') }}" />
                        </div>
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                for="grid-password">Password</label><input type="password" autocomplete="on"
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Password" name="password" value="{{ old('password') }}" />
                        </div>
                        <div>
                            <label class="inline-flex items-center cursor-pointer"><input id="customCheckLogin"
                                    type="checkbox"
                                    class="form-checkbox border-0 rounded text-gray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                                    name="remember" /><span class="ml-2 text-sm font-semibold text-gray-600">Remember
                                    me</span></label>
                        </div>
                        <div class="text-center mt-6">
                            <button
                                class="bg-gray-800 text-white active:bg-gray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                type="submit">
                                Sign In
                            </button>
                        </div>
                        @csrf
                    </form>
                    <div class="flex flex-wrap">
                        <div class="w-1/2">
                            <a href="password/forgot" class="text-gray-500 text-sm font-bold"><small>Forgot
                                    password?</small></a>
                        </div>
                        <div class="w-1/2 text-right">
                            <a href="register" class="text-gray-500 text-sm font-bold"><small>Create new
                                    account</small></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-slot>
</x-common>

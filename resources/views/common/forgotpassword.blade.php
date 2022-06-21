<x-common :title="'Forgot Password'">

    <x-slot name='main'>
        <div class="container mx-auto px-4 h-full">
            <div class="flex content-center items-center justify-center h-full">
                <div class="w-full lg:w-4/12 px-4">
                    <div class="pt-32"></div>
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0">
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                            <div class="text-gray-400 text-center mb-3 font-bold">
                            </div>
                            <x-alert></x-alert>
                            <form action="/password/forgot" method="post">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                        for="grid-password">Email</label><input type="email"
                                        class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Email" name="email" value="{{ old('email') }}" />
                                </div>
                                <div class="text-center mt-6">
                                    <button
                                        class="bg-gray-800 text-white active:bg-gray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                        type="submit">
                                        Send Mail
                                    </button>
                                </div>
                                @csrf
                            </form>
                            <div class="flex flex-wrap">
                                <div class="w-1/2">
                                    <a href="/login" class="text-gray-500 text-sm font-bold"><small>Login</small></a>
                                </div>
                                <div class="w-1/2 text-right">
                                    <a href="/register" class="text-gray-500 text-sm font-bold"><small>Create new
                                            account</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

</x-common>

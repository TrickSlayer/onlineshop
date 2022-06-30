<x-logged :title="'Message'">

    <x-slot name="main">

        <div id="group" class="flex">

            <div class="flex flex-col flex-1 bg-gray-300 ">
                <div id="chat-content" class="flex-1">

                    <div class="fixed w-full">
                        <div class="p-5 text-xl font-bold bg-gray-400 z-0">
                            <a href="/message/list">
                                <i class="fa-solid fa-angle-left mr-5"></i>
                            </a>
                            {{ Illuminate\Support\Str::title($group_chat->name) }}
                        </div>
                    </div>

                    <ul class="content overflow-auto">
                        @foreach ($messages as $message)
                            <li>
                                <x-message.message :message="$message" :user="$user"></x-message.message>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="flex flex-col">

                    <div id="image_box" class="ml-5 fixed bottom-20 hidden">
                        <div class="relative top-10 left-60 bg-white rounded-full w-5 h-5 border border-gray-500">
                            <i id="image_cancel" class="fa-solid fa-xmark text-base w-full h-full relative" style="bottom: 3px; left: 4px;"></i>
                        </div>
                        <div class=" w-64 h-40 p-2 bg-white border rounded box-content">
                            <div id="image_show" class="m-auto w-full h-full"></div>
                        </div>
                    </div>


                    <div class="flex flex-1">
                        <!-- file -->
                        <label
                            class="w-12 h-12 my-auto ml-5 flex flex-col items-center p-1 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-300">
                            <svg class="w-8 h-8 m-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <input type='file' id="upload" name="file" class="hidden" />

                            <input type="hidden" id="file" name="thumb">

                        </label>

                        {{-- Text --}}
                        <textarea name="content" id="content" class="m-2 rounded w-8/12 flex-1"></textarea>
                        <input id="userid" class="hidden" value="{{ $user->id }}">
                        <button id="send" class="mr-5">Send</button>
                    </div>

                </div>
            </div>


            <div
                class="content overflow-auto flex-col flex-initial w-64 p-2 min-h-screen max-h-screen z-10 hidden lg:flex bg-white">
                @foreach ($groups as $group)
                    <a href="/message/view/{{ $group->group_chat_id }}">
                        @if ($group->seen == 0)
                            <div class="w-2 h-2 rounded-full bg-red-500 relative top-3 left-3/4 ml-10"></div>
                        @endif
                        <div
                            class="w-full h-20 rounded p-2 
                        @if ($group->group_chat_id == $group_chat->id) bg-blue-200 @endif
                            @if ($group->seen == 0) font-bold @endif">
                            {{ Illuminate\Support\Str::title($group->name) }}
                        </div>
                    </a>
                @endforeach
            </div>

        </div>

    </x-slot>

    <x-slot name="footer">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"
            integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/sendmessage.js') }}"></script>
        <script src="{{ asset('js/upload.js') }}"></script>
        <style>
            .content::-webkit-scrollbar {
                display: none;
            }

            /* Hide scrollbar for IE, Edge and Firefox */
            .content {
                -ms-overflow-style: none;
                /* IE and Edge */
                scrollbar-width: none;
                /* Firefox */
            }

            #chat-content {
                max-height: calc(100vh - 150px);
            }

            #group {
                min-height: calc(100vh - 80px);
                max-height: calc(100vh - 80px);
            }

            @media (min-width: 768px) {
                #chat-content {
                    max-height: calc(100vh - 70px);
                }

                #group {
                    min-height: 100vh;
                    max-height: 100vh;
                }
            }

            ul.content {
                margin-top: 69px;
                height: calc(100% - 70px);
            }
        </style>
    </x-slot>

</x-logged>

<x-logged :title="'Message'">

    <x-slot name="main">

        <div class="flex min-h-screen">

            <div class="flex flex-col flex-1 bg-gray-300 min-h-full max-h-screen">
                <div id="chat-content" class="flex-1" style="height: calc(100vh - 70px);">
                    <div class="fixed w-full">
                        <div class="p-5 text-xl font-bold bg-gray-400 z-0" style=" ">
                            <a href="/message/list">
                                <i class="fa-solid fa-angle-left mr-5"></i>
                            </a>
                            {{ Illuminate\Support\Str::title($group_chat->name) }}
                        </div>
                    </div>
                    <ul class="content mt-16 h-5/6 overflow-auto">
                        @foreach ($messages as $message)
                            <li>
                                <x-message.message :message="$message"></x-message.message>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="inline-block">
                    <textarea name="content" id="content" class="m-2 rounded w-10/12"></textarea>
                    <input type="hidden" id="user_id" value="{{ $user->id }}">
                    <input type="hidden" id="user_name" value="{{ $user->name }}">
                    <input type="hidden" id="group_chat_id" value="{{ $group_chat->id }}">
                    <button id="send">Send</button>
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
        </style>
    </x-slot>

</x-logged>

<x-logged :title="'Message'">

    <x-slot name="head">
        <link rel="stylesheet" href="{{ asset('css/message.css') }}" />
    </x-slot>

    <x-slot name="main">

        <div id="group" class="flex bg-gray-300">

            <div class="hidden lg:flex flex-col flex-1  text-center content-center text-gray-500 text-5xl my-auto">
                SELECT GROUP CHAT
            </div>

            <div
                class="content overflow-auto flex-col flex-1 lg:flex-initial w-64 p-2 z-10 flex lg:bg-white bg-gray-300">
                @foreach ($groups as $group)
                    <a href="/message/view/{{ $group->group_chat_id }}">
                        <div id="groupchat{{ $group->group_chat_id }}"
                            class="w-2 h-2 rounded-full bg-red-500 relative top-3 left-3/4 ml-10 {{ $group->seen == 0 ? '' : 'hidden' }}">
                        </div>

                        <div
                            class="w-full h-20 rounded p-2 border mb-2 bg-white
                            @if ($group->seen == 0) font-bold @endif">
                            {{ Illuminate\Support\Str::title($group->name) }}
                        </div>
                    </a>
                @endforeach
            </div>

        </div>

    </x-slot>

</x-logged>

<x-logged>

    <x-slot name="main">
        <div id="chat-content">
            <ul>
                @foreach ($messages as $message)
                    <li>
                        <p><strong>{{ $message->user->name }}</strong>: {{ $message->content }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <label>Message</label>
        <textarea name="content" id="content"></textarea><br><br>
        <input type="hidden" id="user_id" value="{{ $user->id }}">
        <input type="hidden" id="user_name" value="{{ $user->name }}">
        <input type="hidden" id="group_chat_id" value="{{ $group_chat->id }}">
        <button id="send">Send</button>
    </x-slot>

    <x-slot name="footer">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"
            integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/sendmessage.js') }}"></script>
    </x-slot>

</x-logged>

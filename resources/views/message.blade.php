<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>

<body>
    <div id="chat-content">
        <ul>
            @foreach ($messages as $message)
                <li>
                    <p><strong>{{ $message->user_id }}</strong>: {{ $message->content }}</p>
                </li>
            @endforeach
        </ul>
    </div>
    <form>
        @csrf
        <label>Id</label>
        <input name="user_id" id="user_id" type="text"><br><br>
        <label>Message</label>
        <textarea name="content" id="content"></textarea><br><br>
        <div id="send">Send</div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"
        integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous">
    </script>


    <script src="{{ asset('js/sendmessage.js') }}"></script>
</body>

</html>

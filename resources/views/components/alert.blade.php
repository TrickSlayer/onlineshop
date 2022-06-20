@if ($errors->any())
    <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li style="color: red">{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if (Session::has('error'))
    <div>
        <ul>
            <li style="color: red">{{ Session::get('error') }}</li>
        </ul>
    </div>
@endif

@if (Session::has('success'))
    <div>
        <ul>
            <li style="color: green">{{ Session::get('success') }}</li>
        </ul>
    </div>
@endif
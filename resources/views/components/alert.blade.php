@if ($errors->any())
    <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li style="color: red">{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if ( Illuminate\Support\Facades\Session::has('error'))
    <div>
        <ul>
            <li style="color: red">{{ Illuminate\Support\Facades\Session::get('error') }}</li>
        </ul>
    </div>
@endif

@if ( Illuminate\Support\Facades\Session::has('success'))
    <div>
        <ul>
            <li style="color: green">{{ Illuminate\Support\Facades\Session::get('success') }}</li>
        </ul>
    </div>
@endif
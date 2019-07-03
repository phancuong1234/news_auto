@if(Session::has('messageSuccess'))
    <div class="alert alert-success" role="alert">
        <strong>{{ Session::get('messageSuccess') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(Session::has('messageFail'))
    <div class="alert alert-danger" role="alert">
        <strong>{{ Session::get('messageFail') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </strong>
    </div>
@endif
@if (session('alert'))
    <script type="text/javascript" charset="utf-8">
        alert("{{ session('alert') }}");
    </script>
@endif

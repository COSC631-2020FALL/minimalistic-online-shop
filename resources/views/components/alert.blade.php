
@if(session('status'))
    <div class="text-center">
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    </div>
    <br>
@endif

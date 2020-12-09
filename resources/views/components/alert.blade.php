
@if(session('status'))
    <div class="row text-center">
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    </div>
@endif
@if (session($key ?? 'status'))
    <div class="alert alert-success" role="alert">
        {{ session($key ?? 'status') }}
    </div>
@endif
@if (session($key ?? 'error'))
    <div class="alert alert-errors" role="alert">
        {{ session($key ?? 'error') }}
    </div>
@endif
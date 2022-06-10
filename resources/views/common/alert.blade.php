<div class="flash-message">

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        <hr />
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        <hr />
    @endif

    @if($errors->any())
        {!! implode('', $errors->all('<div class="alert-danger">:message</div>')) !!}
        <hr/>
    @endif
</div>

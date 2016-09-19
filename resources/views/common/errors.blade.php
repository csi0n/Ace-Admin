@if (isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>
        @foreach($errors->all() as $error)
            <span class="help-block"><strong>{{ $error }}</strong></span>
        @endforeach
    </div>
@endif
@if( $errors -> any() )
    <div class="uk-margin">
        <div class="uk-form-controls">    
        @foreach( $errors -> all() AS $error )
            <div class="uk-alert-warning" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>{{ $error }}</p>
            </div>
        @endforeach
        </div>
    </div>
@endif
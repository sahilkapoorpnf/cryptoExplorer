@if ($errors->any())
    <div class="ui negative message">
        <i class="close icon"></i>
        <div class="header">
            {{ __('messages.error') }}
        </div>
        <ul class="list">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif (session('success'))
    <div class="ui positive message">
        <i class="close icon"></i>
        <div class="header">
            {{ __('messages.success') }}
        </div>
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif
<ul class="navbar-nav ml-auto">
    @if(count($languages) === 1)
        <li class="nav-item">
            <a class="nav-link">
                {{ __('language.' . config('app.locale')) }}
            </a>
        </li>
    @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                {{ __('language.' . config('app.locale')) }}
            </a>
            <div id="language-selection" class="dropdown-menu" aria-labelledby="languageDropdown">
                @foreach($languages as $language)
                    @if ($language === config('app.locale'))
                        @continue
                    @endif
                    <a class="dropdown-item" href="{{ \LaravelLocalization::getLocalizedURL($language) }}">{{ __('language.' . $language) }}</a>
                @endforeach
            </div>
        </li>
    @endif
</ul>
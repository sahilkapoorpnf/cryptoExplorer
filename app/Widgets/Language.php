<?php

namespace App\Widgets;

use App\Services\LanguageService;
use Arrilot\Widgets\AbstractWidget;

class Language extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $languages = LanguageService::all();

        return view('widgets.language', [
            'config' => $this->config,
            'languages' => $languages,
        ]);
    }
}

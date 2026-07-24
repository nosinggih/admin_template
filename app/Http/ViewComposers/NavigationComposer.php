<?php

namespace App\Http\ViewComposers;

use App\Services\NavigationService;
use Illuminate\View\View;

class NavigationComposer
{
    protected $navigationService;

    public function __construct(NavigationService $navigationService)
    {
        $this->navigationService = $navigationService;
    }

    public function compose(View $view)
    {
        $view->with('nav', $this->navigationService->getItems());
    }
}

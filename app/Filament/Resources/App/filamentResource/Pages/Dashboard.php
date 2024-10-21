<?php

namespace App\Filament\Resources\App\filamentResource\Pages;

use App\Filament\Resources\App\filamentResource;
use Filament\Resources\Pages\Page;

class Dashboard extends Page
{
    protected static string $resource = filamentResource::class;

    protected static string $view = 'filament.resources.app.filament-resource.pages.dashboard';
}

<?php

namespace App\Filament\Resources\TipePelatihanResource\Pages;

use App\Filament\Resources\TipePelatihanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipePelatihans extends ListRecords
{
    protected static string $resource = TipePelatihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

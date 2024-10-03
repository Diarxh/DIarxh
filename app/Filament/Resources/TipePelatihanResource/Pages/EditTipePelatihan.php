<?php

namespace App\Filament\Resources\TipePelatihanResource\Pages;

use App\Filament\Resources\TipePelatihanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipePelatihan extends EditRecord
{
    protected static string $resource = TipePelatihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

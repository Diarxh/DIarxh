<?php

namespace App\Filament\Resources\PelatihanResource\Pages;

use App\Filament\Resources\PelatihanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePelatihan extends CreateRecord
{
    protected static string $resource = PelatihanResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Menambahkan user_id dari pengguna yang sedang login
        $data['user_id'] = Auth::id();
        return $data;
    }
}

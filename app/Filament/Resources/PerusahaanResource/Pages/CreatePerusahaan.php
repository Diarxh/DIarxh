<?php

namespace App\Filament\Resources\PerusahaanResource\Pages;

use App\Filament\Resources\PerusahaanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePerusahaan extends CreateRecord
{
    protected static string $resource = PerusahaanResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Menambahkan user_id dari pengguna yang sedang login
        $data['user_id'] = Auth::id();
        return $data;
    }
}

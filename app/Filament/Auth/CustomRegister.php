<?php

namespace App\Filament\Auth;


use Filament\Pages\Auth\Register as BaseRegister;
use Illuminate\Database\Eloquent\Model;


class CustomRegister extends BaseRegister
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getView(): string
    {
        return 'register'; // Path ke Blade view
    }

    protected function handleRegistration(array $data): Model
    {
        $user = $this->getUserModel()::create($data);
        $user->assignRole('User'); // Ganti 'User' dengan peran default yang diinginkan
        return $user;
    }
}

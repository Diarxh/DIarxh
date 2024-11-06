<?php

namespace App\Filament\Pages;

use App\Models\Company;
use App\Models\Training;  // Model untuk training
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class CompanyDashboard extends Page
{
    protected static ?string $slug = 'company-dashboard';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static string $view = 'filament.pages.company-dashboard';

    // Ubah menjadi true agar bisa muncul di navigasi
    protected static bool $shouldRegisterNavigation = true;

    public $totalData;
    public $trainings;

    public static function shouldRegisterNavigation(): bool
    {
        // Hanya tampilkan di navigasi untuk role perusahaan
        return auth()->check() && auth()->user()->hasRole('perusahaan');
    }

    public function mount(): void
    {
        if (!auth()->user()->hasRole('perusahaan')) {
            Notification::make()
                ->title('Akses Ditolak')
                ->danger()
                ->body('Anda tidak memiliki akses ke halaman ini.')
                ->send();

            redirect()->route('filament.admin.pages.dashboard');
        }

        // Mengambil data yang diperlukan
        $this->totalData = Company::count();  // Ganti dengan logika yang sesuai
        $this->trainings = Training::where('company_id', auth()->user()->company->id)->get();
    }

    protected function getHeaderWidgets(): array
    {
        return [];
    }

    // Override getNavigationLabel untuk mengubah label di sidebar
    public static function getNavigationLabel(): string
    {
        return 'Dashboard';
    }

    // Atur prioritas navigasi
    protected static ?int $navigationSort = 1;
}

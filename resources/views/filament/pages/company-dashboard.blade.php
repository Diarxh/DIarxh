<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {{-- Card Informasi Utama --}}
        <x-filament::card>
            <div class="flex items-center gap-4">
                <div class="flex-1">
                    <h2 class="text-lg font-bold tracking-tight">
                        Selamat Datang di Dashboard Perusahaan
                    </h2>
                    <p class="text-gray-500">
                        {{ auth()->user()->name }}
                    </p>
                </div>
            </div>
        </x-filament::card>

        {{-- Card Statistik --}}
        <x-filament::card>
            <div class="space-y-2">
                <div class="text-sm font-medium text-gray-500">
                    Total Data
                </div>
                <div class="text-3xl font-semibold">
                    {{ $totalData }} {{-- Menampilkan total data --}}
                </div>
            </div>
        </x-filament::card>

        {{-- Card Aktivitas Terbaru
        <x-filament::card>
            <div class="space-y-2">
                <div class="text-sm font-medium text-gray-500">
                    Aktivitas Terbaru
                </div>
                <div class="space-y-4">
                    @if ($recentActivities->isEmpty())
                        <div class="text-sm">
                            Belum ada aktivitas
                        </div>
                    @else
                        @foreach ($recentActivities as $activity)
                            <div class="text-sm">
                                {{ $activity->description }} - {{ $activity->created_at->diffForHumans() }}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </x-filament::card> --}}

        {{-- Card Info Perusahaan --}}
        <x-filament::card>
            <div class="space-y-2">
                <div class="text-sm font-medium text-gray-500">
                    Info Perusahaan
                </div>
                <div class="space-y-2">
                    <div class="text-sm">
                        <strong>Nama Perusahaan:</strong> {{ auth()->user()->company->company_name }}
                    </div>
                    <div class="text-sm">
                        <strong>Alamat:</strong> {{ auth()->user()->company->address }}
                    </div>
                    <div class="text-sm">
                        <strong>No. Telepon:</strong> {{ auth()->user()->company->phone_number }}
                    </div>
                </div>
            </div>
        </x-filament::card>

        {{-- Card Info Training --}}
        <x-filament::card>
            <div class="space-y-2">
                <div class="text-sm font-medium text-gray-500">
                    Info Training
                </div>
                <div class="space-y-2">
                    @if ($trainings->isEmpty())
                        <div class="text-sm">
                            Belum ada training yang dijadwalkan
                        </div>
                    @else
                        @foreach ($trainings as $training)
                            <div class="text-sm">
                                {{ $training->title }} - {{ $training->date->format('d M Y') }}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </x-filament::card>
    </div>
</x-filament::page>

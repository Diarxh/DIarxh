<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pelatihan;
use App\Models\Perusahaan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PelatihanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PelatihanResource\RelationManagers;
use App\Models\TipePelatihan;
use Illuminate\Support\Facades\Auth;

class PelatihanResource extends Resource
{
    protected static ?string $model = Pelatihan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('persyaratan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('tanggal_mulai')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_akhir')
                    ->required(),
                Forms\Components\DateTimePicker::make('tanggal_pendaftaran')
                    ->required(),
                Forms\Components\DateTimePicker::make('tanggal_akhir_pendaftaran')
                    ->required(),
                Forms\Components\select::make('perusahaan_id')
                    ->required()
                    ->relationship(name: 'perusahaan', titleAttribute: 'Nama_Perusahaan')
                    ->searchable(),
                Forms\Components\select::make('tipe_pelatihan_id')
                    ->relationship(name: 'tipe_pelatihan', titleAttribute: 'nama_tipe_pelatih')

                    ->required(),
                Forms\Components\TextInput::make('tempat_pelatihan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->default('open')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $user = Auth::user();

                // Cek jika user memiliki role 'admin'
                if ($user && $user->hasRole('super_admin')) {
                    // Jika admin, tampilkan semua data
                    return Pelatihan::query();
                }

                // Jika bukan admin, tampilkan data berdasarkan user_id
                return Pelatihan::where('user_id', $user->id);
            })
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->html()
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('persyaratan')
                    ->html()
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_akhir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pendaftaran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_akhir_pendaftaran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('perusahaan.Nama_Perusahaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipe_pelatihan.nama_tipe_pelatih')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_pelatihan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPelatihans::route('/'),
            'create' => Pages\CreatePelatihan::route('/create'),
            'edit' => Pages\EditPelatihan::route('/{record}/edit'),
        ];
    }
}

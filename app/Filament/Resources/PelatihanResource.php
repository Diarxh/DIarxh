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
// use App\Models\Pelatihan;
use Illuminate\Support\Facades\Auth;

class PelatihanResource extends Resource
{
    protected static ?string $model = Pelatihan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name') // Nama
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description') // Deskripsi
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('requirements') // Persyaratan
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('start_date') // Tanggal_Mulai
                    ->required(),
                Forms\Components\DatePicker::make('end_date') // Tanggal_Akhir
                    ->required(),
                Forms\Components\DateTimePicker::make('registration_date') // Tanggal_Pendaftaran
                    ->required(),
                Forms\Components\DateTimePicker::make('registration_end_date') // Tanggal_Akhir_Pendaftaran
                    ->required(),
                Forms\Components\Select::make('company_id') // Perusahaan_Id
                    ->required()
                    ->relationship(name: 'perusahaan', titleAttribute: 'company_name') // Nama_Perusahaan
                    ->searchable(),
                Forms\Components\Select::make('training_type_id') // Tipe_Pelatihan_Id
                    ->relationship(name: 'tipe_pelatihan', titleAttribute: 'trainer_type_name') // Ganti 'training_type_name' dengan 'trainer_type_name'
                    ->required(),
                Forms\Components\TextInput::make('training_location') // Tempat_Pelatihan
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status') // Status
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
                    return Pelatihan::query(); // Ganti 'trainings' dengan 'Pelatihan'
                }

                // Jika bukan admin, tampilkan data berdasarkan user_id
                return Pelatihan::where('user_id', $user->id); // Ganti 'trainings' dengan 'Pelatihan'
            })
            ->columns([
                Tables\Columns\TextColumn::make('name') // Nama
                    ->searchable(),
                Tables\Columns\TextColumn::make('description') // Deskripsi
                    ->html()
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('requirements') // Persyaratan
                    ->html()
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date') // Tanggal_Mulai
                    ->searchable(),
                Tables\Columns\TextColumn::make('end_date') // Tanggal_Akhir
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration_start_date') // Tanggal_Pendaftaran
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration_end_date') // Tanggal_Akhir_Pendaftaran
                    ->searchable(),
                Tables\Columns\TextColumn::make('perusahaan.company_name') // Perusahaan.Nama_Perusahaan
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipe_pelatihan.training_type_name') // Tipe_Pelatihan.Nama_Tipe_Pelatih
                    ->searchable(),
                Tables\Columns\TextColumn::make('training_location') // Tempat_Pelatihan
                    ->searchable(),
                Tables\Columns\TextColumn::make('status') // Status
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at') // Created_At
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at') // Updated_At
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
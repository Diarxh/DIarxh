<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\RelationManagers;
use App\Models\Guru;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    public static function getPluralModelLabel(): string
    {
        return 'Teachers';
    }

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')  // Nama
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')  // Email
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')  // Telepon
                    ->required()
                    ->numeric()  // Ganti menjadi input numerik
                    ->maxLength(15),  // Batas panjang maksimal nomor telepon
                Forms\Components\TextInput::make('school_name')  // Nama_Sekolah
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nuptk')  // Nuptk
                    ->required()
                    ->numeric()  // Ganti menjadi input numerik
                    ->maxLength(16),
                Forms\Components\FileUpload::make('photo')  // Foto
                    ->image()  // Menentukan bahwa ini adalah file gambar
                    ->directory('images')  // Lokasi penyimpanan file di storage
                    ->maxSize(2048),
                Forms\Components\TextInput::make('birth_date')  // Tanggal_Lahir
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('birth_place')  // Tempat_Lahir
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('gender')  // Jenis_Kelamin
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')  // Alamat
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('village')  // Desa
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('district')  // Kecamatan
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')  // Kabupaten
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('province')  // Provinsi
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_education')  // Pendidikan_Terakhir
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_id')  // User_Id
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')  // Nama
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')  // Email
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')  // Telepon
                    ->searchable(),
                Tables\Columns\TextColumn::make('school_name')  // Nama_Sekolah
                    ->searchable(),
                Tables\Columns\TextColumn::make('nuptk')  // Nuptk
                    ->searchable(),
                Tables\Columns\TextColumn::make('photo')  // Foto
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('birth_date')  // Tanggal_Lahir
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_place')  // Tempat_Lahir
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')  // Jenis_Kelamin
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')  // Alamat
                    ->searchable(),
                Tables\Columns\TextColumn::make('village')  // Desa
                    ->searchable(),
                Tables\Columns\TextColumn::make('district')  // Kecamatan
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')  // Kabupaten
                    ->searchable(),
                Tables\Columns\TextColumn::make('province')  // Provinsi
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_education')  // Pendidikan_Terakhir
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')  // User_Id
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}

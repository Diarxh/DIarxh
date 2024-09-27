<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\RelationManagers;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Email')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Telepon')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Nama_Sekolah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Nuptk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Foto')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('Tanggal_Lahir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Tempat_Lahir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Jenis_Kelamin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Desa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Kecamatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Kabupaten')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Provinsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Pendidikan_Terakhir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('User_Id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Nama_Sekolah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Nuptk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Foto')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Tanggal_Lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Tempat_Lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Jenis_Kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Desa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Kecamatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Kabupaten')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Provinsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Pendidikan_Terakhir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('User_Id')
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

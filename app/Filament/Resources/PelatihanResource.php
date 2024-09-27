<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelatihanResource\Pages;
use App\Filament\Resources\PelatihanResource\RelationManagers;
use App\Models\Pelatihan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Forms\Components\TextInput::make('deskripsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('persyaratan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggal_mulai')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggal_akhir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggal_pendaftaran')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggal_akhir_pendaftaran')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('id_perusahaan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tipe_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempat_pelatihan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('persyaratan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_akhir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pendaftaran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_akhir_pendaftaran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_perusahaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipe_id')
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

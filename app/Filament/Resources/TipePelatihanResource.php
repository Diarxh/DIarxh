<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipePelatihanResource\Pages;
use App\Filament\Resources\TipePelatihanResource\RelationManagers;
use App\Models\TipePelatihan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipePelatihanResource extends Resource
{
    protected static ?string $model = TipePelatihan::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_tipe_pelatih')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('deskripsi_tipe_pelatih')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_tipe_pelatih')
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
            'index' => Pages\ListTipePelatihans::route('/'),
            'create' => Pages\CreateTipePelatihan::route('/create'),
            'edit' => Pages\EditTipePelatihan::route('/{record}/edit'),
        ];
    }
}

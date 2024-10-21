<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipePelatihanResource\Pages;
use App\Filament\Resources\TipePelatihanResource\RelationManagers;
use App\Models\TipePelatihan;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class TipePelatihanResource extends Resource
{
    protected static ?string $model = TipePelatihan::class;

    public static function getPluralModelLabel(): string
    {
        return 'Training_types';
    }
    public static function getSlug(): string
    {
        return 'Training_types';
    }
    public static function getModelLabel(): string
    {
        return 'Training_types';
    }
    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('trainer_type_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('trainer_type_description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->directory('training-types')
                    ->visibility('public')
                    ->nullable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('trainer_type_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('photo')
                    ->disk('public')
                    ->visibility('public')
                    ->square()
                    ->size(size: 50)
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

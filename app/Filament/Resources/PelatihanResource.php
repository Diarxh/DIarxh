<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelatihanResource\Pages;
use App\Filament\Resources\PelatihanResource\RelationManagers;
use App\Models\Pelatihan;
use App\Models\Perusahaan;
use App\Models\TipePelatihan;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\ImageColumn;

class PelatihanResource extends Resource
{
    protected static ?string $model = Pelatihan::class;

    public static function getPluralModelLabel(): string
    {
        return 'Training';
    }
    public static function getSlug(): string
    {
        return 'Training';
    }
    public static function getModelLabel(): string
    {
        return 'Training';
    }
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('requirements')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('registration_start_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('registration_end_date')
                    ->required(),
                Forms\Components\Select::make('company_id')
                    ->relationship('perusahaan', 'company_name')
                    ->preload(),
                Forms\Components\Select::make('training_type_id')
                    ->relationship('tipe_pelatihan', 'trainer_type_name')
                    ->preload(),
                Forms\Components\TextInput::make('training_location')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->default('open')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->directory('training')
                    ->visibility('public')
                    ->nullable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $user = Auth::user();

                if ($user && $user->hasRole('super_admin')) {
                    return Pelatihan::query();
                }

                return Pelatihan::where('user_id', $user->id);
            })
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->html()
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('requirements')
                    ->html()
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration_start_date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration_end_date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('perusahaan.company_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipe_pelatihan.trainer_type_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('training_location')
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
                Tables\Columns\ImageColumn::make('photo')
                    ->disk('public')
                    ->visibility('public')
                    ->square()
                    ->size(50),
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

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerusahaanResource\Pages;
use App\Filament\Resources\PerusahaanResource\RelationManagers;
use App\Models\Perusahaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PerusahaanResource extends Resource
{
    protected static ?string $model = Perusahaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('company_name') // Nama_Perusahaan
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address') // Alamat
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number') // No_Telp
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email') // Email
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('logo') // Logo
                    ->required(),
                Forms\Components\RichEditor::make('description') // Description
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('registration_start_date') // Tanggal Mulai Pendaftaran
                    ->hidden()
                    ->nullable(),                
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
                    return Perusahaan::query();
                }

                // Jika bukan admin, tampilkan data berdasarkan user_id
                return Perusahaan::where('user_id', $user->id);
            })
            ->columns([
                Tables\Columns\TextColumn::make('Company_Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Phone_Number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Created_At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('Updated_At')
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
            'index' => Pages\ListPerusahaans::route('/'),
            'create' => Pages\CreatePerusahaan::route('/create'),
            'edit' => Pages\EditPerusahaan::route('/{record}/edit'),
        ];
    }
}

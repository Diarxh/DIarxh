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

                // Cek jika user memiliki role 'super_admin'
                if ($user && $user->hasRole('super_admin')) {
                    // Jika admin, tampilkan semua data
                    return Perusahaan::query();
                }

                // Jika bukan admin, tampilkan data berdasarkan user_id
                return Perusahaan::where('user_id', $user->id);
            })
            ->columns([
                Tables\Columns\TextColumn::make('company_name') // Nama Perusahaan
                    ->searchable(),
                Tables\Columns\TextColumn::make('address') // Alamat
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number') // Nomor Telepon
                    ->searchable(),
                Tables\Columns\TextColumn::make('email') // Email
                    ->searchable(),
                Tables\Columns\TextColumn::make('Logo')
                    ->html()
                    ->formatStateUsing(function ($state) {
                        return '<img src="' . asset('path/to/logo/' . $state) . '" alt="Logo" style="width:50px; height:auto;" />';
                    }),
                Tables\Columns\TextColumn::make('created_at') // Tanggal Dibuat
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at') // Tanggal Diperbarui
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
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
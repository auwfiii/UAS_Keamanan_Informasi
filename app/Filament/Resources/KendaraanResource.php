<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KendaraanResource\Pages;
use App\Models\Kendaraan;
use App\Models\Supir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KendaraanResource extends Resource
{
    protected static ?string $model = Kendaraan::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationLabel = 'Data Kendaraan';
    protected static ?string $pluralModelLabel = 'Kendaraan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('plat_nomor')
                ->label('Plat Nomor')
                ->required()
                ->maxLength(20),

            Forms\Components\TextInput::make('jenis')
                ->label('Jenis Kendaraan')
                ->required(),

            Forms\Components\TextInput::make('merek')
                ->label('Merek Kendaraan')
                ->required(),

            Forms\Components\TextInput::make('tahun')
                ->label('Tahun Kendaraan')
                ->numeric()
                ->minValue(1900)
                ->maxValue(date('Y'))
                ->required(),

            Forms\Components\Select::make('supir_id')
                ->label('Nama Supir')
                ->relationship('supir', 'nama')
                ->searchable()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('plat_nomor')->label('Plat Nomor')->searchable(),
            Tables\Columns\TextColumn::make('jenis')->label('Jenis'),
            Tables\Columns\TextColumn::make('merek')->label('Merek'),
            Tables\Columns\TextColumn::make('tahun')->label('Tahun'),
            Tables\Columns\TextColumn::make('supir.nama')->label('Supir'),
            Tables\Columns\TextColumn::make('created_at')->label('Tanggal Input')->dateTime('d M Y H:i'),
        ])
        ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKendaraans::route('/'),
            'create' => Pages\CreateKendaraan::route('/create'),
            'edit' => Pages\EditKendaraan::route('/{record}/edit'),
        ];
    }
}

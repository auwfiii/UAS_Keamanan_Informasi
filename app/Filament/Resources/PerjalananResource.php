<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerjalananResource\Pages;
use App\Models\Perjalanan;
use App\Models\Supir;
use App\Models\Kendaraan;
use App\Models\Trayek;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PerjalananResource extends Resource
{
    protected static ?string $model = Perjalanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Perjalanan';
    protected static ?string $pluralModelLabel = 'Perjalanan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('supir_id')
                ->label('Supir')
                ->relationship('supir', 'nama')
                ->searchable()
                ->required(),

            Forms\Components\Select::make('kendaraan_id')
                ->label('Kendaraan')
                ->relationship('kendaraan', 'plat_nomor')
                ->searchable()
                ->required(),

            Forms\Components\Select::make('trayek_id')
                ->label('Trayek')
                ->relationship('trayek', 'kode_trayek')
                ->searchable()
                ->required(),

            Forms\Components\DatePicker::make('tanggal_berangkat')
                ->label('Tanggal Berangkat')
                ->required(),

            Forms\Components\DatePicker::make('tanggal_kembali')
                ->label('Tanggal Pulang')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('supir.nama')
                ->label('Supir'),

            Tables\Columns\TextColumn::make('kendaraan.plat_nomor')
                ->label('Plat Nomor'),

            Tables\Columns\TextColumn::make('trayek.tujuan')
                ->label('Trayek'),

            Tables\Columns\TextColumn::make('tanggal_berangkat')
                ->date(),

            Tables\Columns\TextColumn::make('tanggal_pulang')
                ->date(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime('d M Y H:i'),
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
            'index' => Pages\ListPerjalanans::route('/'),
            'create' => Pages\CreatePerjalanan::route('/create'),
            'edit' => Pages\EditPerjalanan::route('/{record}/edit'),
        ];
    }
}

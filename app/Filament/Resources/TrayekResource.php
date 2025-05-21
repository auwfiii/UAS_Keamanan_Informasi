<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrayekResource\Pages;
use App\Models\Trayek;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TrayekResource extends Resource
{
    protected static ?string $model = Trayek::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationLabel = 'Data Trayek';
    protected static ?string $pluralModelLabel = 'Trayek';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('kode_trayek')
                ->label('Kode Trayek')
                ->required()
                ->unique(ignoreRecord: true),

            Forms\Components\TextInput::make('asal')
                ->label('Rute Awal')
                ->required(),

            Forms\Components\TextInput::make('tujuan')
                ->label('Rute Akhir')
                ->required(),

            Forms\Components\TextInput::make('jarak')
                ->label('Jarak (KM)')
                ->numeric()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('kode_trayek')->searchable(),
            Tables\Columns\TextColumn::make('asal')->label('Rute Awal'),
            Tables\Columns\TextColumn::make('tujuan')->label('Rute Akhir'),
            Tables\Columns\TextColumn::make('jarak')->label('Jarak (KM)'),
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
            'index' => Pages\ListTrayeks::route('/'),
            'create' => Pages\CreateTrayek::route('/create'),
            'edit' => Pages\EditTrayek::route('/{record}/edit'),
        ];
    }
}

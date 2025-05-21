<?php

namespace App\Filament\Resources\TrayekResource\Pages;

use App\Filament\Resources\TrayekResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrayeks extends ListRecords
{
    protected static string $resource = TrayekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

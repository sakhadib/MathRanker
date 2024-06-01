<?php

namespace App\Filament\Resources\SignalResource\Pages;

use App\Filament\Resources\SignalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSignals extends ListRecords
{
    protected static string $resource = SignalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

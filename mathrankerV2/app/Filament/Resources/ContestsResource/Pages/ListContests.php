<?php

namespace App\Filament\Resources\ContestsResource\Pages;

use App\Filament\Resources\ContestsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContests extends ListRecords
{
    protected static string $resource = ContestsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

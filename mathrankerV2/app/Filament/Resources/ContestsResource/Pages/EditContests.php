<?php

namespace App\Filament\Resources\ContestsResource\Pages;

use App\Filament\Resources\ContestsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContests extends EditRecord
{
    protected static string $resource = ContestsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

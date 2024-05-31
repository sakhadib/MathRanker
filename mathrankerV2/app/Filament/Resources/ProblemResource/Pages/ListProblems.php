<?php

namespace App\Filament\Resources\ProblemResource\Pages;

use App\Filament\Resources\ProblemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProblems extends ListRecords
{
    protected static string $resource = ProblemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

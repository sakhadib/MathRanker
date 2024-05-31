<?php

namespace App\Filament\Resources\SolverResource\Pages;

use App\Filament\Resources\SolverResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSolvers extends ListRecords
{
    protected static string $resource = SolverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

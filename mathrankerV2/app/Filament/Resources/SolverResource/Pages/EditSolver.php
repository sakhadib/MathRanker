<?php

namespace App\Filament\Resources\SolverResource\Pages;

use App\Filament\Resources\SolverResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSolver extends EditRecord
{
    protected static string $resource = SolverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

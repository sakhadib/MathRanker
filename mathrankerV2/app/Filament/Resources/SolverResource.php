<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SolverResource\Pages;
use App\Filament\Resources\SolverResource\RelationManagers;
use App\Models\Solver;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class SolverResource extends Resource
{
    protected static ?string $model = Solver::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('username'),
                TextColumn::make('fname'),
                TextColumn::make('lname'),
                TextColumn::make('email'),
                TextColumn::make('institution'),
                TextColumn::make('country'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSolvers::route('/'),
            'create' => Pages\CreateSolver::route('/create'),
            'edit' => Pages\EditSolver::route('/{record:username}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContestsResource\Pages;
use App\Filament\Resources\ContestsResource\RelationManagers;
use App\Models\Contests;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class ContestsResource extends Resource
{
    protected static ?string $model = Contests::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('c_id')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->placeholder('Enter the title of the contest'),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->placeholder('Enter the description of the contest'),
                Forms\Components\DateTimePicker::make('start_time')
                    ->required()
                    ->placeholder('Enter the start time of the contest'),
                Forms\Components\DateTimePicker::make('end_time')
                    ->required()
                    ->placeholder('Enter the end time of the contest'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               
               
                TextColumn::make('c_id'), 
                TextColumn::make('title'),
                TextColumn::make('description'),
                TextColumn::make('start_time'),
                TextColumn::make('end_time'),


            ])
            ->filters([
                //
            ])
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContests::route('/'),
            'create' => Pages\CreateContests::route('/create'),
            'edit' => Pages\EditContests::route('/{record}/edit'),
        ];
    }
}

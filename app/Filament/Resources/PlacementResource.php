<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlacementResource\Pages;
use App\Filament\Resources\PlacementResource\RelationManagers;
use App\Models\Kas;
use App\Models\Placement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlacementResource extends Resource
{
    protected static ?string $model = Placement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Full Name')
                    ->required(),
                Forms\Components\Select::make('branch_id')
                    ->relationship('branch', 'name')
                    ->label('Branch Name')
                    ->required(),
                Forms\Components\Select::make('kas_id')
                    // ->relationship('kas', 'name')
                    ->options(
                        Kas::whereDoesntHave('placements')->pluck('name', 'id')
                    )
                    ->label('Kas Name')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.nik')->label('NIK'),
                Tables\Columns\TextColumn::make('user.name')->label('Full Name'),
                Tables\Columns\TextColumn::make('branch.name')->label('Branch Name'),
                Tables\Columns\TextColumn::make('kas.name')->label('Kas Name'),
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
            'index' => Pages\ListPlacements::route('/'),
            'create' => Pages\CreatePlacement::route('/create'),
            'edit' => Pages\EditPlacement::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return Placement::groupBy('user_id');
    }
}

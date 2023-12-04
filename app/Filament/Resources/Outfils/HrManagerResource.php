<?php

namespace App\Filament\Resources\Outfils;

use App\Filament\Resources\Outfils\HrManagerResource\Pages;
use App\Filament\Resources\Outfils\HrManagerResource\RelationManagers;
use App\Models\HrManager;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class HrManagerResource extends Resource
{
    protected static ?string $model = HrManager::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship(
                        name: 'user',
                        modifyQueryUsing: fn(Builder $query) => $query->orderBy('firstname')->orderBy('lastname'),
                    )
                    ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->firstname} {$record->lastname}")
                    ->required()
                    ->searchable(['firstname', 'lastname', 'email']),
                Forms\Components\Select::make('role_id')
                    ->relationship(
                        name: 'role',
                        titleAttribute: 'name',
                    )
                    ->required()
                    ->searchable(['name',])
                    ->preload(),
                Forms\Components\Select::make('group_id')
                    ->relationship(
                        name: 'group',
                        titleAttribute: 'name',
                    )
                    ->searchable(['name', 'description', 'place',])
                    ->preload(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('Name'))
                    ->searchable(['users.firstname', 'users.lastname'])
                    ->sortable(),
                Tables\Columns\TextColumn::make('role.name')
                    ->label(__('Role'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('group.name')
                    ->label(__('Group'))
                    ->searchable()
                    ->sortable(),

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
            'index' => Pages\ListHrManagers::route('/'),
            'create' => Pages\CreateHrManager::route('/create'),
            'edit' => Pages\EditHrManager::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Recruiters');
    }

    public static function getNavigationLabel(): string
    {
        return __('Recruiters');
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HrManagerResource\Pages;
use App\Filament\Resources\HrManagerResource\RelationManagers;
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
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('firstname')->orderBy('lastname'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->firstname} {$record->lastname}")
                    ->required()
                    ->searchable(['firstname', 'lastname', 'email']),
                Forms\Components\Select::make('role_id')
                    ->relationship(
                        name: 'role',
                        titleAttribute: 'type',
                    )
                    ->required()
                    ->searchable(['type',])
                    ->preload(),
                Forms\Components\Select::make('group_id')
                    ->relationship(
                        name: 'group',
                        titleAttribute: 'name',
                    )
                    ->searchable(['name', 'description', 'place',])

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
                Tables\Columns\TextColumn::make('role.type')
                    ->label(__('Role'))
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

    
    public static function getNavigationGroup(): ?string
    {
        return __('Outils');
    }
}

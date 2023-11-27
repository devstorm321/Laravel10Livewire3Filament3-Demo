<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GroupResource\Pages;
use App\Filament\Resources\GroupResource\RelationManagers;
use App\Models\Group;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GroupResource extends Resource
{
    protected static ?string $model = Group::class;

    protected static ?string $navigationIcon = 'heroicon-m-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->statePath('group')
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Group Name'))
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label(__('Description'))
                    ->required(),
                Forms\Components\TextInput::make('video_url')
                    ->label(__('Video Url')),
                Forms\Components\TextInput::make('ai_token')
                    ->label(__('AI Token')),
                Forms\Components\TextInput::make('subscrition_type')
                    ->label(__('Subscription Type')),
                Forms\Components\TextInput::make('place')
                    ->label(__('Place'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('Group Name'))
                    ->description(fn (Group $record): string => $record->description ? $record->description : '', position: 'below')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('video_url')->label(__('Video Url'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ai_token')->label(__('AI Token'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subscription_type')->label(__('Subscription Type'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('place')->label(__('place'))
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
            'index' => Pages\ListGroups::route('/'),
            'create' => Pages\CreateGroup::route('/create'),
            'edit' => Pages\EditGroup::route('/{record}/edit'),
        ];
    }
}

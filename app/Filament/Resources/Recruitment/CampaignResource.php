<?php

namespace App\Filament\Resources\Recruitment;

use App\Filament\Resources\Recruitment\CampaignResource\Pages;
use App\Filament\Resources\Recruitment\CampaignResource\RelationManagers;
use App\Models\Campaign;
use App\Models\Group;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Recruitment\CampaignResource\Widgets\CampaignStats;

class CampaignResource extends Resource {
    protected static ?string $model = Campaign::class;

    protected static ?int $sort = 2;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    public static function form(Form $form): Form {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('')
                            ->schema([
                                Forms\Components\select::make('group_id')
                                    ->label('Group')
                                    ->relationship('group', 'name')
                                    ->searchable()
                                    ->preload(),

                                Forms\Components\select::make('brand_id')
                                    ->label('Brand')
                                    ->relationship('brand', 'name')
                                    ->searchable()
                                    ->preload(),

                                Forms\Components\select::make('unit_id')
                                    ->label('Unit')
                                    ->relationship('unit', 'name')
                                    ->searchable()
                                    ->preload(),

                                Forms\Components\Toggle::make('public_show_entity')
                                    ->label('Mention the entity in the advertisement visible to the public')
                                    ->columnSpan('full')
                                    ->default(false),
                            ])
                            ->columns(3),

                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Job title')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('video_presentation_url')
                                    ->label('Video presentation')
                                    ->url()
                                    ->maxLength(255),

                                Forms\Components\MarkdownEditor::make('description')
                                    ->label('Job description'),
                            ]),

                        Forms\Components\Section::make('Illustration')
                            ->schema([
                                Forms\Components\FileUpload::make('illustration')
                                    ->label('')
                                    ->columnSpan('full'),

                                Forms\Components\Toggle::make('show_on_indeed')
                                    ->label('Share on indeed')
                                    ->default(false),

                                Forms\Components\Toggle::make('show_on_carreer_site')
                                    ->label('Share on career site')
                                    ->default(false),

                                Forms\Components\Toggle::make('show_on_linked_in')
                                    ->label('Share on linked-in')
                                    ->default(false),

                            ])
                            ->columns(2),

                        Forms\Components\Section::make('title')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('SKU (Stock Keeping Unit)')
                                    ->maxLength(255)
                                    ->required(),

                                Forms\Components\TextInput::make('title')
                                    ->label('Barcode (ISBN, UPC, GTIN, etc.)')
                                    ->maxLength(255)
                                    ->required(),

                                Forms\Components\TextInput::make('title')
                                    ->label('Quantity')
                                    ->numeric()
                                    ->rules(['integer', 'min:0'])
                                    ->required(),

                                Forms\Components\TextInput::make('title')
                                    ->helperText('The safety stock is the limit stock for your products which alerts you if the product stock will soon be out of stock.')
                                    ->numeric()
                                    ->rules(['integer', 'min:0'])
                                    ->required(),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('title')
                            ->schema([
                                Forms\Components\Checkbox::make('title')
                                    ->label('This product can be returned'),

                                Forms\Components\Checkbox::make('title')
                                    ->label('This product will be shipped'),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('title')
                            ->schema([
                                Forms\Components\Toggle::make('title')
                                    ->label('Visible')
                                    ->helperText('This product will be hidden from all sales channels.')
                                    ->default(true),

                                Forms\Components\DatePicker::make('title')
                                    ->label('Availability')
                                    ->default(now())
                                    ->required(),
                            ]),

                        Forms\Components\Section::make('title')
                            ->schema([
                                Forms\Components\Select::make('title')
                                    ->relationship('brand', 'name')
                                    ->searchable(),

                                Forms\Components\Select::make('title')
                                    ->relationship('categories', 'name')
                                    ->multiple()
                                    ->required(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
            ])
            ->filters([
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

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListCampaigns::route('/'),
            'create' => Pages\CreateCampaign::route('/create'),
            'edit' => Pages\EditCampaign::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array {
        return [
            CampaignStats::class,
        ];
    }


    public static function getNavigationBadge(): ?string {
        return static::$model::count();
    }
}

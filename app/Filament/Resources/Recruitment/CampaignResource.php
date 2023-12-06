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

                                Forms\Components\TextInput::make('video_interview_url')
                                    ->label('Insert a video presentation of the position')
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

                        Forms\Components\Section::make('')
                            ->schema([
                                Forms\Components\CheckboxList::make('contracts_types')
                                    ->label('Type of position')
                                    ->options([
                                        'cdd' => 'CDD',
                                        'cdi' => 'CDI',
                                        'stage' => 'Stage',
                                        'alternance' => 'Alternance',
                                        'interim' => 'Interim'
                                    ])
                                    ->columns(5)
                                    ->columnSpan('full')
                                    ->required(),

                                Forms\Components\CheckboxList::make('travel_scope')
                                    ->label('Travel zone')
                                    ->options([
                                        'department' => 'Department',
                                        'national' => 'National',
                                        'international' => 'International',
                                        'no' => 'No'
                                    ])
                                    ->columns(4)
                                    ->columnSpan('full')
                                    ->required(),

                                Forms\Components\CheckboxList::make('employment_type')
                                    ->label('Opening hours')
                                    ->options([
                                        'full-time' => 'Full-time',
                                        'part-time' => 'Part-time work',
                                        'teleworking' => 'Teleworking',
                                        'partial_teleworking' => 'Partial teleworking'
                                    ])
                                    ->columns(4)
                                    ->columnSpan('full')
                                    ->required(),

                                Forms\Components\DatePicker::make('start_date_expected')
                                    ->label('Starting date')
                                    ->default(now())
                                    ->columnSpan('full'),

                                Forms\Components\TextInput::make('salary_range')
                                    ->label('Salary')
                                    ->helperText('Gross annual salary range.')
                                    ->numeric()
                                    ->prefix('€'),

                                Forms\Components\Toggle::make('show_salary_range')
                                    ->label('Show salary')
                                    ->inline(false)
                                    ->default(false),

                                Forms\Components\TextInput::make('work_location_coordinates')
                                    ->label('Place of work')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan('full'),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('')
                            ->schema([
                                Forms\Components\Select::make('private_tags')
                                    ->label('Private tags')
                                    ->searchable()
                                    ->multiple(),

                                Forms\Components\Select::make('public_tags')
                                    ->label('Public tags')
                                    ->searchable()
                                    ->multiple(),

                                Forms\Components\Select::make('managers')
                                    ->label('Manager')
                                    ->searchable()
                                    ->multiple()
                                    ->columnSpan('full'),

                                Forms\Components\Toggle::make('manager_email_alerts')
                                    ->label('Notify managers by email when a job application is received')
                                    ->default(false)
                                    ->columnSpan('full'),
                            ])
                            ->columns(2),

                        // Forms\Components\Section::make('')
                        //     ->schema([
                        //         Forms\Components\Toggle::make('')
                        //             ->label('Insert a questionnaire')
                        //             ->default(false),

                        //         Forms\Components\Toggle::make('')
                        //             ->label('Insert a personality test')
                        //             ->default(false),
                        //     ])
                        //     ->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),

                // Forms\Components\Group::make()
                //     ->schema([
                //         Forms\Components\Section::make('')
                //             ->schema([
                //                 Forms\Components\Toggle::make('title')
                //                     ->label('Share this campaign')
                //                     ->default(false),

                //                 Forms\Components\Toggle::make('title')
                //                     ->label('Follow the campaign')
                //                     ->default(false),
                //             ]),
                //     ])
                //     ->columnSpan(['lg' => 1]),
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

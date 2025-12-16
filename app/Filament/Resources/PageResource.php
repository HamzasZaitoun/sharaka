<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Page Content')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Info')
                            ->schema([
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('title.en')
                                    ->label('Title (EN)')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('title.ar')
                                    ->label('Title (AR)')
                                    ->maxLength(255),
                                Forms\Components\Toggle::make('is_published')
                                    ->default(false),
                            ]),
                        Forms\Components\Tabs\Tab::make('Page Builder')
                            ->schema([
                                Forms\Components\Repeater::make('content')
                                    ->label('Content Blocks')
                                    ->schema([
                                        Forms\Components\Select::make('type')
                                            ->label('Block Type')
                                            ->options([
                                                'hero' => 'Hero Section',
                                                'latest_news' => 'Latest News',
                                                'brand' => 'Brand Section',
                                            ])
                                            ->required()
                                            ->live(),
                                        
                                        // Hero Section Fields
                                        Forms\Components\TextInput::make('headline.en')
                                            ->label('Headline (EN)')
                                            ->visible(fn ($get) => $get('type') === 'hero'),
                                        Forms\Components\TextInput::make('headline.ar')
                                            ->label('Headline (AR)')
                                            ->visible(fn ($get) => $get('type') === 'hero'),
                                        Forms\Components\Textarea::make('sub_headline.en')
                                            ->label('Sub Headline (EN)')
                                            ->rows(3)
                                            ->visible(fn ($get) => $get('type') === 'hero'),
                                        Forms\Components\Textarea::make('sub_headline.ar')
                                            ->label('Sub Headline (AR)')
                                            ->rows(3)
                                            ->visible(fn ($get) => $get('type') === 'hero'),
                                        Forms\Components\TextInput::make('button_text')
                                            ->label('Button Text')
                                            ->visible(fn ($get) => $get('type') === 'hero'),
                                        Forms\Components\FileUpload::make('background_image')
                                            ->label('Background Image')
                                            ->image()
                                            ->directory('pages/hero')
                                            ->visibility('public')
                                            ->visible(fn ($get) => $get('type') === 'hero'),
                                        
                                        // Latest News Fields
                                        Forms\Components\TextInput::make('title')
                                            ->label('Section Title')
                                            ->default('LATEST NEWS')
                                            ->visible(fn ($get) => $get('type') === 'latest_news'),
                                        Forms\Components\TextInput::make('limit')
                                            ->label('News Limit')
                                            ->numeric()
                                            ->default(6)
                                            ->visible(fn ($get) => $get('type') === 'latest_news'),
                                        
                                        // Brand Section Fields
                                        Forms\Components\TextInput::make('section_id')
                                            ->label('Section ID (for anchor)')
                                            ->visible(fn ($get) => $get('type') === 'brand'),
                                        Forms\Components\TextInput::make('title')
                                            ->label('Section Title')
                                            ->visible(fn ($get) => $get('type') === 'brand'),
                                        Forms\Components\TextInput::make('subtitle.en')
                                            ->label('Subtitle (EN)')
                                            ->visible(fn ($get) => $get('type') === 'brand'),
                                        Forms\Components\TextInput::make('subtitle.ar')
                                            ->label('Subtitle (AR)')
                                            ->visible(fn ($get) => $get('type') === 'brand'),
                                        Forms\Components\Repeater::make('description')
                                            ->label('Description Paragraphs')
                                            ->schema([
                                                Forms\Components\Textarea::make('en')
                                                    ->label('Paragraph (EN)')
                                                    ->rows(2),
                                                Forms\Components\Textarea::make('ar')
                                                    ->label('Paragraph (AR)')
                                                    ->rows(2),
                                            ])
                                            ->visible(fn ($get) => $get('type') === 'brand'),
                                        Forms\Components\TextInput::make('logo_text')
                                            ->label('Logo Text')
                                            ->visible(fn ($get) => $get('type') === 'brand'),
                                        Forms\Components\Toggle::make('reverse_layout')
                                            ->label('Reverse Layout')
                                            ->default(false)
                                            ->visible(fn ($get) => $get('type') === 'brand'),
                                        Forms\Components\Repeater::make('gallery_items')
                                            ->label('Gallery Items')
                                            ->schema([
                                                Forms\Components\FileUpload::make('image')
                                                    ->image()
                                                    ->directory('pages/gallery')
                                                    ->visibility('public')
                                                    ->required(),
                                                Forms\Components\TextInput::make('title')
                                                    ->maxLength(255),
                                            ])
                                            ->visible(fn ($get) => $get('type') === 'brand'),
                                    ])
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['type'] ?? null)
                                    ->defaultItems(0),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('title', 'en'))
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_published')
                    ->query(fn ($query) => $query->where('is_published', true)),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}

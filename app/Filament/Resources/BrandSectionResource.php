<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandSectionResource\Pages;
use App\Models\BrandSection;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class BrandSectionResource extends Resource
{
    use Translatable;

    protected static ?string $model = BrandSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('key')
                    ->label(__('site.Key'))
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('title')
                    ->label(__('site.Title'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('subtitle')
                    ->label(__('site.Subtitle'))
                    ->maxLength(255),
                TextInput::make('logo_text')
                    ->label(__('site.Logo Text'))
                    ->maxLength(255),
                Repeater::make('description')
                    ->label(__('site.Description'))
                    ->schema([
                        TextInput::make('text')
                            ->label(__('site.Paragraph'))
                            ->required(),
                    ])
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? null),
                Toggle::make('is_active')
                    ->label(__('site.Is Active'))
                    ->default(true),
                    
                Repeater::make('items')
                    ->label(__('site.Items'))
                    ->relationship()
                    ->schema([
                        TextInput::make('title')
                            ->label(__('site.Title'))
                            ->maxLength(255),
                        FileUpload::make('image_path')
                            ->label(__('site.Image'))
                            ->image()
                            ->required()
                            ->directory('brand-items'),
                        TextInput::make('sort_order')
                            ->label(__('site.Sort Order'))
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(3)
                    ->grid(3)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->label(__('site.Key'))
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('site.Title'))
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->label(__('site.Is Active')),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getNavigationLabel(): string
    {
        return __('site.Brand Sections');
    }

    public static function getModelLabel(): string
    {
        return __('site.Brand Section');
    }

    public static function getPluralModelLabel(): string
    {
        return __('site.Brand Sections');
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
            'index' => Pages\ListBrandSections::route('/'),
            'create' => Pages\CreateBrandSection::route('/create'),
            'edit' => Pages\EditBrandSection::route('/{record}/edit'),
        ];
    }
}

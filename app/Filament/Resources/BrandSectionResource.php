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
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('subtitle')
                    ->maxLength(255),
                TextInput::make('logo_text')
                    ->maxLength(255),
                Repeater::make('description')
                    ->schema([
                        TextInput::make('text')->hiddenLabel()->required(),
                    ])
                    ->collapsible()
                    ->itemLabel(fn (array $state): ?string => $state['text'] ?? null),
                Toggle::make('is_active')
                    ->default(true),
                    
                Repeater::make('items')
                    ->relationship()
                    ->schema([
                        TextInput::make('title')->maxLength(255),
                        FileUpload::make('image_path')
                            ->image()
                            ->required()
                            ->directory('brand-items'),
                        TextInput::make('sort_order')->numeric()->default(0),
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
                TextColumn::make('key')->searchable(),
                TextColumn::make('title')->searchable(),
                ToggleColumn::make('is_active'),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
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

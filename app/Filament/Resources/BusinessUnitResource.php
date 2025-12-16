<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessUnitResource\Pages;
use App\Filament\Resources\BusinessUnitResource\RelationManagers;
use App\Filament\Forms\Components\ImagePicker;
use App\Models\BusinessUnit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BusinessUnitResource extends Resource
{
    protected static ?string $model = BusinessUnit::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Business Unit')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('English')
                            ->schema([
                                Forms\Components\TextInput::make('name.en')
                                    ->label('Name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('overview_title.en')
                                    ->label('Overview Title')
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('description.en')
                                    ->label('Description')
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Arabic')
                            ->schema([
                                Forms\Components\TextInput::make('name.ar')
                                    ->label('Name')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('overview_title.ar')
                                    ->label('Overview Title')
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('description.ar')
                                    ->label('Description')
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Media')
                            ->schema([
                                ImagePicker::make('logo')
                                    ->label('Logo')
                                    ->imageDirectory('images')
                                    ->helperText('Select an image from public/images directory'),
                                Forms\Components\Repeater::make('gallery')
                                    ->label('Gallery Images')
                                    ->schema([
                                        ImagePicker::make('image')
                                            ->label('Image')
                                            ->imageDirectory('images')
                                            ->required()
                                            ->helperText('Select an image from public/images directory'),
                                        Forms\Components\TextInput::make('title')
                                            ->label('Title')
                                            ->maxLength(255),
                                    ])
                                    ->defaultItems(0)
                                    ->minItems(0)
                                    ->maxItems(10)
                                    ->collapsible(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Settings')
                            ->schema([
                                Forms\Components\TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('logo')
                    ->formatStateUsing(fn ($state) => $state ? basename($state) : 'No logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->formatStateUsing(fn ($record) => $record->getTranslation('name', 'en'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ])
            ->defaultSort('sort_order');
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
            'index' => Pages\ListBusinessUnits::route('/'),
            'create' => Pages\CreateBusinessUnit::route('/create'),
            'edit' => Pages\EditBusinessUnit::route('/{record}/edit'),
        ];
    }
}

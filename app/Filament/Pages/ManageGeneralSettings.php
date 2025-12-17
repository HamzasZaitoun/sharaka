<?php

namespace App\Filament\Pages;

use App\Models\Page;
use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Filament\Forms\Get;

class ManageGeneralSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $navigationGroup = 'Settings';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Settings')
                    ->schema([
                        Forms\Components\Tabs\Tab::make('General')
                            ->schema([
                                Forms\Components\TextInput::make('logo_text')
                                    ->label('Logo Text')
                                    ->required(),
                                Forms\Components\TextInput::make('logo_subtext')
                                    ->label('Logo Subtext'),
                            ]),
                        Forms\Components\Tabs\Tab::make('Navigation')
                            ->schema([
                                Forms\Components\Repeater::make('navbar_links')
                                    ->label('Navigation Menu')
                                    ->schema([
                                        Forms\Components\Grid::make(2)->schema([
                                            Forms\Components\TextInput::make('label_en')
                                                ->label('Label (English)')
                                                ->required(),
                                            Forms\Components\TextInput::make('label_ar')
                                                ->label('Label (Arabic)')
                                                ->required(),
                                        ]),
                                        Forms\Components\Select::make('type')
                                            ->options([
                                                'external' => 'External Link / Anchor',
                                                'page' => 'Page',
                                            ])
                                            ->default('external')
                                            ->reactive(),
                                        Forms\Components\TextInput::make('url')
                                            ->label('URL or Anchor')
                                            ->helperText('e.g. #home or https://google.com')
                                            ->visible(fn (Get $get) => $get('type') === 'external')
                                            ->required(fn (Get $get) => $get('type') === 'external'),
                                        Forms\Components\Select::make('page_id')
                                            ->label('Select Page')
                                            ->options(fn () => Page::all()->mapWithKeys(function ($page) {
                                                    return [$page->id => $page->getTranslation('title', 'en') . ' (' . $page->slug . ')'];
                                                })
                                            )
                                            ->visible(fn (Get $get) => $get('type') === 'page')
                                            ->required(fn (Get $get) => $get('type') === 'page'),
                                    ])
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Footer')
                            ->schema([
                                Forms\Components\TextInput::make('footer_email'),
                                Forms\Components\TextInput::make('footer_phone'),
                                Forms\Components\TextInput::make('footer_copyright'),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }
}

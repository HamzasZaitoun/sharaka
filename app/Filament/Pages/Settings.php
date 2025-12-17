<?php

namespace App\Filament\Pages;

use App\Filament\Forms\Components\ImagePicker;
use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static string $view = 'filament.pages.settings';
    
    protected static ?string $navigationLabel = 'Settings';
    
    protected static ?int $navigationSort = 100;

    public ?array $data = [];

    public function mount(): void
    {
        $settings = app(GeneralSettings::class);
        
        $this->form->fill([
            'header_phone' => $settings->header_phone ?? '',
            'header_locations_text' => $settings->header_locations_text ?? '',
            'header_welcome_text' => $settings->header_welcome_text ?? '',
            'header_search_placeholder' => $settings->header_search_placeholder ?? ['en' => '', 'ar' => ''],
            'navbar_links' => $settings->navbar_links ?? [],
            'footer_phone' => $settings->footer_phone ?? '',
            'footer_email' => $settings->footer_email ?? '',
            'footer_copyright' => $settings->footer_copyright ?? '',
            'footer_about_title' => $settings->footer_about_title ?? ['en' => '', 'ar' => ''],
            'footer_about_links' => $settings->footer_about_links ?? [],
            'footer_contact_title' => $settings->footer_contact_title ?? ['en' => '', 'ar' => ''],
            'footer_newsletter_title' => $settings->footer_newsletter_title ?? ['en' => '', 'ar' => ''],
            'footer_newsletter_button' => $settings->footer_newsletter_button ?? ['en' => '', 'ar' => ''],
            'footer_newsletter_placeholder' => $settings->footer_newsletter_placeholder ?? ['en' => '', 'ar' => ''],
            'social_media_links' => $settings->social_media_links ?? [],
            'logo_text' => $settings->logo_text ?? 'CR',
            'logo_subtext' => $settings->logo_subtext ?? 'COMMANDER GROUP',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Logo')
                            ->schema([
                                Forms\Components\TextInput::make('logo_text')
                                    ->label('Logo Text')
                                    ->default('CR')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('logo_subtext')
                                    ->label('Logo Subtext')
                                    ->default('COMMANDER GROUP')
                                    ->maxLength(255),
                            ]),
                        Forms\Components\Tabs\Tab::make('Header')
                            ->schema([
                                Forms\Components\TextInput::make('header_phone')
                                    ->label('Phone Number')
                                    ->default('+962 7 9808 180')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('header_locations_text')
                                    ->label('Locations Text')
                                    ->default('Locations')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('header_welcome_text')
                                    ->label('Welcome Text')
                                    ->default('Welcome Amall')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('header_search_placeholder.en')
                                    ->label('Search Placeholder (English)')
                                    ->default('What are you looking for...')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('header_search_placeholder.ar')
                                    ->label('Search Placeholder (Arabic)')
                                    ->default('ماذا تبحث عن...')
                                    ->maxLength(255),
                                Forms\Components\Repeater::make('navbar_links')
                                    ->schema([
                                        Forms\Components\TextInput::make('label_en')
                                            ->label('Label (English)')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('label_ar')
                                            ->label('Label (Arabic)')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('href')
                                            ->label('URL/Slug')
                                            ->required()
                                            ->maxLength(255)
                                            ->helperText('Use #anchor for same-page links or page slug'),
                                    ])
                                    ->defaultItems(6)
                                    ->minItems(1)
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['label_en'] ?? null),
                            ]),
                        Forms\Components\Tabs\Tab::make('Footer')
                            ->schema([
                                Forms\Components\TextInput::make('footer_phone')
                                    ->label('Phone Number')
                                    ->default('+962 7 7554 1450')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('footer_email')
                                    ->label('Email')
                                    ->default('support@CDR.com')
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('footer_copyright')
                                    ->label('Copyright Text')
                                    ->default('All the content is Owned by CDR')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('footer_about_title.en')
                                    ->label('About Title (English)')
                                    ->default('ABOUT US')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('footer_about_title.ar')
                                    ->label('About Title (Arabic)')
                                    ->default('من نحن')
                                    ->maxLength(255),
                                Forms\Components\Repeater::make('footer_about_links')
                                    ->schema([
                                        Forms\Components\TextInput::make('label_en')
                                            ->label('Label (English)')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('label_ar')
                                            ->label('Label (Arabic)')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('href')
                                            ->label('URL')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->defaultItems(4)
                                    ->minItems(0)
                                    ->collapsible(),
                                Forms\Components\TextInput::make('footer_contact_title.en')
                                    ->label('Contact Title (English)')
                                    ->default('CONTACT US')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('footer_contact_title.ar')
                                    ->label('Contact Title (Arabic)')
                                    ->default('اتصل بنا')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('footer_newsletter_title.en')
                                    ->label('Newsletter Title (English)')
                                    ->default('Subscribe to our News Letter to Know About our Best Deals!')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('footer_newsletter_title.ar')
                                    ->label('Newsletter Title (Arabic)')
                                    ->default('اشترك في نشرتنا الإخبارية لمعرفة أفضل العروض!')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('footer_newsletter_button.en')
                                    ->label('Newsletter Button (English)')
                                    ->default('SUBMIT')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('footer_newsletter_button.ar')
                                    ->label('Newsletter Button (Arabic)')
                                    ->default('إرسال')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('footer_newsletter_placeholder.en')
                                    ->label('Newsletter Placeholder (English)')
                                    ->default('Email Address')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('footer_newsletter_placeholder.ar')
                                    ->label('Newsletter Placeholder (Arabic)')
                                    ->default('عنوان البريد الإلكتروني')
                                    ->maxLength(255),
                            ]),
                        Forms\Components\Tabs\Tab::make('Social Media')
                            ->schema([
                                Forms\Components\Repeater::make('social_media_links')
                                    ->schema([
                                        Forms\Components\Select::make('platform')
                                            ->label('Platform')
                                            ->options([
                                                'facebook' => 'Facebook',
                                                'twitter' => 'Twitter',
                                                'instagram' => 'Instagram',
                                                'youtube' => 'YouTube',
                                                'linkedin' => 'LinkedIn',
                                            ])
                                            ->required(),
                                        Forms\Components\TextInput::make('url')
                                            ->label('URL')
                                            ->url()
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->defaultItems(4)
                                    ->minItems(0)
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => $state['platform'] ?? null),
                            ]),
                    ])
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $settings = app(GeneralSettings::class);
            
            foreach ($data as $key => $value) {
                $settings->$key = $value;
            }
            
            $settings->save();

            Notification::make()
                ->title('Settings saved successfully')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error saving settings')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
    use \Filament\Pages\Concerns\InteractsWithFormActions;

    public function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')
                ->label('Save changes')
                ->submit('save'),
        ];
    }
}

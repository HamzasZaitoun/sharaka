@php
    $settings = app(App\Settings\GeneralSettings::class);
    $navLinks = $settings->navbar_links ?? [];
    
    // Predetermin pages to avoid N+1 queries
    $pageIds = collect($navLinks)->where('type', 'page')->pluck('page_id')->filter();
    $pages = \App\Models\Page::whereIn('id', $pageIds)->get()->keyBy('id');

    $navItems = collect($navLinks)->map(function ($item) use ($pages) {
        $locale = app()->getLocale();
        $label = $item['label_' . $locale] ?? $item['label_en'] ?? '';
        
        $href = '#';
        if (($item['type'] ?? 'external') === 'page') {
            $page = $pages[$item['page_id'] ?? 0] ?? null;
            if ($page) {
                $href = route('page.show', $page->slug);
            }
        } else {
            $href = $item['url'] ?? '#';
        }

        return ['label' => $label, 'href' => $href];
    });
@endphp

<header class="sticky top-0 z-50 bg-white shadow-sm">
    <!-- Top bar -->
    <div class="bg-white py-3 border-b border-gray-200">
        <div class="container flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-4">
                <a href="/" class="flex items-center no-underline">
                    <img src="{{ asset('images/logo.png') }}" alt="CDR Commander Group" class="h-12 w-auto" />
                </a>
            </div>

            <!-- Search bar -->
            <div class="hidden md:flex items-center bg-white border border-gray-300 rounded-full px-4 py-2 w-72">
                <input
                    type="text"
                    placeholder="{{ __('site.What are you looking for...') }}"
                    class="flex-1 bg-transparent text-sm outline-none placeholder:text-gray-400 border-none focus:ring-0 font-century"
                />
                <x-heroicon-o-magnifying-glass class="w-4 h-4 text-gray-400" />
            </div>

            <!-- Right side: Language, Locations, Phone, Welcome -->
            <div class="hidden lg:flex items-center gap-4 text-sm">
                <!-- Language Switcher -->
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if($localeCode !== App::getLocale())
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="text-sm font-century text-gray-600 hover:text-gold transition-colors">
                            {{ $localeCode === 'ar' ? 'عربي' : 'EN' }}
                        </a>
                    @endif
                @endforeach
                
                <span class="text-gray-300">|</span>
                
                <!-- Locations -->
                <a href="#" class="flex items-center gap-1 text-gray-600 hover:text-gold transition-colors no-underline font-century">
                    <x-heroicon-s-map-pin class="w-4 h-4 text-red-500" />
                    <span>{{ __('site.Locations') }}</span>
                </a>
                
                <!-- Phone -->
                <a href="tel:+96279808180" class="flex items-center gap-2 text-gray-600 hover:text-gold transition-colors no-underline font-century border border-gray-300 rounded-full px-3 py-1">
                    <x-heroicon-s-phone class="w-4 h-4" />
                    <span>+962 7 9808 1801</span>
                </a>
                
                <!-- Welcome -->
                 <!-- <div class="flex items-center gap-1 text-gray-600 font-century">
                    <x-heroicon-s-user class="w-4 h-4" />
                    <span>{{ __('site.Welcome Amal') }}</span>
                </div>  -->
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200 h-[34px] flex items-center justify-center">
        <div class="container h-full flex items-center justify-center">
            <ul class="flex items-center justify-center gap-0 list-none m-0 p-0 h-full">
                @foreach($navItems as $item)
                    <li class="flex items-center h-full">
                        <a
                            href="{{ $item['href'] }}"
                            class="nav-text hover:text-gold transition-colors no-underline uppercase tracking-wide px-4 flex items-center h-full pt-1"
                        >
                            {{ $item['label'] }}
                        </a>
                        @if(!$loop->last)
                            <span class="text-gray-300 mx-2 mb-1">|</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>


@php
    $navItems = [
        ['label' => 'HOME', 'href' => '#home'],
        ['label' => 'ABOUT CDR', 'href' => '#about'],
        ['label' => 'AL QUBTAN', 'href' => '#alqubtan'],
        ['label' => 'CINEMA REELS', 'href' => '#cinema'],
        ['label' => 'SHARAKA++', 'href' => '#sharaka'],
        ['label' => 'EVENTS', 'href' => '#events'],
    ];
@endphp

<header class="sticky top-0 z-50 bg-card shadow-sm">
    <!-- Top bar -->
    <div class="bg-muted/50 py-2">
        <div class="container flex items-center justify-between">
            <div class="flex items-center gap-6">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2 no-underline">
                    <span class="text-2xl font-bold text-gold font-display">CR</span>
                    <div class="text-xs leading-tight">
                        <span class="font-semibold text-foreground">COMMANDER</span>
                        <br />
                        <span class="text-muted-foreground">GROUP</span>
                    </div>
                </a>
            </div>

            <!-- Search bar -->
            <div class="hidden md:flex items-center bg-background border border-border rounded-full px-4 py-2 w-64">
                <input
                    type="text"
                    placeholder="What are you looking for..."
                    class="flex-1 bg-transparent text-sm outline-none placeholder:text-muted-foreground border-none focus:ring-0"
                />
                <x-heroicon-o-magnifying-glass class="w-4 h-4 text-gold" />
            </div>

            <!-- Contact info -->
            <div class="hidden lg:flex items-center gap-6 text-sm">
                <a href="tel:+96279808180" class="flex items-center gap-2 text-foreground hover:text-gold transition-colors no-underline">
                    <x-heroicon-o-phone class="w-4 h-4" />
                    <span>+962 7 9808 180</span>
                </a>
                <a href="#" class="flex items-center gap-2 text-muted-foreground hover:text-gold transition-colors no-underline">
                    <x-heroicon-o-map-pin class="w-4 h-4" />
                    <span>Locations</span>
                </a>
                <!-- Language Switcher -->
                <div class="flex items-center gap-2">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        @if($localeCode !== App::getLocale())
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="text-sm font-medium hover:text-gold transition-colors uppercase">
                                {{ $localeCode }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="container py-4">
        <ul class="flex items-center justify-center gap-8 list-none m-0 p-0">
            @foreach($navItems as $item)
                <li>
                    <a
                        href="{{ $item['href'] }}"
                        class="text-sm font-medium text-foreground hover:text-gold transition-colors tracking-wide no-underline"
                    >
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</header>

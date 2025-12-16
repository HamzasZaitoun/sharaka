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
    <div class="bg-muted/50 py-2">
        <div class="container flex items-center justify-between">
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-gold font-display">CR</span>
                    <div class="text-xs leading-tight">
                        <span class="font-semibold text-foreground">COMMANDER</span>
                        <br />
                        <span class="text-muted-foreground">GROUP</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center bg-background border border-border rounded-full px-4 py-2 w-64">
                <input
                    type="text"
                    placeholder="What are you looking for..."
                    class="flex-1 bg-transparent text-sm outline-none placeholder:text-muted-foreground"
                />
                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <div class="hidden lg:flex items-center gap-6 text-sm">
                <a href="tel:+96279808180" class="flex items-center gap-2 text-foreground hover:text-gold transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <span>+962 7 9808 180</span>
                </a>
                <a href="#" class="flex items-center gap-2 text-muted-foreground hover:text-gold transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Locations</span>
                </a>
                <a href="#" class="flex items-center gap-2 text-muted-foreground hover:text-gold transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Welcome Amall</span>
                </a>
                <a href="{{ route('locale.switch', ['locale' => app()->getLocale() === 'en' ? 'ar' : 'en']) }}" class="text-muted-foreground hover:text-gold transition-colors">
                    {{ app()->getLocale() === 'en' ? 'عربي' : 'English' }}
                </a>
            </div>
        </div>
    </div>
    <nav class="container py-4">
        <ul class="flex items-center justify-center gap-8">
            @foreach($navItems as $item)
                <li>
                    <a href="{{ $item['href'] }}" class="text-sm font-medium text-foreground hover:text-gold transition-colors tracking-wide">
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</header>


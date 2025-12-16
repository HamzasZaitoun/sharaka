@php
    $title = $data['title'] ?? 'LATEST NEWS';
    $limit = $data['limit'] ?? 6;
    $newsItems = \App\Models\News::whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->orderBy('published_at', 'desc')
        ->take($limit)
        ->get();
@endphp

<section class="py-16 bg-background">
    <div class="container">
        <div class="flex items-center justify-center gap-4 mb-10">
            <div class="h-px flex-1 bg-gradient-to-r from-transparent to-border"></div>
            <h2 class="text-2xl font-display font-semibold text-foreground tracking-wider">{{ $title }}</h2>
            <div class="h-px flex-1 bg-gradient-to-l from-transparent to-border"></div>
        </div>
        <div class="relative">
            <button class="absolute -left-4 top-1/2 -translate-y-1/2 z-10 w-8 h-8 rounded-full bg-card shadow-md flex items-center justify-center text-muted-foreground hover:text-gold transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @forelse($newsItems as $item)
                    <div class="group">
                        <div class="aspect-[3/4] rounded-lg overflow-hidden mb-3 bg-muted">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->getTranslation('title', app()->getLocale(), 'en') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-gold/20 to-gold/10"></div>
                            @endif
                        </div>
                        <h3 class="text-sm font-semibold text-foreground mb-1 line-clamp-1">{{ $item->getTranslation('title', app()->getLocale(), 'en') }}</h3>
                        <p class="text-xs text-muted-foreground line-clamp-2 mb-2">{{ Str::limit($item->getTranslation('excerpt', app()->getLocale(), 'en'), 80) }}</p>
                        <a href="{{ route('news.show', $item->slug) }}" class="inline-block text-xs font-medium bg-gold text-primary-foreground px-3 py-1.5 rounded hover:bg-gold/90 transition-colors">READ MORE</a>
                    </div>
                @empty
                    <div class="col-span-full text-center text-muted-foreground">No news available at the moment.</div>
                @endforelse
            </div>
            <button class="absolute -right-4 top-1/2 -translate-y-1/2 z-10 w-8 h-8 rounded-full bg-card shadow-md flex items-center justify-center text-muted-foreground hover:text-gold transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>
</section>


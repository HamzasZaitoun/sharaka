@props(['newsItems'])

<section class="py-16 bg-background">
    <div class="container">
        <!-- Section header -->
        <div class="flex items-center justify-center gap-4 mb-10">
            <div class="h-px flex-1 bg-gradient-to-r from-transparent to-border"></div>
            <h2 class="text-2xl font-display font-semibold text-foreground tracking-wider">
                LATEST NEWS
            </h2>
            <div class="h-px flex-1 bg-gradient-to-l from-transparent to-border"></div>
        </div>

        <!-- News carousel (Simplified grid for now, or use swiper if needed. React code used a button but grid 6 cols. I will use grid.) -->
        <div class="relative">
            <!-- Buttons are visual only in grid mode unless I implement slide? React code has buttons left/right but grid-cols-6. It implies horizontal scroll or just decoration? I'll implement horizontal scroll or just grid. The react code shows "grid grid-cols-6". If there are only 6 items, buttons do nothing? I'll start with grid. -->
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($newsItems as $item)
                    <div class="group">
                        <div class="aspect-[3/4] rounded-lg overflow-hidden mb-3 bg-muted">
                            <img
                                src="{{ asset('storage/' . $item->image_path) }}"
                                alt="{{ $item->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                            />
                        </div>
                        <h3 class="text-sm font-semibold text-foreground mb-1 line-clamp-1">
                            {{ $item->title }}
                        </h3>
                        <p class="text-xs text-muted-foreground line-clamp-2 mb-2">
                            {{ $item->description }}
                        </p>
                        <button class="text-xs font-medium bg-gold text-primary-foreground px-3 py-1.5 rounded hover:bg-gold/90 transition-colors">
                            READ MORE
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

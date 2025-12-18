@props(['newsItems'])

<section class="py-8 bg-white">
    <div class="container">
        <!-- Section header with gray background -->
        <div class="bg-[#b8b8b8] py-3 mb-8">
            <div class="flex items-center justify-center gap-4">
                <div class="h-px w-8 bg-gold"></div>
                <h2 class="section-title text-center tracking-widest">
                    {{ __('site.LATEST NEWS') }}
                </h2>
                <div class="h-px w-8 bg-gold"></div>
            </div>
        </div>

        <!-- News carousel with navigation -->
        <div class="relative">
            <!-- Left Arrow -->
            <button class="absolute -left-4 top-1/2 -translate-y-1/2 z-10 w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gold transition-colors">
                <x-heroicon-o-chevron-left class="w-6 h-6" />
            </button>
            
            <!-- Right Arrow -->
            <button class="absolute -right-4 top-1/2 -translate-y-1/2 z-10 w-8 h-8 flex items-center justify-center text-gray-400 hover:text-gold transition-colors">
                <x-heroicon-o-chevron-right class="w-6 h-6" />
            </button>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($newsItems as $item)
                    @php
                        $imagePath = $item->image_path;
                        $imageUrl = str_starts_with($imagePath, 'images/') ? '/' . $imagePath : asset('storage/' . $imagePath);
                    @endphp
                    <div class="group">
                        <div class="aspect-[3/4] overflow-hidden mb-3 bg-gray-100">
                            <img
                                src="{{ $imageUrl }}"
                                alt="{{ $item->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                            />
                        </div>
                        <h3 class="news-title mb-1 line-clamp-1">
                            {{ $item->title }}
                        </h3>
                        <p class="news-text line-clamp-2 mb-3">
                            {{ $item->description }}
                        </p>
                        <button class="btn-dark text-xs px-4 py-2">
                            {{ __('site.READ MORE') }}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

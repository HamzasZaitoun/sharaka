@props(['slides'])

<section id="home" className="bg-hero-dark relative overflow-hidden" x-data="{ 
    activeSlide: 0, 
    slides: {{ $slides->toJson() }},
    next() { this.activeSlide = (this.activeSlide + 1) % this.slides.length },
    prev() { this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length }
}">
    <div class="container py-16">
        <template x-if="slides.length > 0">
        <div class="flex items-center gap-8">
            <!-- Navigation arrow -->
            <button @click="prev()" class="hidden md:flex shrink-0 w-10 h-10 rounded-full border border-muted-foreground/30 items-center justify-center text-muted-foreground/50 hover:border-gold hover:text-gold transition-colors">
                <x-heroicon-o-chevron-left class="w-5 h-5" />
            </button>

            <!-- Content area -->
            <div class="flex-1 flex flex-col md:flex-row items-center gap-8">
                <!-- Image carousel -->
                <div class="w-full md:w-1/2 relative">
                    <div class="aspect-[4/3] rounded-lg overflow-hidden bg-muted/20">
                        <img 
                            :src="'/storage/' + slides[activeSlide].image_path" 
                            :alt="slides[activeSlide].title" 
                            class="w-full h-full object-cover transition-opacity duration-500"
                        />
                    </div>
                    <!-- Overlay with branding -->
                    <div class="absolute bottom-4 left-4 right-4 flex items-end justify-between">
                        <div class="flex items-center gap-2 text-card-foreground">
                            <span class="text-xl font-bold text-gold font-display">CR</span>
                            <span class="text-xs opacity-80">COMMANDER · GROUP</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gold text-xl font-display">Reels</span>
                        </div>
                    </div>
                </div>

                <!-- Text content -->
                <div class="w-full md:w-1/2 text-card">
                    <h1 class="text-4xl md:text-5xl font-display font-bold text-gold mb-6" x-text="slides[activeSlide].title"></h1>
                    <p class="text-card/90 leading-relaxed mb-4" x-text="slides[activeSlide].description"></p>
                    
                    <button class="px-6 py-2.5 border border-gold text-gold font-medium text-sm hover:bg-gold hover:text-primary-foreground transition-colors rounded">
                        READ MORE
                    </button>
                </div>
            </div>

            <!-- Navigation arrow -->
            <button @click="next()" class="hidden md:flex shrink-0 w-10 h-10 rounded-full border border-muted-foreground/30 items-center justify-center text-muted-foreground/50 hover:border-gold hover:text-gold transition-colors">
                <x-heroicon-o-chevron-right class="w-5 h-5" />
            </button>
        </div>
        </template>
    </div>
</section>

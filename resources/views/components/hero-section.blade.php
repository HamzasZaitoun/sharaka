@props(['slides'])

@php
    $slidesData = collect($slides)->map(function($slide) {
        $imagePath = $slide->image_path;
        if (str_starts_with($imagePath, 'images/')) {
            $imageUrl = '/' . $imagePath;
        } else {
            $imageUrl = '/storage/' . $imagePath;
        }
        
        return [
            'id' => $slide->id,
            'image_path' => $imageUrl,
        ];
    });
@endphp

@if($slides->count() > 0)
<section id="home" class="relative w-full max-w-[98%] 2xl:max-w-[95%] mx-auto mt-2 md:mt-4 rounded-2xl overflow-hidden shadow-2xl" x-data="{ 
    activeSlide: 0, 
    slides: {{ $slidesData->toJson() }},
    next() { this.activeSlide = (this.activeSlide + 1) % this.slides.length },
    prev() { this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length }
}">
    <!-- Navigation Arrows -->
    <button @click="prev()" class="absolute left-2 md:left-4 top-1/2 -translate-y-1/2 z-30 w-8 h-8 md:w-12 md:h-12 flex items-center justify-center text-white/50 hover:text-gold transition-colors duration-300 bg-black/20 rounded-full md:bg-transparent">
        <x-heroicon-o-chevron-left class="w-6 h-6 md:w-10 md:h-10" />
    </button>
    <button @click="next()" class="absolute right-2 md:right-4 top-1/2 -translate-y-1/2 z-30 w-8 h-8 md:w-12 md:h-12 flex items-center justify-center text-white/50 hover:text-gold transition-colors duration-300 bg-black/20 rounded-full md:bg-transparent">
        <x-heroicon-o-chevron-right class="w-6 h-6 md:w-10 md:h-10" />
    </button>
    
    <!-- Slides -->
    <div class="relative w-full bg-gray-900">
        <template x-for="(slide, index) in slides" :key="index">
            <div 
                x-show="activeSlide === index"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="relative w-full"
            >
                <!-- Responsive Image (Maintains text readability since text is in image) -->
                <img :src="slide.image_path" alt="Hero Slide" class="w-full h-auto object-contain block" />
                
                <!-- Overlay Container for Interactive Elements -->
                <div class="absolute inset-0 container mx-auto px-4">
                    <div class="relative w-full h-full">
                        <!-- READ MORE Button Positioned Bottom Right -->
                        <!-- Using percentage positioning to roughly match the "Who we are" text location in the image -->
                        <div class="absolute bottom-[10%] right-[5%] md:right-[10%] lg:bottom-[15%] lg:right-[15%]">
                            <a href="#sharaka" class="bg-white text-black text-[10px] md:text-xs lg:text-sm font-bold tracking-[0.2em] px-4 py-2 md:px-8 md:py-3 rounded hover:bg-gold hover:text-white transition-colors duration-300 shadow-lg uppercase inline-block cursor-pointer">
                                {{ __('site.READ MORE') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</section>
@endif

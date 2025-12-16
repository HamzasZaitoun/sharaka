@php
    $headline = $data['headline'][app()->getLocale()] ?? $data['headline']['en'] ?? 'Who we are';
    $subHeadline = $data['sub_headline'][app()->getLocale()] ?? $data['sub_headline']['en'] ?? '';
    $buttonText = $data['button_text'] ?? 'READ MORE';
    $bgImage = $data['background_image'] ?? null;
@endphp

<section id="home" class="bg-hero-dark relative overflow-hidden">
    <div class="container py-16">
        <div class="flex items-center gap-8">
            <button class="hidden md:flex shrink-0 w-10 h-10 rounded-full border border-muted-foreground/30 items-center justify-center text-muted-foreground/50 hover:border-gold hover:text-gold transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <div class="flex-1 flex flex-col md:flex-row items-center gap-8">
                <div class="w-full md:w-1/2 relative">
                    <div class="aspect-[4/3] rounded-lg overflow-hidden bg-muted/20">
                        @if($bgImage)
                            <img src="{{ asset('storage/' . $bgImage) }}" alt="Commander Group" class="w-full h-full object-cover" />
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-gold/20 to-gold/10"></div>
                        @endif
                    </div>
                    <div class="absolute bottom-4 left-4 right-4 flex items-end justify-between">
                        <div class="flex items-center gap-2 text-card-foreground">
                            <span class="text-xl font-bold text-gold font-display">CR</span>
                            <span class="text-xs opacity-80">COMMANDER · GROUP</span>
                        </div>
                        <span class="text-gold text-xl font-display">Reels</span>
                    </div>
                </div>
                <div class="w-full md:w-1/2 text-card">
                    <h1 class="text-4xl md:text-5xl font-display font-bold text-gold mb-6">{{ $headline }}</h1>
                    @if($subHeadline)
                        @if(is_array($subHeadline))
                            @foreach($subHeadline as $para)
                                <p class="text-card/90 leading-relaxed mb-4">{{ $para }}</p>
                            @endforeach
                        @else
                            <p class="text-card/90 leading-relaxed mb-4">{{ $subHeadline }}</p>
                        @endif
                    @endif
                    <button class="px-6 py-2.5 border border-gold text-gold font-medium text-sm hover:bg-gold hover:text-primary-foreground transition-colors rounded">
                        {{ $buttonText }}
                    </button>
                </div>
            </div>
            <button class="hidden md:flex shrink-0 w-10 h-10 rounded-full border border-muted-foreground/30 items-center justify-center text-muted-foreground/50 hover:border-gold hover:text-gold transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>
</section>


@php
    $sectionId = $data['section_id'] ?? '';
    $title = $data['title'] ?? '';
    $subtitle = $data['subtitle'][app()->getLocale()] ?? $data['subtitle']['en'] ?? '';
    $description = $data['description'] ?? [];
    $logoText = $data['logo_text'] ?? '';
    $items = $data['gallery_items'] ?? [];
    $reverse = $data['reverse_layout'] ?? false;
@endphp

<section id="{{ $sectionId }}" class="py-16 bg-background">
    <div class="container">
        <div class="flex items-center justify-center gap-4 mb-10">
            <div class="h-px flex-1 bg-gradient-to-r from-transparent to-border"></div>
            <h2 class="text-2xl font-display font-semibold text-foreground tracking-wider">{{ $title }}</h2>
            <div class="h-px flex-1 bg-gradient-to-l from-transparent to-border"></div>
        </div>
        <div class="flex flex-col {{ $reverse ? 'md:flex-row-reverse' : 'md:flex-row' }} gap-10 items-start">
            <div class="w-full md:w-1/2">
                <h3 class="text-xl font-semibold text-foreground mb-4">{{ $subtitle }}</h3>
                @if(is_array($description))
                    @foreach($description as $para)
                        @php
                            $paraText = $para[app()->getLocale()] ?? $para['en'] ?? '';
                        @endphp
                        @if($paraText)
                            <p class="text-muted-foreground leading-relaxed mb-4">{{ $paraText }}</p>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="w-full md:w-1/2">
                <div class="bg-hero-dark rounded-lg p-8 flex flex-col items-center justify-center aspect-video">
                    <h4 class="text-3xl font-display text-gold mb-2">{{ $logoText }}</h4>
                    <div class="w-16 h-px bg-gold/50 my-4"></div>
                    <span class="text-gold text-xl font-display">CR</span>
                </div>
                @if(count($items) > 0)
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        @foreach($items as $item)
                            <div class="text-center">
                                <div class="aspect-square rounded-lg overflow-hidden mb-2 bg-muted">
                                    @if(isset($item['image']))
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] ?? '' }}" class="w-full h-full object-cover" />
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-gold/20 to-gold/10"></div>
                                    @endif
                                </div>
                                @if(isset($item['title']))
                                    <p class="text-xs text-muted-foreground">{{ $item['title'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>


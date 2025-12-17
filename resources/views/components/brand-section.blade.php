@props(['section', 'reverse' => false])

@if($section)
<section id="{{ $section->key }}" class="py-16 {{ $reverse ? 'bg-muted/30' : 'bg-background' }}">
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-display font-bold text-gold mb-2">{{ $section->title }}</h2>
            @if($section->subtitle)
                <h3 class="text-xl text-foreground/80 mb-6">{{ $section->subtitle }}</h3>
            @endif
            
            <div class="max-w-3xl mx-auto space-y-4 text-muted-foreground">
                @if(is_array($section->description))
                    @foreach($section->description as $line)
                         <p>{{ is_array($line) ? ($line['text'] ?? '') : $line }}</p>
                    @endforeach
                @else
                    <p>{{ $section->description }}</p>
                @endif
            </div>
        </div>

        <div class="flex flex-col {{ $reverse ? 'md:flex-row-reverse' : 'md:flex-row' }} items-center gap-12">
            <!-- Content/Logo Side -->
            <div class="w-full md:w-1/3 text-center md:text-left">
                <div class="inline-block p-8 border-2 border-gold/20 rounded-lg">
                    <span class="text-4xl font-display font-bold text-gold">{{ $section->logo_text ?? $section->title }}</span>
                </div>
            </div>

            <!-- Items Grid -->
            <div class="w-full md:w-2/3">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($section->items->sortBy('sort_order') as $item)
                        <div class="group relative overflow-hidden rounded-lg aspect-square">
                            <img 
                                src="{{ asset('storage/' . $item->image_path) }}" 
                                alt="{{ $item->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            />
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="text-white font-display font-semibold text-lg">{{ $item->title }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

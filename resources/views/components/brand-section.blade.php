@props(['section', 'reverse' => false])

@if($section)
<section id="{{ $section->key }}" class="py-12 bg-white">
    <!-- Full Width Section Header -->
    <div class="w-full bg-[#dbdbdb] h-[34px] mb-12 flex items-center justify-center">
        <div class="container mx-auto px-4 h-full flex items-center justify-center">
            <div class="flex items-center justify-center gap-6 h-full">
                <div class="h-px w-12 bg-gold"></div>
                <h2 class="section-title text-center tracking-[0.2em] uppercase text-[#38393d] text-[25pt] leading-none">
                    {{ $section->title }}
                </h2>
                <div class="h-px w-12 bg-gold"></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4">
        <div class="flex flex-col {{ $reverse ? 'md:flex-row-reverse' : 'md:flex-row' }} gap-12 md:gap-16">
            <!-- Content Side -->
            <div class="w-full md:w-1/2 flex flex-col justify-center">
                @if($section->subtitle)
                    <h3 class="brand-title mb-6">{{ $section->subtitle }}</h3>
                @endif
                
                <div class="section-text space-y-6 text-justify">
                    @if(is_array($section->description))
                        @foreach($section->description as $line)
                            @if(is_array($line))
                                @if(isset($line['type']) && $line['type'] === 'bullet')
                                    <p class="pl-4 border-l-2 border-gold/50 ml-2">• {{ $line['text'] ?? '' }}</p>
                                @else
                                    <p>{{ $line['text'] ?? '' }}</p>
                                @endif
                            @else
                                <p>{{ $line }}</p>
                            @endif
                        @endforeach
                    @else
                        <p>{{ $section->description }}</p>
                    @endif
                </div>
            </div>

            <!-- Image/Logo Side -->
            <div class="w-full md:w-1/2">
                <!-- Brand Image (Full Width, No Background Container) -->
                <div class="w-full mb-8">
                    @if($section->key === 'qubtan')
                        <img src="/images/qubtan.png" alt="Al Qubtan" class="w-full h-auto shadow-lg rounded-sm hover:scale-105 transition-transform duration-500" onerror="this.style.display='none'" />
                    @elseif($section->key === 'cinema')
                        <img src="/images/reels.png" alt="Cinema Reels" class="w-full h-auto shadow-lg rounded-sm hover:scale-105 transition-transform duration-500" onerror="this.style.display='none'" />
                    @elseif($section->key === 'sharaka')
                        <img src="/images/sharaka.png" alt="Sharaka++" class="w-full h-auto shadow-lg rounded-sm hover:scale-105 transition-transform duration-500" onerror="this.style.display='none'" />
                    @else
                        <!-- Fallback for unknown keys, nice gold placeholder -->
                        <div class="w-full aspect-video bg-[#2a2a2a] flex items-center justify-center border border-gold/50">
                            <span class="text-6xl font-bold text-gold" style="font-family: 'Times New Roman', serif;">CR</span>
                        </div>
                    @endif
                </div>

                <!-- Items Grid (Vertical Images) -->
                @if($section->items && $section->items->count() > 0)
                    <div class="grid grid-cols-3 gap-6">
                        @foreach($section->items->sortBy('sort_order') as $item)
                            @php
                                $imagePath = $item->image_path;
                                $imageUrl = str_starts_with($imagePath, 'images/') ? '/' . $imagePath : asset('storage/' . $imagePath);
                            @endphp
                            <div class="text-center group">
                                <div class="w-full aspect-[3/4] overflow-hidden rounded-sm shadow-md mb-3 bg-gray-200 relative">
                                    <img 
                                        src="{{ $imageUrl }}" 
                                        alt="{{ $item->title }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    />
                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                                </div>
                                <p class="text-xs md:text-sm text-[#38393d] font-century font-bold uppercase tracking-wider">{{ $item->title }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

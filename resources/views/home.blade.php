@extends('layouts.app')

@section('title', 'CDR Group - Leading Jordanian Holding Group')

@section('content')
    <!-- Hero Section -->
    <section class="hero bg-gray-900 text-white relative overflow-hidden min-h-[720px] flex items-center">
        <div class="hero-bg absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 80%, rgba(197, 164, 101, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(197, 164, 101, 0.05) 0%, transparent 50%);"></div>
        <div class="container max-w-7xl mx-auto px-8 relative z-10">
            <div class="hero-content grid grid-cols-1 md:grid-cols-2 gap-24 items-center">
                <div class="hero-left">
                    <div class="hero-logo">
                        <div class="cr-monogram-large w-48 h-48 bg-yellow-600 text-gray-900 flex items-center justify-center font-bold text-6xl mb-12 mx-auto md:mx-0">CR</div>
                        <div class="subsidiary-logos flex flex-col gap-4">
                            <div class="sub-logo text-gray-300 text-base font-medium tracking-wider">SHARAKA++</div>
                            <div class="sub-logo text-gray-300 text-base font-medium tracking-wider">CINEMA REELS</div>
                            <div class="sub-logo text-gray-300 text-base font-medium tracking-wider">AL QUBTAN</div>
                        </div>
                    </div>
                </div>
                <div class="hero-right">
                    <div class="hero-frame bg-white bg-opacity-5 border-2 border-yellow-600 rounded-lg p-24">
                        <h1 class="hero-title font-uighur text-[72px] text-white mb-6">Who we are</h1>
                        <p class="hero-description font-century-reg text-content-body text-gray-300 mb-8 leading-relaxed">
                            CDR Group is a leading Jordanian holding and business incubator group, specialized in creative development, strategic production, and brand growth across multiple sectors.
                        </p>
                        <p class="hero-description font-century-reg text-content-body text-gray-300 mb-8 leading-relaxed">
                            With a forward-thinking vision and a dynamic team, CDR Group delivers innovative solutions, builds powerful partnerships, and transforms ideas into measurable success stories, empowering local talents and sustainable businesses across Jordan and beyond.
                        </p>
                        <button class="read-more-btn bg-yellow-600 text-gray-900 border-none px-8 py-4 text-base font-medium rounded cursor-pointer hover:bg-yellow-700 transition-colors">
                            READ MORE
                        </button>
                    </div>
                </div>
            </div>
            <div class="carousel-nav absolute top-1/2 right-8 transform -translate-y-1/2 flex flex-col gap-4">
                <button class="carousel-btn w-12 h-12 bg-yellow-600 bg-opacity-20 border border-yellow-600 text-yellow-600 rounded-full cursor-pointer text-2xl flex items-center justify-center hover:bg-yellow-600 hover:text-gray-900 transition-all">‹</button>
                <button class="carousel-btn w-12 h-12 bg-yellow-600 bg-opacity-20 border border-yellow-600 text-yellow-600 rounded-full cursor-pointer text-2xl flex items-center justify-center hover:bg-yellow-600 hover:text-gray-900 transition-all">›</button>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="news-section py-24 bg-gray-50">
        <div class="container max-w-7xl mx-auto px-8">
            <h2 class="section-title font-uighur text-[25pt] text-brand-dark text-center mb-16 relative">
                LATEST NEWS
                <span class="absolute bottom-[-16px] left-1/2 transform -translate-x-1/2 w-24 h-1 bg-yellow-600"></span>
            </h2>
            <div class="news-grid grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @forelse($news as $item)
                    <div class="news-card bg-white rounded overflow-hidden shadow-lg hover:shadow-xl transition-all hover:-translate-y-2">
                        @if($item->image)
                            <div class="news-image h-48 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $item->image) }}');"></div>
                        @else
                            <div class="news-image h-48 bg-gradient-to-br from-yellow-600 to-yellow-800"></div>
                        @endif
                        <div class="news-content p-6">
                            <h3 class="news-headline font-century-bold text-[10pt] text-brand-dark mb-3">{{ $item->getTranslation('title', app()->getLocale(), 'en') }}</h3>
                            <p class="news-description font-century-reg text-[9pt] text-gray-600 mb-4">{{ Str::limit($item->getTranslation('excerpt', app()->getLocale(), 'en'), 80) }}</p>
                            <a href="{{ route('news.show', $item->slug) }}" class="read-more-link text-yellow-600 font-medium text-sm hover:text-yellow-700 hover:underline transition-colors">
                                READ MORE →
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center font-century-reg text-content-body text-brand-dark">No news available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Business Units Section -->
    @foreach($businessUnits as $unit)
        @php
            $unitName = $unit->getTranslation('name', app()->getLocale(), 'en');
            $unitSlug = strtolower(str_replace(' ', '-', $unitName));
        @endphp
        <section id="{{ $unitSlug }}" class="company-section mb-32">
            <div class="container max-w-7xl mx-auto px-8">
                <!-- Company Banner -->
                <div class="company-banner bg-gray-900 h-60 flex items-center justify-center relative overflow-hidden mb-0">
                    <div class="hero-bg absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 80%, rgba(197, 164, 101, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(197, 164, 101, 0.05) 0%, transparent 50%);"></div>
                    <div class="banner-content text-center relative z-10">
                        <div class="company-logo font-uighur text-5xl font-bold text-yellow-600 mb-2">{{ strtoupper($unit->getTranslation('name', app()->getLocale(), 'en')) }}</div>
                        @if($unit->getTranslation('name', 'ar'))
                            <div class="arabic-calligraphy text-3xl text-yellow-600 mb-4" dir="rtl">{{ $unit->getTranslation('name', 'ar') }}</div>
                        @endif
                    </div>
                </div>
                
                <!-- Textured Divider -->
                <div class="textured-divider h-24 bg-gray-200 flex items-center justify-center relative" style="background-image: radial-gradient(circle at 10% 50%, rgba(0,0,0,0.02) 1px, transparent 1px), radial-gradient(circle at 30% 20%, rgba(0,0,0,0.02) 1px, transparent 1px), radial-gradient(circle at 70% 80%, rgba(0,0,0,0.02) 1px, transparent 1px); background-size: 20px 20px, 15px 15px, 25px 25px;">
                    <h2 class="divider-text font-century-bold text-3xl tracking-widest text-gray-600">{{ strtoupper($unit->getTranslation('name', app()->getLocale(), 'en')) }}</h2>
                </div>
                
                <!-- Company Content -->
                <div class="company-content grid grid-cols-1 md:grid-cols-2 gap-16 py-16">
                    <div class="company-text">
                        <h3 class="company-title font-century-bold text-[21pt] text-brand-dark mb-6 border-b-2 border-gray-200 pb-2">
                            {{ $unit->getTranslation('overview_title', app()->getLocale(), 'en') ?? $unit->getTranslation('name', app()->getLocale(), 'en') . ' Overview' }}
                        </h3>
                        <div class="company-description font-century-reg text-[18pt] text-brand-dark leading-relaxed space-y-4">
                            {!! $unit->getTranslation('description', app()->getLocale(), 'en') !!}
                        </div>
                    </div>
                    <div class="company-visual">
                        @if($unit->logo)
                            <div class="mb-6">
                                <img src="{{ asset('storage/' . $unit->logo) }}" alt="{{ $unit->getTranslation('name', app()->getLocale(), 'en') }}" class="w-full h-64 object-cover rounded-lg bg-gray-900">
                            </div>
                        @endif
                        @if($unit->gallery && count($unit->gallery) > 0)
                            <div class="grid grid-cols-3 gap-4">
                                @foreach(array_slice($unit->gallery ?? [], 0, 3) as $galleryItem)
                                    <div class="brand-card bg-gray-100 rounded-lg overflow-hidden p-6 flex flex-col items-center gap-4">
                                        @if(is_string($galleryItem))
                                            <img src="{{ asset('storage/' . $galleryItem) }}" alt="Gallery" class="w-full h-32 object-cover rounded">
                                        @elseif(is_array($galleryItem) && isset($galleryItem['image']))
                                            <img src="{{ asset('storage/' . $galleryItem['image']) }}" alt="{{ $galleryItem['title'] ?? 'Gallery' }}" class="w-full h-32 object-cover rounded">
                                            @if(isset($galleryItem['title']))
                                                <div class="brand-logo font-century-bold text-sm text-brand-dark text-center">{{ $galleryItem['title'] }}</div>
                                            @endif
                                        @else
                                            <div class="brand-image w-20 h-20 bg-gradient-to-br from-yellow-600 to-yellow-800 rounded-lg"></div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection

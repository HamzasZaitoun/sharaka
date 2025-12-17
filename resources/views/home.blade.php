<x-app-layout>
    <x-hero-section :slides="$heroSlides" />
    
    <x-latest-news :newsItems="$newsItems" />
    
    @foreach($brandSections as $section)
        <x-brand-section 
            :section="$section" 
            :reverse="$loop->iteration % 2 == 0" 
        />
    @endforeach
</x-app-layout>

<x-app-layout>
    @if($page->content && is_array($page->content) && count($page->content) > 0)
        @foreach($page->content as $block)
            @switch($block['type'] ?? '')
                @case('hero')
                    @include('blocks.hero-section', ['data' => $block])
                    @break
                @case('latest_news')
                    @include('blocks.latest-news', ['data' => $block])
                    @break
                @case('brand')
                    @include('blocks.brand-section', ['data' => $block])
                    @break
            @endswitch
        @endforeach
    @else
        {{-- Default view if no blocks are added yet --}}
        <div class="container mx-auto px-4 py-12">
            <h1 class="text-4xl font-bold mb-6 text-center font-serif">{{ $page->title }}</h1>
        </div>
    @endif
</x-app-layout>

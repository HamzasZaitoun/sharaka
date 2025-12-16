@extends('layouts.app')

@section('title', $page->getTranslation('title', app()->getLocale(), 'en'))

@section('content')
    @if($page->content && is_array($page->content))
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
    @endif
@endsection


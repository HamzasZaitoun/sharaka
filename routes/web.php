<?php

use App\Models\BrandSection;
use App\Models\HeroSlide;
use App\Models\NewsItem;
use App\Models\Page;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web']
    ],
    function () {
        Route::get('/', function () {
            $heroSlides = HeroSlide::where('is_active', true)->orderBy('sort_order')->get();
            $newsItems = NewsItem::orderBy('published_at', 'desc')->take(6)->get();
            // We want specific order: Al Qubtan, Cinema Reels, Sharaka++. 
            // We can fetch all and sort, or just fetch all.
            // Let's assume the user adds them and we show them.
            // Or we can try to order by ID or a 'sort_order' if we added it (we didn't add sort_order to BrandSection, only BrandItem).
            // Default ID order.
            $brandSections = BrandSection::where('is_active', true)->get();

            return view('home', compact('heroSlides', 'newsItems', 'brandSections'));
        })->name('home');

        // Dynamic page route
        Route::get('/{slug}', function ($slug) {
            $page = Page::where('slug', $slug)->where('is_published', true)->firstOrFail();
            return view('pages.show', compact('page'));
        })->name('page.show');
    }
);

// Fallback for 404 if not caught by localization or other routes
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

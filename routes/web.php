<?php

use App\Models\News;
use App\Models\BusinessUnit;
use App\Models\Page;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Language switcher
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('locale.switch');

// Homepage - use Page model if exists, otherwise fallback
Route::get('/', function () {
    $page = Page::where('slug', 'home')->where('is_published', true)->first();
    
    if ($page) {
        return view('pages.show', compact('page'));
    }
    
    // Fallback to old view
    $news = News::whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->orderBy('published_at', 'desc')
        ->take(5)
        ->get();
    
    $businessUnits = BusinessUnit::ordered()->get();
    
    return view('home', compact('news', 'businessUnits'));
})->name('home');

// News routes (must come before dynamic page routes)
Route::get('/news/{slug}', function ($slug) {
    $news = News::where('slug', $slug)->firstOrFail();
    return view('news.show', compact('news'));
})->name('news.show');

// Dynamic page routes (must be last)
Route::get('/{slug}', function ($slug) {
    // Exclude routes that should not be handled by pages
    if (in_array($slug, ['admin', 'lang', 'news'])) {
        abort(404);
    }
    
    $page = Page::where('slug', $slug)->where('is_published', true)->firstOrFail();
    return view('pages.show', compact('page'));
})->name('page.show');

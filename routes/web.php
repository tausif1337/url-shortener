<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;

// Default route for authentication
Route::get('/', function () {
    return view('auth.login');
});

// Routes protected by authentication middleware
Route::middleware([
    'auth:sanctum', // Sanctum authentication
    config('jetstream.auth_session'), // Jetstream session management
    'verified', // Email verification
])->group(function () {

    // URL Shortener Routes
    Route::get('/url_shortener', [UrlShortenerController::class, 'index'])->name('url_shortener')->middleware('role:superadmin|admin|user'); // Display all URL shorteners

    Route::post('/url_shortener', [UrlShortenerController::class, 'storeUrlShortener'])->name('store_url_shortener')->middleware('role:superadmin|admin|user'); // Store a new URL shortener

    Route::get('/edit_url_shortener/{id}', [UrlShortenerController::class, 'editUrlShortener'])->name('edit_url_shortener')->middleware('role:superadmin|admin|user'); // Edit a URL shortener

    Route::post('/update_form', [UrlShortenerController::class, 'updateUrlShortener'])->name('update_url_shortener')->middleware('role:superadmin|admin|user'); // Update a URL shortener

    Route::get('/delete_url_shortener/{id}', [UrlShortenerController::class, 'deleteUrlShortener'])->name('delete_url_shortener')->middleware('role:superadmin|admin|user'); // Delete a URL shortener
    
    // Redirect route for short URLs
    Route::get('/{shortUrl}', [UrlShortenerController::class, 'redirectToOriginalUrl'])->name('short_url.redirect');
});

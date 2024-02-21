<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\UrlShortener;

class UrlShortenerController extends Controller
{
    // Display all URL shorteners
    public function index()
    {
        $url_shorteners = UrlShortener::all();
        return view('pages.forms.url_shortener', compact('url_shorteners'));
    }

    // Store a new URL shortener
    public function StoreUrlShortener(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|unique:url_shorteners',
            'original_url' => 'required|url', // Validate URL format
        ]);

        // Generate short URL
        $shortUrl = $this->generateShortUrl(); // Generate short URL

        // Create URL Shortener record
        UrlShortener::create([
            'name' => $request->name,
            'original_url' => $request->original_url,
            'short_url' => $shortUrl,
            'click_count' => 0, // Initialize click count
            'created_by' => Auth::id(),
        ]);
        return redirect()->route('url_shortener')->with('message', 'Saved Successfully.');
    }

    // Generate short URL
    private function generateShortUrl()
    {
        // Generate short URL using hash function
        return Str::random(6); // Adjust the length as needed
    }

    // Redirect to the original URL when short URL is accessed
    public function redirectToOriginalUrl($shortUrl)
    {
        $urlShortener = UrlShortener::where('short_url', $shortUrl)->firstOrFail();
        $urlShortener->incrementClickCount(); // Increment click count
        return Redirect::away($urlShortener->original_url);
    }

    // Edit a URL shortener
    public function EditUrlShortener($id)
    {
        $id = Crypt::decrypt($id);
        $url_shorteners_info = UrlShortener::findOrFail($id);
        return view('pages.forms.edit_url_shortener', compact('url_shorteners_info'));
    }

    // Update a URL shortener
    public function UpdateUrlShortener(Request $request)
    {
        $id = Crypt::decrypt($request->id);

        $request->validate([
            'name' => 'required|unique:url_shorteners,name,' . $id,
            'original_url' => 'required|url', // Validate URL format
        ]);

        // Retrieve the URL Shortener record
        $urlShortener = UrlShortener::findOrFail($id);

        // Check if the requested name is already taken by another record
        $allUrlShortener = UrlShortener::where('name', '=', $request->name)->where('id', '!=', $id)->count();
        if ($allUrlShortener > 0) {
            return redirect()->route('url_shortener')->with('error', 'The URL name has already been taken.');
        }

        // Update the URL Shortener record
        $urlShortener->update([
            'name' => $request->name,
            'original_url' => $request->original_url,
            'updated_by' => Auth::id(),
            'updated_at' => now()
        ]);

        return redirect()->route('url_shortener')->with('message', 'Updated Successfully.');
    }


    // Delete a URL shortener
    public function DeleteUrlShortener($id)
    {
        $decryptedId = Crypt::decrypt($id);
        UrlShortener::findOrFail($decryptedId)->delete();
        return redirect()->route('url_shortener')->with('message', 'Deleted Successfully.');
    }
}

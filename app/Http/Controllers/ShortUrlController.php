<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ShortUrlService;
use Illuminate\Support\Facades\Redirect;

class ShortUrlController extends Controller
{
    private ShortUrlService $shortenUrlService;

    public function  __construct(ShortUrlService $shortenUrlService) {
        $this->shortenUrlService = $shortenUrlService;
    }

    public function view(string $hash) {
        $match = $this->shortenUrlService->findByHash($hash);

        // Send to home if not valid hash found
        return ($match ? Redirect::to($match->url) : Redirect::to('/'));
    }
}
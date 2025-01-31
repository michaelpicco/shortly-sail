<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ShortUrlService;
use Illuminate\Support\Facades\Redirect;

class ShortUrlController extends Controller
{

    /**
     * @param ShortUrlService $shortUrlModel
     */
    public function  __construct(
        private ShortUrlService $shortUrlService
    ) {}

    public function view(string $hash) {
        $match = $this->shortUrlService->findByHash($hash);

        // Send to home if not valid hash found
        return ($match ? Redirect::to($match->url) : Redirect::to('/'));
    }
}
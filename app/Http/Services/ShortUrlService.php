<?php

namespace App\Http\Services;

use App\Models\ShortUrls;
use Illuminate\Support\Facades\Redirect;

class ShortUrlService
{
    private ShortUrls $shortUrlModel;

    /**
     * @param ShortUrls $shortUrl
     */
    public function __construct(ShortUrls $shortUrl) {
        $this->shortUrlModel = $shortUrl;
    }

    public function findByHash(string $hash): ShortUrls|null {
        $locatedRecord = $this->shortUrlModel->where('hash', '=', $hash)->first();

        if (!$locatedRecord) {
            // We could throw this, but we need to gracefully handle it
            //throw new \Exception('No matching hash located');
        }

        return $locatedRecord;
    }
}
<?php

namespace App\Http\Services;

use App\Models\ShortUrls;

class ShortUrlService
{
    /**
     * @param ShortUrls $shortUrlModel
     */
    public function __construct(
        private ShortUrls $shortUrlModel
    ) {}

    public function findByHash(string $hash): ShortUrls|null {
        $locatedRecord = $this->shortUrlModel->where('hash', '=', $hash)->first();

        if (!$locatedRecord) {
            // We could throw this, but we need to gracefully handle it
            //throw new \Exception('No matching hash located');
        }

        return $locatedRecord;
    }
}
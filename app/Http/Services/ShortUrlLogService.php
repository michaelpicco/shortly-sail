<?php

namespace App\Http\Services;

use App\Models\ShortUrls;
use App\Models\ShortUrlsLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShortUrlLogService
{

    /**
     * @param ShortUrlsLog $shortUrlLog
     */     
    public function __construct(
        private ShortUrlsLog $shortUrlLog
    ) {}

    public function logEntry() {
        // Shortened URLs requests adhere to a strict format, so we explicitely expect and use the last 10 chars to derive hash value
        $hash = substr(request()->server('REQUEST_URI'), -10);

        if ($validShortUrl = ShortUrls::where('hash', '=', $hash)->first()) {
            $this->shortUrlLog->insert([
                'url_id' => $validShortUrl->id,
                'ip' => request()->server('REMOTE_ADDR'),
                'browser' => request()->server('HTTP_USER_AGENT'),
                'platform' => str_replace("\"", "", request()->server('HTTP_SEC_CH_UA_PLATFORM')),
                'referrer' => '', //  FIX ME request()->headers('HTTP_REFERER'),
                'created_at' => Carbon::Now()
            ]);            
        }

    }
}
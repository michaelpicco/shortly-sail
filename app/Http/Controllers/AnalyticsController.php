<?php

namespace App\Http\Controllers;

use App\Models\ShortUrls;
use App\Models\ShortUrlsLog;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    //
    public function view() {
        $logs = ShortUrlsLog::with('shorturls')->get();

        // Load the view
        return view('analytics', ['logs' => $logs]);
    }  

    public function details(string $hash) {
        $details = ShortUrls::where('hash', $hash)->with('logs')->first();

        if (!$details) {
            throw new \Exception('No matching short URL details found.');
        }

        // Load the view
        return view('analytics', ['details' => $details, 'logs' => $details->logs]);
    }      
}

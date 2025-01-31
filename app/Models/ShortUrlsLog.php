<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShortUrlsLog extends Model
{

    protected $table = 'short_urls_log';

    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ip',
        'browser',
        'platform',
        'referrer',
    ];

    public function shorturls(): BelongsTo {
        return $this->belongsTo('App\Models\ShortUrls', 'url_id');
    }    
}

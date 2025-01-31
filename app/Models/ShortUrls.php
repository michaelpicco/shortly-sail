<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShortUrls extends Model
{
    protected $table = 'short_urls';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'hash',
        'original',
    ];

    public function logs(): HasMany {
        return $this->hasMany('App\Models\ShortUrlsLog', 'url_id');
    }    

}

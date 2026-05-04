<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsView extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id',
        'ip_address',
        'user_agent',
        'viewed_at',
    ];

    protected $casts = [
        'viewed_at' => 'datetime'
    ];

    public $timestamps = false;

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;


class Post extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];

    #[SearchUsingFullText(['bio'])]
    public function toSearchableArray()
    {
        return [
            'title' => $this->email,
            'body' => $this->bio,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

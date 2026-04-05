<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_name',
        'type',        // 'lost' or 'found'
        'description',
        'location',
        'date_reported',
        'status',      // 'pending', 'claimed', 'resolved'
        'image',
    ];

    // Relationship: item belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

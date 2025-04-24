<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Displaesd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'home_type', 'address', 'family_book_image', 'family_members_count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

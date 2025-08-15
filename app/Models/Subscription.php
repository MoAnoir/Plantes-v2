<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['user_id', 'is_paid', 'expires_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

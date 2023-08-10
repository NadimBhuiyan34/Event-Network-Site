<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptInvite extends Model
{
    use HasFactory;

    protected $fillable=[

        'user_id','invite_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

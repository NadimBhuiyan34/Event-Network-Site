<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id','category_id','title','description','date','start-time','end_time','location','banner_image','other_image'
    ];

      public function user()
      {
        return $this->belongsTo(User::class);
      }
      public function category()
      {
        return $this->belongsTo(Category::class);
      }
      public function comments()
      {
        return $this->hasMany(Comment::class);
      }


}

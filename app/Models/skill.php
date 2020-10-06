<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
     protected $fillable =[
    	'name'
    ];

     public function videos()
    {
        return $this->belongsToMany(video::class,'skills_videos');
    }

}

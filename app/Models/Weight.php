<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    use HasFactory;

     protected $fillable = ['transport_mode_id','amount'];

     public function transport_mode(){
         return $this->belongsTo(TransportMode::class);
     }
}

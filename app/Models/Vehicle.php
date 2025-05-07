<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vehicles extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'year',
        'plate'
        
    ]; 

 
public function User ():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
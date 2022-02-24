<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    //KOlla om det är så denna ska vara. Ett field kan ju ha många crops...
    // public function crop()
    // {
    //    return $this->hasMany(Crop::class);
    // }
}

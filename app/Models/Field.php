<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    //KOlla om det är så denna ska vara. Ett field kan ju ha många crops...
    //Men själva tabellen har ju inga krops, de ligger i crops in field
    // public function crops()
    // {
    //     return $this->hasMany(Crop::class);
    // }
}

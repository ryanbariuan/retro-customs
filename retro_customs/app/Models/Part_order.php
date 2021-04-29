<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part_order extends Model
{
    use HasFactory;


    public function part()
    {
        return $this->belongsTo('\App\Models\Part');
    }

    public function build_order()
    {
        return $this->belongsTo('\App\Models\Build_order')->withTrashed();
    }
}

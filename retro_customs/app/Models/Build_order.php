<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Build_order extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function console()
    {
        return $this->belongsTo('\App\Models\Console')->withTrashed();
    }
}

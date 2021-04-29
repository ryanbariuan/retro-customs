<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Part extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function console()
    {
        return $this->belongsTo('\App\Models\Console')->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo('\App\Models\Category');
    }

    public function part_order()
    {
        return $this->hasMany('\App\Models\Part_order');
    }
}

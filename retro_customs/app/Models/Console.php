<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Console extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function part()
    {
        $this->hasMany('\App\Models\Part');
    }

    public function build_order()
    {
        $this->hasMany('\App\Models\Build_order');
    }
}

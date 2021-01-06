<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prisoner extends Model
{
    use HasFactory;
    public function case()
    {
      return $this->belongsTo(P_Case::class,'case_id','id');
    }

    public function cell()
    {
      return $this->belongsTo(Cell::class,'cell_id','id');
    }

    public function category()
    {
      return $this->belongsTo(Category::class,'category_id','id');
    }
}

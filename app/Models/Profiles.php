<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;

class Profiles extends Model
{
    use HasFactory;
    protected $fillable = ['students_id','image', 'father_name','mother_name'];

    public function students(){
        return $this->belongsTo(Students::class);
    }
}

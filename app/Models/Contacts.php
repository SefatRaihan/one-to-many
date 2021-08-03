<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;

class Contacts extends Model
{
    use HasFactory;
    protected $fillable = ['students_id','mobile','email'];
    public function students(){
        return $this->belongsTo(Students::class);
    }
}

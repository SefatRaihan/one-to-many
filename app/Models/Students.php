<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contacts;
use App\Models\Profiles;

class Students extends Model
{
    use HasFactory;
    protected $fillable = ['student_name', 'class'];

    public function profiles(){
        return $this->hasMany(Profiles::class, 'students_id');
    }
    public function contacts(){
        return $this->hasMany(Contacts::class, 'students_id');
    }
}

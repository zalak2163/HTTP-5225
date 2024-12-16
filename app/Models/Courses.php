<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    /** @use HasFactory<\Database\Factories\CoursesFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
       'Coursename',
        'Coursenumber',
        'Coursefeculty', 
    ];

    public function faculty(){
        return $this -> belongsTo(Faculty::class);
    }

    public function students(){
        return $this -> belongsToMany(Student::class);
    }
}

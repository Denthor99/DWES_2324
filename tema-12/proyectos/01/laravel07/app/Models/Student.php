<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Student extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','birthdate', 'phone','city','dni','email','course_id'];

    // Un alumno pertenece a un curso.
    // El nombre del método va en plurar y minúscula
    public function course():BelongsTo{
        return $this->belongsTo(Course::class);
    }
}

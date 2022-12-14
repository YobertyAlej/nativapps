<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Database\Factories\ClassroomFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'classrooms';

    protected $fillable = [
        'name',
        'schedule',
        'start_date',
        'end_date'
    ];

    protected $appends = [
        'students_count'
    ];

    public function getStudentsCountAttribute()
    {
        return $this->students->count();
    }

    /**
     * The roles that belong to the user.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ClassroomFactory::new();
    }
}

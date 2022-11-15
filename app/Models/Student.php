<?php

namespace App\Models;

use Database\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'birthdate',
    ];

    /**
     * The roles that belong to the user.
     */
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class)->withTimestamps();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return StudentFactory::new();
    }
}

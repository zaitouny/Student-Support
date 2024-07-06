<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function references()
    {
        return $this->hasMany(Reference::class,'subject_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class,'id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot('status');
    }

    // علاقة المتطلب السابق (الأب)
    public function prerequisites()
    {
        return $this->belongsToMany(Subject::class, 'subjects_prerequisites', 'subject_id', 'prerequisite_id')->withPivot('subject_id');
    }

    // المواد التي تعتمد على هذه المادة (الأبناء)
    public function dependents()
    {
        return $this->belongsToMany(Subject::class, 'subjects_prerequisites', 'prerequisite_id', 'subject_id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function homework()
    {
        return $this->hasMany(Homework::class);
    }

    
    protected $fillable = [
        'name',
        'year',
        'term',
        'kind',
        'hours',
    ];
    use HasFactory;
}

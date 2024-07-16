<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    protected $fillable=[
        'last_date',
        'status',
        'description',
        'subject_id',
        'supporting_link',
    ];
}

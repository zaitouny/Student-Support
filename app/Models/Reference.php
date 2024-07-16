<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable=[
        'status',
        'link',
        'kind',
        'subject_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}

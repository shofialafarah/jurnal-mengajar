<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'user_id', 'class_id', 'subject_id', 'day', 'jam_mulai', 'jam_selesai'
    ];

    // Relasi ke User
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
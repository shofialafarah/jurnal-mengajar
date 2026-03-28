<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'user_id', 'class_id', 'subject_id', 'tanggal',
        'pokok_bahasan', 'sub_pokok', 'metode',
        'jam_ke', 'sumber', 'keterangan'
    ];

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

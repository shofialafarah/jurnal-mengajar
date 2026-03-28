<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'user_id',
        'tanggal',
        'class_id',
        'subject_id',
        'materi',
        'sub_materi',
        'metode',
        'jam_ke',
        'sumber',
        'keterangan',
    ];

    public function kelas()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}

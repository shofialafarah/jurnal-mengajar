<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Journal;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::with(['mapel', 'classes'])
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('journals.index', compact('journals'));
    }

    public function create()
    {
        $classes = Classes::all();
        $subjects = Subject::all();
        return view('journals.create', compact('classes', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = \Carbon\Carbon::parse($request->start_date);
        $endDate = \Carbon\Carbon::parse($request->end_date);
        $userId = Auth::id();

        // Ambil jadwal mingguan si guru
        $masterSchedules = \App\Models\Schedule::where('user_id', $userId)->get();

        $count = 0;

        // Looping setiap hari dalam rentang yang dipilih (misal 6 bulan)
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {

            if ($date->isSunday()) continue; // Skip hari minggu

            // Ubah nama hari Carbon ke Bahasa Indonesia sesuai Enum di migrasi kamu
            $dayName = $this->getIndonesianDay($date->format('l'));

            // Cari jadwal yang cocok dengan hari tersebut
            $schedulesToday = $masterSchedules->where('hari', $dayName);

            foreach ($schedulesToday as $sch) {
                // Cek biar gak double kalau diklik generate berkali-kali
                \App\Models\Journal::firstOrCreate([
                    'user_id' => $userId,
                    'tanggal' => $date->format('Y-m-d'),
                    'class_id' => $sch->class_id,
                    'subject_id' => $sch->subject_id,
                    'jam_ke' => $sch->jam_ke, // Sesuai kolom jam_ke di migrasi journals kamu
                ], [
                    'keterangan' => 'Tuntas',
                    // Materi, sub_materi, dll dibiarkan null dulu biar nanti di-edit manual
                ]);
                $count++;
            }
        }

        return redirect()->route('journals.index')->with('success', "$count baris jurnal berhasil di-generate otomatis!");
    }

    // Helper untuk translate hari
    private function getIndonesianDay($day)
    {
        $map = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        return $map[$day];
    }
}

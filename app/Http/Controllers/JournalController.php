<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Schedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    // 1. Tampilkan Semua Jurnal
    public function index()
    {
        $journals = Journal::where('user_id', Auth::id())
            ->with(['classroom', 'subject'])
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('journals.index', compact('journals'));
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

    // Ambil semua jadwal tetap user
    $schedules = \App\Models\Schedule::where('user_id', $userId)->get();

    $count = 0;
    // Looping setiap hari dalam rentang tanggal
    for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
        // Ambil nama hari dalam Bahasa Inggris (Monday, Tuesday, dst) untuk dicocokkan ke DB
        $dayName = $date->format('l');

        // Cari apakah ada jadwal di hari tersebut
        $todaySchedules = $schedules->where('day', $dayName);

        foreach ($todaySchedules as $sch) {
            // Cek apakah jurnal untuk jadwal & tanggal ini sudah ada (biar tidak duplikat)
            $exists = \App\Models\Journal::where('user_id', $userId)
                        ->where('tanggal', $date->format('Y-m-d'))
                        ->where('subject_id', $sch->subject_id)
                        ->where('class_id', $sch->class_id)
                        ->exists();

            if (!$exists) {
                \App\Models\Journal::create([
                    'user_id' => $userId,
                    'class_id' => $sch->class_id,
                    'subject_id' => $sch->subject_id,
                    'tanggal' => $date->format('Y-m-d'),
                    'jam_ke' => $sch->jam_ke, // Otomatis terisi dari jadwal
                    'metode' => 'Ceramah & Diskusi', // Default awal
                    'keterangan' => 'Tidak Tuntas',
                ]);
                $count++;
            }
        }
    }

    return redirect()->route('journals.index')->with('success', "$count baris jurnal otomatis berhasil dibuat!");
}

    // 2. Tampilkan Halaman Form Generate
    public function create()
    {
        $schedules = Schedule::where('user_id', Auth::id())
            ->with(['classroom', 'subject'])
            ->get();

        return view('journals.create', compact('schedules'));
    }

    // 3. Logika Generate Otomatis
    public function generate(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $schedule = Schedule::findOrFail($request->schedule_id);
        
        // Mapping Hari Bahasa Indonesia ke Carbon
        $days = [
            'Minggu' => 0, 'Senin' => 1, 'Selasa' => 2, 
            'Rabu' => 3, 'Kamis' => 4, 'Jumat' => 5, 'Sabtu' => 6
        ];

        $targetDay = $days[$schedule->day];
        $period = CarbonPeriod::create($request->start_date, $request->end_date);

        foreach ($period as $date) {
            if ($date->dayOfWeek === $targetDay) {
                // Buat baris jurnal kosong
                Journal::firstOrCreate([
                    'user_id' => Auth::id(),
                    'class_id' => $schedule->class_id,
                    'subject_id' => $schedule->subject_id,
                    'tanggal' => $date->format('Y-m-d'),
                ], [
                    'keterangan' => 'Tidak Tuntas'
                ]);
            }
        }

        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil digenerate!');
    }

    // 4. Form Edit Jurnal (Untuk mengisi pokok bahasan dll)
    public function edit(Journal $journal)
    {
        // Pastikan guru hanya bisa edit jurnal miliknya sendiri
        if ($journal->user_id !== Auth::id()) { abort(403); }
        
        return view('journals.edit', compact('journal'));
    }

    // 5. Update Jurnal
    public function update(Request $request, Journal $journal)
    {
        $data = $request->validate([
            'pokok_bahasan' => 'required|string',
            'sub_pokok' => 'required|string',
            'metode' => 'nullable|string',
            'jam_ke' => 'nullable|string',
            'sumber' => 'nullable|string',
            'keterangan' => 'required|in:Tuntas,Tidak Tuntas',
        ]);

        $journal->update($data);

        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil diperbarui!');
    }
}
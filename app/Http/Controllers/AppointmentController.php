<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\Barber;
use App\Models\Service;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $appointments = Appointment::with(['customer', 'barber', 'service'])->latest()->paginate(10);

    return view('appointments.index', compact('appointments'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $barbers = Barber::where('aktif', true)->get();
    $services = Service::where('aktif', true)->get();

    return view('appointments.create', compact('barbers', 'services'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
{
    $validated = $request->validated();

    $service = Service::findOrFail($validated['service_id']);
    $tanggalMulai = \Illuminate\Support\Carbon::parse($validated['tanggal_mulai']);
    $tanggalSelesai = $tanggalMulai->copy()->addMinutes($service->durasi_menit);

    $bentrok = Appointment::where('barber_id', $validated['barber_id'])
        ->where('status', '!=', 'cancelled')
        ->where(function ($query) use ($tanggalMulai, $tanggalSelesai) {
            $query->where('tanggal_mulai', '<', $tanggalSelesai)
                ->where('tanggal_selesai', '>', $tanggalMulai);
        })
        ->exists();

    if ($bentrok) {
        return back()
            ->withInput()
            ->withErrors([
                'tanggal_mulai' => 'Barber sudah memiliki reservasi pada waktu tersebut.',
            ]);
    }

    Appointment::create([
        'customer_id' => auth()->id(),
        'barber_id' => $validated['barber_id'],
        'service_id' => $validated['service_id'],
        'tanggal_mulai' => $tanggalMulai,
        'tanggal_selesai' => $tanggalSelesai,
        'status' => 'pending',
        'catatan' => $validated['catatan'] ?? null,
    ]);

    return redirect()
        ->route('appointments.index')
        ->with('success', 'Reservasi berhasil dibuat.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

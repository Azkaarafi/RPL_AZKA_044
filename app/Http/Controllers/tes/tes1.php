<?php

namespace App\Http\Controllers\tes;

use App\Http\Controllers\Controller;
use App\Models\boy;
use Illuminate\Http\Request;
use App\Models\rekam_medis; 
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use App\Models\Perawat;
use Illuminate\Support\Facades\Hash;


class tes1 extends Controller
{
    public function login()
    {
        return view("tiptoe.LOGIN");
    }

    public function index()
    {
        return view("tiptoe.index");
    }


    public function dokter()
    {
        return view("tiptoe.dokter");
    }
    public function halhapus()
    {
        return view("tiptoe.hapus");
    }
    public function halupdate()
    {
        return view("tiptoe.update");
    }



    public function Perawat()
    {
        $stats = rekam_medis::select(
            'nama_pasien',
            DB::raw('SUM(Usia) as total_Usia'),
            DB::raw('SUM(Biaya_Pengobatan) as total_Biaya_Pengobatan'),
            DB::raw('MAX(image) as image'),
            DB::raw('DATE(tanggal_periksa) as tanggal'),
            DB::raw('MAX(catatan) as catatan')
        )
        ->groupBy('nama_pasien', 'tanggal')
        ->orderBy('tanggal', 'desc')
        ->limit(7)
        ->get();
    
        $announcements = rekam_medis::select(
            'catatan',
            DB::raw('DATE(tanggal_periksa) as tanggal')
        )->distinct()->get();
    
        return view('tiptoe.Perawat', compact('stats', 'announcements'));
    }

    public function store(Request $request)
    {
        if ($request->has('register')) {
            $request->validate([
                'username' => 'required|min:3',
                'password' => 'required|min:2',
                'role' => 'required|in:dokter,Perawat',
            ]);

            $user = boy::create([
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')), 
                'role' => $request->input('role'),
            ]);
            
            if ($user->role == 'dokter') {
                DB::table('dokter')->insert(['regis_id' => $user->id,'nama_dokter' => $user->username, 'specialization' => null,'created_at' => now(),
        'updated_at' => now()]);
            } else {
                DB::table('perawat')->insert(['regis_id' => $user->id,'nama_perawat' => $user->username, 'department' => null,'created_at' => now(),
                'updated_at' => now()]);
            }
            
            return redirect('/tiptoe/login')->with('success', 'Berhasil mendaftar. Silakan login!');
        }

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|in:dokter,Perawat',
        ]);
        
        $username = $request->input('username');
        $password = $request->input('password');
        $role = $request->input('role');
        
        $user = boy::where('username', $username)
                    ->where('role', $role)
                    ->first(); 
        
        if ($user && Hash::check($password, $user->password)) { 
            if ($role === 'dokter') {
                return redirect('/tiptoe/dokter');
            } else if ($role === 'Perawat') { 
                return redirect('/tiptoe/Perawat');
            }
        }
        
        return redirect('/tiptoe/login')->with('error', 'Username atau password salah');
    }

    public function rekam_medis(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string',
            'Usia' => 'required|numeric|min:0.1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_periksa' => 'required|date',
            'catatan' => 'nullable|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');

        $totalBiaya_Pengobatan = $request->Biaya_Pengobatan;

        rekam_medis::create([
            'nama_pasien' => $request->nama_pasien,
            'Usia' => $request->Usia,
            'Biaya_Pengobatan' => $totalBiaya_Pengobatan,
            'image' => $imagePath,
            'tanggal_periksa' => $request->tanggal_periksa,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Data rekam_medis berhasil disimpan.');
    }
    ///////////////////////////////////////new
    public function hapus(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string',
            'tanggal_periksa' => 'required|date',
        ]);
     
        rekam_medis::where('nama_pasien', $request->nama_pasien)
              ->whereDate('tanggal_periksa', $request->tanggal_periksa)
              ->delete();
    
        
        return redirect()->back()->with('success', 'Data rekam_medis berhasil dihapus.');
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string',
            'tanggal_periksa' => 'required|date',
            'Usia' => 'required|numeric|min:0.1',
            'Biaya_Pengobatan' => 'required|numeric|min:0',
            'catatan' => 'nullable|string|max:255',
        ]);
    
        $rekam_medis = rekam_medis::where('nama_pasien', $request->nama_pasien)
                        ->whereDate('tanggal_periksa', $request->tanggal_periksa)
                        ->first();
    
        if ($rekam_medis) {
            $totalBiaya_Pengobatan = $request->Biaya_Pengobatan;

            $rekam_medis->update([
                'Usia' => $request->Usia,
                'Biaya_Pengobatan' => $totalBiaya_Pengobatan,
                'catatan' => $request->catatan,
            ]);
    
            return redirect()->back()->with('success', 'Data rekam_medis berhasil diupdate.');
        }
    
        return redirect()->back()->with('error', 'Data rekam_medis tidak ditemukan.');
    }
    

    

}

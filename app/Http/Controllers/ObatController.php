<?php

namespace App\Http\Controllers;

use App\Obat;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $obats = Obat::latest()->get();
        return view('admin.obat.index', compact('obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|unique:obats,nama_obat',
            'stok' => 'required|unique:obats,stok'
        ]);

        Obat::insert([
            'nama_obat' => $request->nama_obat,
            'stok' => $request->stok,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Obat added');
    }

    public function Inactive($obat_id)
    {
        Obat::find($obat_id)->update(['status' => 0]);
        return redirect()->back()->with('Catupdated', 'Obat Inactive');
    }

    public function Active($obat_id)
    {
        Obat::find($obat_id)->update(['status' => 1]);
        return redirect()->back()->with('Catupdated', 'Obat Active');
    }

    public function Edit($obat_id)
    {
        $obat = Obat::find($obat_id);
        return view('admin.obat.edit', compact('obat'));
    }

    public function UpdateObat(Request $request)
    {
        $obat_id = $request->id;

        Obat::find($obat_id)->update([
            'nama_obat' => $request->nama_obat,
            'stok' => $request->stok,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('admin.obat')->with('Catupdated', 'obat updated');
    }

    public function Delete($obat_id)
    {
        Obat::find($obat_id)->delete();
        return redirect()->back()->with('delete', 'Obat deleted');
    }
}
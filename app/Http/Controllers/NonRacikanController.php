<?php

namespace App\Http\Controllers;

use App\Nonracikan;
use App\Obat;
use App\Signa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NonRacikanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $obats = Obat::latest()->get();
        $signas = Signa::latest()->get();
        $nonracikans = Nonracikan::latest()->get();

        return view('frontend.nonracikan.index', compact('obats', 'signas', 'nonracikans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'signa' => 'required',
            'qty' => 'required'
        ]);

        Nonracikan::insert([
            'nama_obat' => $request->nama_obat,
            'signa' => $request->signa,
            'qty' => $request->qty,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Nonracikan added');
    }

    public function Edit($nonracikan_id)
    {
        $nonracikan = Nonracikan::find($nonracikan_id);
        $obats = Obat::latest()->get();
        $signas = Signa::latest()->get();
        return view('frontend.nonracikan.edit', compact('nonracikan', 'obats', 'signas'));
    }

    public function UpdateNonRacikan(Request $request)
    {
        $nonracikan_id = $request->id;

        Nonracikan::find($nonracikan_id)->update([
            'nama_obat' => $request->nama_obat,
            'signa' => $request->signa,
            'qty' => $request->qty,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('nonracikan')->with('Catupdated', 'Nonracikan updated');
    }

    public function Delete($nonracikan_id)
    {
        Nonracikan::find($nonracikan_id)->delete();
        return redirect()->back()->with('delete', 'Nonracikan deleted');
    }
}
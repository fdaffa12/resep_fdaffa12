<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Signa;
use App\Obat;
use Illuminate\Support\Carbon;

class SignaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $signas = Signa::latest()->get();
        $obats = Obat::latest()->get();

        return view('admin.signa.index', compact('signas', 'obats'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'signa' => 'required',
        ]);

        $data = new Signa;
        $data['signa'] = $request->signa;
        $data->contoh = implode(',', $request->contoh);
        $data->save();

        return redirect()->back()->with('success', 'Signa added');
    }

    public function Edit($signa_id)
    {
        $signa = Signa::find($signa_id);
        return view('admin.signa.edit', compact('signa'));
    }

    public function UpdateSigna(Request $request)
    {
        $signa_id = $request->id;

        Signa::find($signa_id)->update([
            'signa' => $request->signa,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('admin.signa')->with('Catupdated', 'Signa updated');
    }

    public function Delete($signa_id)
    {
        Signa::find($signa_id)->delete();
        return redirect()->back()->with('delete', 'Signa deleted');
    }
}
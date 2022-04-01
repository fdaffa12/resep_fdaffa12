<?php

namespace App\Http\Controllers;

use App\Obat;
use App\Signa;
use App\Racikan;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class RacikanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $obats = Obat::latest()->get();
        $signas = Signa::latest()->get();
        $racikans = Racikan::latest()->get();

        return view('frontend.racikan.index', compact('obats', 'signas', 'racikans'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_racikan' => 'required',
            'signa' => 'required',
            'qty' => 'required',
        ]);

        $data = new Racikan();
        $data['nama_racikan'] = $request->nama_racikan;
        $data['signa'] = $request->signa;
        $data['qty'] = $request->qty;
        $data->obat_id = implode(',', $request->obat_id);
        $data->save();

        return redirect()->back()->with('success', 'Racikan added');
    }

    public function Edit($racikan_id)
    {
        $racikan = Racikan::find($racikan_id);
        $obats = Obat::latest()->get();
        $signas = Signa::latest()->get();
        return view('frontend.racikan.edit', compact('racikan', 'obats', 'signas'));
    }

    public function Updateracikan(Request $request)
    {

        $racikan_id = $request->id;

        Racikan::find($racikan_id)->update([
            'nama_racikan' => $request->nama_racikan,
            'signa' => $request->signa,
            'qty' => $request->qty,
            'obat_id' => implode(',', $request->obat_id),
            'created_at' => Carbon::now()
        ]);

        $this->validate($request, [
            'nama_racikan' => 'required',
            'signa' => 'required',
            'qty' => 'required',
        ]);

        return redirect()->route('racikan')->with('Catupdated', 'Racikan updated');
    }

    public function Delete($racikan_id)
    {
        Racikan::find($racikan_id)->delete();
        return redirect()->back()->with('delete', 'Racikan deleted');
    }
}
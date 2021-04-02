<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faktura;
use Auth;
use PDF;
use KwotaSlownie\KwotaSlownie;

class FakturaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index() {
        $faktura = Faktura::get();
        return view('faktura.index', [
            'faktura' => $faktura
        ]);
    }

    public function show($id)
    {
        # code...
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            "faktura.dane.numer_faktury" => "required",
            "faktura.dane.miejsce_wystawienia" => "required",
            "faktura.sprzedawca.nazwa" => "required",
            "faktura.nabywca.nazwa" => "required",
            "faktura.pozycje" => "required",
        ]);

        $request['faktura'] += [
            'user_id' => Auth::user()->id
        ];
        Faktura::create($request["faktura"]);
        toastr()->success("Faktura została dodana.");
        return back();
    }

    public function create()
    {
        return view('faktura.create');
    }

    public function update($id, Request $request)
    {
        Faktura::where('user_id', '=', Auth::user()->id)->find($id)->update($request["faktura"]);
        toastr()->success("Zmiany zostały zapisane poprawnie");
        return back();
    }

    public function destroy($id)
    {
        $msg = "";
        $status = 0;

        $faktura = Faktura::where('user_id', '=', Auth::user()->id)->find($id);

        if ($faktura) {
           $faktura->delete();
           $msg = "Faktura został usunięty.";
           $status = 1;
        } else {
            $msg = "Error.";
        }
        return response()->json(['status' => $status, 'msg'=> $msg], 200);
    }

    public function edit($id)
    {
        $faktura = Faktura::where('user_id', '=', Auth::user()->id)->findOrFail($id);
        // $faktura = json_decode($faktura);
     
        return view('faktura.edit', [
            'faktura' => $faktura,
            'dane' => $faktura['dane'],
            'sprzedawca' => $faktura['sprzedawca'],
            'nabywca' => $faktura['nabywca'],
            'pozycje' => $faktura['pozycje']
        ]);
    }

    public function createPDF($id) {

        $data = Faktura::where('user_id', '=', Auth::user()->id)->findOrFail($id);
        
        $pdf = PDF::loadView('pdf_view', [
            'faktura' => $data,
            'dane' => $data['dane'],
            'sprzedawca' => $data['sprzedawca'],
            'nabywca' => $data['nabywca'],
            'pozycje' => $data['pozycje']
        ]);

        // $pdf->setOptions(['arialuni' => true]);
        return $pdf->stream('pdf_file.pdf');
    }
}

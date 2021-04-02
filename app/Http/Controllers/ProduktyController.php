<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;
use App\Models\Waluta;
use Auth;

class ProduktyController extends Controller
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

    public function index()
    {
        $produkty = Produkt::where("user_id", "=", Auth::user()->id)->paginate(15);
        return view("produkty.index", [
            "produkty" => $produkty
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "form.nazwa" => "required",
            "form.netto" => "required|numeric|between:0,9999999.99",
            "form.brutto" => "required|numeric|between:0,9999999.99"
        ]);
        
        $request['form'] += [
            'user_id' => Auth::user()->id
        ];

        Produkt::create($request["form"]);
        toastr()->success("Produkt ".$request["form"]["nazwa"]." został dodany.");
        return back();
    }

    public function create()
    {
        $waluta = Waluta::get();
        return view("produkty.create", [
            "waluta" => $waluta
        ]);
    }

    public function show()
    {
        # code...
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            "form.nazwa" => "required",
            "form.netto" => "required|numeric|between:0,9999999.99",
            "form.brutto" => "required|numeric|between:0,9999999.99"
        ]);

        Produkt::find($id)->update($request["form"]);
        toastr()->success("Zmiany zostały zapisane poprawnie");
        return back();
    }

    public function destroy($id)
    {
        $msg = "";
        $status = 0;

        $produkt = Produkt::where('user_id', '=', Auth::user()->id)->find($id);

        if ($produkt) {
           $produkt->delete();
           $msg = "Produkt został usunięty.";
           $status = 1;
        } else {
            $msg = "Error.";
        }
        return response()->json(['status' => $status, 'msg'=> $msg], 200);
    }

    public function edit($id)
    {
        $waluta = Waluta::get();
        $produkt = Produkt::findOrFail($id);
        return view("produkty.edit", [
            'produkt' => $produkt,
            'waluta' => $waluta
        ]);
    }


}

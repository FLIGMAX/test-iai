@extends('layouts.app')
@section('title', 'Edytowanie produktu')

@section('css')
<style>
   label span {
   color: #ff0000;
   }
</style>
@endsection

@section('content')

<div class="container">
   <form action="{{ route('produkty.update', ['produkty' => $produkt->id]) }}" method="POST">
      @csrf
      @method("PUT")

      <input type="hidden" name="form[user_id]" value="{{ Auth::user()->id }}">
      <div class="row mb-3">
         <div class="col-md-6 text-left">
            <a class="btn btn-secondary rounded-0" href="{{ route('produkty.index') }}" role="button"><i class="fas fa-long-arrow-alt-left"></i> Produkty</a>
         </div>
         <div class="col-md-6 text-right">
            <button class="btn btn-success rounded-0" type="submit" role="button"><i class="fas fa-save"></i> Zapisz</button>
         </div>
         <div class="col-md-12 mt-3 mb-3">
            <div class="card">
               <div class="card-header"><span>Edytowanie produktu "<b>{{ $produkt->nazwa }}</b>"</span></div>
               <div class="card-body">
                  <div class="form-group">
                     <label for="nazwa">Nazwa: <span>*</span></label>
                     <textarea autocomplete="off" type="text" name="form[nazwa]" class="form-control textarea_class" id="nazwa" style="resize: none; overflow: hidden; overflow-wrap: break-word; height: 34px;" rows="1">{{ $produkt->nazwa }}</textarea>
                  </div>
                  <div class="row">
                     <div class="form-group col-xs-8 col-sm-4 prawa-xs">
                        <label for="cnetto">Cena netto: <span>*</span></label>
                        <input autocomplete="off" type="text" name="form[netto]" value="{{ $produkt->netto }}" placeholder="0.00" class="form-control netto" rel="" id="netto">
                     </div>
                     <div class="form-group col-xs-4 col-sm-2 lewa-xs prawa-sm">
                        <label for="vat">VAT: <span>*</span></label>
                        <input type="text" name="form[vat]" class="form-control" value="{{ $produkt->vat }}" id="vat"/>
                     </div>
                     <div class="form-group col-xs-8 col-sm-4 prawa-xs lewa-sm">
                        <label for="cbrutto">Cena brutto: <span>*</span></label>
                        <input autocomplete="off" type="text" name="form[brutto]" value="{{ $produkt->brutto }}" placeholder="0.00" class="form-control brutto" rel="" id="brutto">
                     </div>
                     <div class="form-group col-xs-4 col-sm-2 lewa-xs">
                        <label for="waluta">Waluta:</label>
                        <select name="form[waluta_id]" class="form-control select2-hidden-accessible" id="waluta">
                           @foreach($waluta as $key => $value)

                            @if($produkt->waluta_id == $value->id)
                                <option value="{{ $value->id }}" selected="">{{ $value->symbol }}</option>
                            @else 
                                <option value="{{ $value->id }}">{{ $value->symbol }}</option>
                            @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-xs-12 col-sm-4 prawa-sm">
                        <label for="pkwiu">Kod PKWiU:</label>
                        <input type="text" name="form[pkwiu]" value="{{ $produkt->pkwiu }}" class="form-control" id="pkwiu">
                     </div>
                     <div class="form-group col-xs-8 col-sm-4 prawa-xs lewa-sm">
                        <label for="ilosc">Domyślna ilość: <span>*</span> <span class="badge bg-secondary text-white" data-toggle="popover" title="Pomoc" data-content="Jeśli produkt najczęściej sprzedajesz w określonej ilości np. 5szt, wpisz to w tym polu. Dodając ten produkt na fakturze będzie on domyślnie w takiej ilości.">?</span></label>
                        <input type="text" name="form[ilosc_domyslna]" value="{{ $produkt->ilosc_domyslna }}" class="form-control" id="ilosc_domyslna">
                     </div>
                     <div class="form-group col-xs-4 col-sm-4 lewa-xs">
                        <label for="jednostka">Jednostka:</label>
                        <input type="text" name="form[jm]" class="form-control" id="jm" value="{{ $produkt->jm }}"/>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="jednostka">Rodzaj:</label>
                     <select name="form[rodzaj]" class="form-control" id="rodzaj">
                        <option value="0" @if($produkt->rodzaj == 0) selected="" @endif>Sprzedawane i kupowane</option>
                        <option value="1" @if($produkt->rodzaj == 1) selected="" @endif>Sprzedawane</option>
                        <option value="2" @if($produkt->rodzaj == 2) selected="" @endif>Kupowane</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="usluga">Usługa/Towar:</label>
                     <select name="form[usluga]" class="form-control" id="usluga">
                        <option value="0" @if($produkt->usluga == 0) selected="" @endif>Towar</option>
                        <option value="1" @if($produkt->usluga == 1) selected="" @endif>Usługa</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="towar">Rodzaj kosztu w KPiR:</label>
                     <select name="form[towar_usluga]" class="form-control" id="towar_usluga">
                        <option value="0" @if($produkt->towar_usluga == 0) selected="" @endif>Towary handlowe</option>
                        <option value="1" @if($produkt->towar_usluga == 1) selected="" @endif>Pozostałe wydatki</option>
                        <option value="2" @if($produkt->towar_usluga == 2) selected="" @endif>Koszty uboczne zakupu</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="symbol">Symbol GTU: <span class="badge bg-secondary text-white" data-toggle="popover" title="Pomoc" data-content="Symbole GTU służą do oznaczania towarów na poczet pliku JPK-V7M i JPK-V7K. Aby zakwalifikować fakturę sprzedaży do danego kodu należy wybrać odpowiedni symbol od GTU_01 do GTU_13. Jeśli towar nie należy do żadnej z kategorii należy pozostawić ''nie dotyczy''">?</span></label>
                     <select name="form[symbol_gtu]" class="form-control" id="symbol_gtu">
                        <option value="0" @if($produkt->symbol_gtu == 0) selected="" @endif>nie dotyczy</option>
                        <option value="1" @if($produkt->symbol_gtu == 1) selected="" @endif>GTU 01 – sprzedaż alkoholu</option>
                        <option value="2" @if($produkt->symbol_gtu == 2) selected="" @endif>GTU 02 – handel paliwami</option>
                        <option value="3" @if($produkt->symbol_gtu == 3) selected="" @endif>GTU 03 – sprzedaż oleju opałowego i olejów smarowych</option>
                        <option value="4" @if($produkt->symbol_gtu == 4) selected="" @endif>GTU 04 – papierosy i wyroby tytoniowe</option>
                        <option value="5" @if($produkt->symbol_gtu == 5) selected="" @endif>GTU 05 – handel odpadami i surowcami wtórnymi</option>
                        <option value="6" @if($produkt->symbol_gtu == 6) selected="" @endif>GTU 06 – urządzenia elektroniczne i części do nich</option>
                        <option value="7" @if($produkt->symbol_gtu == 7) selected="" @endif>GTU 07 – sprzedaż pojazdów i części samochodowych</option>
                        <option value="8" @if($produkt->symbol_gtu == 8) selected="" @endif>GTU 08 – wyroby z metali szlachetnych i nieszlachetnych</option>
                        <option value="9" @if($produkt->symbol_gtu == 9) selected="" @endif>GTU 09 – sprzedaż leków i wyrobów medycznych</option>
                        <option value="10" @if($produkt->symbol_gtu == 10) selected="" @endif>GTU 10 – sprzedaż budynków i gruntów</option>
                        <option value="11" @if($produkt->symbol_gtu == 11) selected="" @endif>GTU 11 – usługi przenoszenia uprawnień do emisji gazów cieplarnianych</option>
                        <option value="12" @if($produkt->symbol_gtu == 12) selected="" @endif>GTU 12 – usługi niematerialne: badania rynku i naukowe, doradcze, firm centralnych, księgowe, marketingowe, reklamowe, prawne, zarządcze</option>
                        <option value="13" @if($produkt->symbol_gtu == 13) selected="" @endif>GTU 13 – usługi transportowe i magazynowe</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="nazwa">Kod produktu: </label>
                     <input autocomplete="off" type="text" name="form[kod_produktu]" value="{{ $produkt->kod_produktu }}" class="form-control" id="kod_produktu">
                  </div>
                  <div class="form-group">
                     <label for="nazwa">Kod kreskowy: </label>
                     <input autocomplete="off" type="text" name="form[kod_kreskowy]" value="{{ $produkt->kod_kreskowy }}" class="form-control" id="kod_kreskowy">
                  </div>
                  <div class="form-group">
                     <label for="opis">Opis: <span class="badge bg-secondary text-white" data-toggle="popover" title="Pomoc" data-content="Opis produktu jest polem widocznym tylko dla użytkownika programu, nie pojawia się na wydrukach.">?</span></label>
                     <textarea name="form[opis]" id="opis" class="form-control textarea_class" rows="5">{{ $produkt->opis }}</textarea>
                  </div>
               </div>
            </div>
            
         </div>


         <div class="col-md-6 text-left">
            <a class="btn btn-secondary rounded-0" href="{{ route('produkty.index') }}" role="button"><i class="fas fa-long-arrow-alt-left"></i> Produkty</a>
         </div>
         <div class="col-md-6 text-right">
            <button class="btn btn-success rounded-0" type="submit" role="button"><i class="fas fa-save"></i> Zapisz</button>
         </div>
      </div>
   </form>
</div>
@endsection


@section('js')


<script>

$("#netto").on("change", function () {
   const netto = parseFloat($("#netto").val());
   let vat = parseFloat($("#vat").val());
   let result = (netto / 100 * vat) + netto;

   $("#netto").val(netto.toFixed(2))
   $("#brutto").val(result.toFixed(2))
});

$("#vat").on("change", function () {
   const netto = parseFloat($("#netto").val());
   let vat = parseFloat($("#vat").val());
   let result = (netto / 100 * vat) + netto;

   $("#netto").val(netto.toFixed(2))
   $("#brutto").val(result.toFixed(2))
});
</script>

@endsection
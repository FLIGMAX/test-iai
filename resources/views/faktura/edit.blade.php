@extends('layouts.app')

@section('title', 'Faktury edycja')

@section('css')


@endsection

@section('content')

<form  action="{{ route('faktura.update', ['faktura' => $faktura['id']]) }}" method="POST">
@method('PUT')
@csrf
<!-- 1 -->
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6 text-left mb-3">
            <a class="btn btn-secondary rounded-0" href="{{ route('faktura.index') }}" role="button"><i class="fas fa-long-arrow-alt-left"></i> Produkty</a>
         </div>
         <div class="col-md-6 text-right mb-3">
            <button class="btn btn-success rounded-0" type="submit" role="button"><i class="fas fa-save"></i> Zapisz</button>
         </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group mb-3">
                                    <label for="typ"><b>Typ:</b></label>
                                    <select name="faktura[dane][typ_faktury]" class="form-control rounded-0" id="zmiana_faktury" data-ays-ignore="true">
                                        <option value="0" selected="" rel="faktura_vat">Faktura VAT</option>
                                    </select>
                            </div>
                        </div>
                            
                        <div class="col-md">
                            <div class="form-group mb-3">
                                <label for="numer"><b>Numer:</b></label>
                                <input name="faktura[dane][numer_faktury]" value="{{ $dane['numer_faktury'] }}" class="form-control rounded-0" id="numer_faktury">
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group mb-3">
                                <label for="numer"><b>Data wystawienia:</b></label>
                                <div class="input-group date" id="datawystawienia">
                                    <input type="text" class="form-control datepicker rounded-0" name="faktura[dane][data_wystawienia]" value="{{ $dane['data_wystawienia'] }}" id="data_wystawienia">
                                    <div class="input-group-append" style="">
                                        <span class="input-group-text" id="basic-addon3"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group mb-3">
                                <label for="numer"><b>Miejsce wystawienia:</b></label>
                                <input name="faktura[dane][miejsce_wystawienia]"  value="{{ $dane['miejsce_wystawienia'] }}" class="form-control rounded-0" id="miejsce">
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="input-group mb-3">
                                <label for="numer"><b>Data sprzedaży:</b></label>
                                <div class="input-group date" id="datasprzedzy">
                                    <input type="text" class="form-control datepicker rounded-0" name="faktura[dane][data_sprzedazy]" value="{{ $dane['data_sprzedazy'] }}" id="data_sprzedazy">
                                    <div class="input-group-append" style="">
                                        <span class="input-group-text" id="basic-addon3"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2 -->
    <div class="row">
        <div class="col-md-6">
           
                <div class="card">
                    <div class="card-header"><span>Sprzedawca</span> </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <textarea autocomplete="off" type="text" name="faktura[sprzedawca][nazwa]" style="overflow: hidden; overflow-wrap: break-word; height: 34px;" class="form-control rounded-0 textarea_class dropdown-toggle" id="sprzedawca_nazwa" rows="1" placeholder="Podaj pełną nazwę firmy">{{ $sprzedawca['nazwa'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP:</label>
                                    <input type="text" name="faktura[sprzedawca][nip]" value="{{ $sprzedawca['nip'] }}" class="form-control rounded-0" id="nip">
                                </div>
                                <div class="form-group">
                                    <label for="ulica">Ulica i nr:</label>
                                    <textarea name="faktura[sprzedawca][ulica_i_numer]" id="ulica" class="form-control klient rounded-0 textarea_class" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 32.9886px;">{{ $sprzedawca['ulica_i_numer'] }}</textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4 float-left">
                                        <label for="kod">Kod pocztowy:</label>
                                        <input type="text" name="faktura[sprzedawca][kod_pocztowy]" value="{{ $sprzedawca['kod_pocztowy'] }}" class="form-control rounded-0" id="kod">
                                    </div>

                                    <div class="form-group col-md-8 float-right">
                                        <label for="miejscowosc">Miejscowość:</label>
                                        <input type="text" name="faktura[sprzedawca][miejscowosc]" value="{{ $sprzedawca['miejscowosc'] }}" class="form-control rounded-0" id="miejscowosc">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="numer">Podpis:</label>
                                    <input name="faktura[sprzedawca][podpis]" class="form-control rounded-0" id="podpis_sprzedawca" value="{{ $sprzedawca['podpis'] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><span>Nabywca</span> </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <textarea autocomplete="off" type="text" name="faktura[nabywca][nazwa]" class="form-control rounded-0 textarea_class dropdown-toggle" id="nazwa_n__" rows="1" placeholder="Podaj pełną nazwę firmy">{{ $nabywca['nazwa'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP:</label>
                                    <input type="text" name="faktura[nabywca][nip]" value="{{ $nabywca['nip'] }}" class="form-control rounded-0" id="nip_n">
                                </div>
                                <div class="form-group">
                                    <label for="ulica">Ulica i nr:</label>
                                    <textarea name="faktura[nabywca][ulica_i_numer]" id="ulica_i_numer_n" class="form-control klient rounded-0 textarea_class" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 32.9886px;">{{ $nabywca['ulica_i_numer'] }}</textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4 float-left">
                                        <label for="kod">Kod pocztowy:</label>
                                            <input type="text" name="faktura[nabywca][kod_pocztowy]" value="{{ $nabywca['kod_pocztowy'] }}" class="form-control rounded-0" id="kod_pocztowy_n">
                                    </div>

                                    <div class="form-group col-md-8 float-right">
                                        <label for="miejscowosc">Miejscowość:</label>
                                        <input type="text" name="faktura[nabywca][miejscowosc]" value="{{ $nabywca['miejscowosc'] }}" class="form-control rounded-0" id="miejscowosc_n">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="numer">Podpis:</label>
                                    <input name="faktura[nabywca][podpis]" class="form-control rounded-0" id="nabywca_podpis" value="{{ $nabywca['podpis'] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- 3 -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><span>Pozycje na fakturze</span></div>

                <div class="card-body pt-0 pl-0 pr-0">
                    <table class="table sortable-table text-center">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nazwa</th>
                                <th class="pkwiu" style="display:none;">PKWiU</th>
                                <th>Ilość</th>
                                <th>Jednostka</th>
                                <th class="rabat" style="display:none;">Rabat %</th>
                                <th>Cena netto</th>
                                <th>VAT %</th>
                                <th>Wartość netto</th>
                                <th>Wartość brutto</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="pozycje">
                        
                        @foreach($pozycje as $keys => $values)
                           @if(!empty($values['nazwa']))
                           <tr id="R{{$keys}}">
                                <td><i class="fas fa-grip-vertical"></i></td>
                                <td><input type="text" name="faktura[pozycje][{{ $keys }}][nazwa]" class="form-control rounded-0" value="{{ $values['nazwa'] }}"></td>
                                <td class="pkwiu" style="display:none;"><input type="text" name="faktura[pozycje][{{ $keys }}][pkwiu]" class="form-control rounded-0" value="{{ $values['pkwiu'] }}"></td>
                                <td><input type="text" name="faktura[pozycje][{{ $keys }}][ilosc]" class="form-control rounded-0" value="{{ $values['ilosc'] }}"></td>
                                <td><input type="text" name="faktura[pozycje][{{ $keys }}][jm]" class="form-control rounded-0" value="szt." value="{{ $values['jm'] }}"></td>
                                <td class="rabat" style="display:none;"><input type="text" name="faktura[pozycje][{{ $keys }}][rabat]" value="{{ $values['rabat'] }}" class="form-control rounded-0"></td>
                                <td><input type="text" name="faktura[pozycje][{{ $keys }}][wartosc_netto_rabat]" class="form-control rounded-0" value="{{ $values['wartosc_netto_rabat'] }}"></td>
                                <td><input type="text" name="faktura[pozycje][{{ $keys }}][vat]" value="23" class="form-control rounded-0" value="{{ $values['vat'] }}"></td>
                                <td><input type="text" name="faktura[pozycje][{{ $keys }}][wartosc_netto_rabat]" class="form-control rounded-0" value="{{ $values['wartosc_netto_rabat'] }}"></td>
                                <td><input type="text" name="faktura[pozycje][{{ $keys }}][wartosc_brutto_rabat]" class="form-control rounded-0" value="{{ $values['wartosc_brutto_rabat'] }}"></td>
                                <td><button class="btn btn-danger rounded-0 remove" type="button"><i class="fas fa-times"></i></button></td>
                            </tr>
                           

                           @elseif(!empty($values['opis']))
                           <tr id="R{{ $keys }}">
                                <td><i class="fas fa-grip-vertical"></i></td>
                                <td colspan="7"><input type="text" name="faktura[pozycje][{{ $keys }}}][opis]" class="form-control rounded-0" placeholder="Opis" value="{{ $values['opis'] }}"></td>
                                <td><button class="btn btn-danger rounded-0 remove" type="button"><i class="fas fa-times"></i></button></td>
                            </tr>
                           @else
                           
                            @endif
                           
                           
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
                
                <div class="card-body row">
                    <div class="col-md-12">
                        <button class="btn btn-success rounded-0" type="button" id="addBtn"><i class="fas fa-plus-square"></i> Dodaj pozycję</button>
                        <button class="btn btn-secondary rounded-0" type="button" id="addOpis"><i class="fas fa-plus-square"></i> Dodaj opis</button>
                    
                        

                    </div>
                
                </div>
            </div>
        </div>

      
    </div>

    <!-- 4 -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="rodzaj_platnosci"><b>Płatność:</b></label>
                                <select name="faktura[dane][rodzaj_platnosci]" class="form-control rounded-0" id="platnosc">
					                <option value="Przelew" @if($dane["rodzaj_platnosci"] == "Przelew") selected="" @endif>Przelew</option>
                                    <option value="Gotówka" @if($dane["rodzaj_platnosci"] == "Gotówka") selected="" @endif>Gotówka</option>
                                    <option value="Karta płatnicza" @if($dane["rodzaj_platnosci"] == "Karta płatnicza") selected="" @endif>Karta płatnicza</option>
                                    <option value="Barter" @if($dane["rodzaj_platnosci"] == "Barter") selected="" @endif>Barter</option>
                                    <option value="BLIK" @if($dane["rodzaj_platnosci"] == "BLIK") selected="" @endif>BLIK</option>
                                    <option value="Czek" @if($dane["rodzaj_platnosci"] == "Czek") selected="" @endif>Czek</option>
                                    <option value="DotPay" @if($dane["rodzaj_platnosci"] == "DotPay") selected="" @endif>DotPay</option>
                                    <option value="Kompensata" @if($dane["rodzaj_platnosci"] == "Kompensata") selected="" @endif>Kompensata</option>
                                    <option value="Opłata za pobraniem" @if($dane["rodzaj_platnosci"] == "Opłata za pobraniem") selected="" @endif>Opłata za pobraniem</option>
                                    <option value="PayPal" @if($dane["rodzaj_platnosci"] == "PayPal") selected="" @endif>PayPal</option><option value="PayU">PayU</option>
                                    <option value="Płatność elektroniczna" @if($dane["rodzaj_platnosci"] == "Płatność elektroniczna") selected="" @endif>Płatność elektroniczna</option>
                                    <option value="Przelewy24" @if($dane["rodzaj_platnosci"] == "Przelewy24") selected="" @endif>Przelewy24</option>
                                </select>
                            </div>
                        </div>
                            
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="numer"><b>Termin płatności (dni):</b></label>
                                <input name="faktura[dane][termin_platnosci_dni]" class="form-control rounded-0" id="termin_platnosci_dni" value="{{ $dane['termin_platnosci_dni'] }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="status"><b>Status:</b></label>
                                <select name="faktura[dane][status]" class="form-control rounded-0" id="status">
					                <option value="0" @if($dane["status"] == 0) selected="" @endif>Nieopłacona</option>
                                    <!-- <option value="1" @if($dane["status"] == 1) selected="" @endif>Częściowo opłacona</option> -->
                                    <option value="2" @if($dane["status"] == 2) selected="" @endif>Opłacona</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="status"><b>Uwagi:</b></label>
                                <textarea name="faktura[dane][uwagi]" id="uwagi" class="form-control rounded-0 dropdown-toggle textarea_class">{{ $dane['uwagi'] }}</textarea>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>


       
    </div>
     
    <div class="col-md-6 text-left mt-3">
            <a class="btn btn-secondary rounded-0" href="{{ route('faktura.index') }}" role="button"><i class="fas fa-long-arrow-alt-left"></i> Produkty</a>
        </div>
        <div class="col-md-6 text-right mt-3">
            <button class="btn btn-success rounded-0" type="submit" role="button"><i class="fas fa-save"></i> Zapisz</button>
        </div>    
</div>


</form>
@endsection

@section('js')
<script>
    $(document).ready(function () {

    let rowIdx = 1

    $('#addBtn').on('click', function () {
        $('.pozycje').append(`
        <tr id="R${rowIdx}">
            <td><i class="fas fa-grip-vertical"></i></td>
            <td><input type="text" name="faktura[pozycje][${rowIdx}][nazwa]" class="form-control rounded-0"></td>
            <td class="pkwiu" style="display:none;"><input type="text" name="faktura[pozycje][${rowIdx}][pkwiu]" class="form-control rounded-0"></td>
            <td><input type="text" name="faktura[pozycje][${rowIdx}][ilosc]" class="form-control rounded-0"></td>
            <td><input type="text" name="faktura[pozycje][${rowIdx}][jm]" class="form-control rounded-0" value="szt."></td>
            <td class="rabat" style="display:none;"><input type="text" name="faktura[pozycje][${rowIdx}][rabat]" class="form-control rounded-0"></td>
            <td><input type="text" name="faktura[pozycje][${rowIdx}][wartosc_netto_rabat]" class="form-control rounded-0"></td>
            <td><input type="text" name="faktura[pozycje][${rowIdx}][vat]" value="23" class="form-control rounded-0"></td>
            <td><input type="text" name="faktura[pozycje][${rowIdx}][wartosc_netto_rabat]" class="form-control rounded-0"></td>
            <td><input type="text" name="faktura[pozycje][${rowIdx}][wartosc_brutto_rabat]" class="form-control rounded-0"></td>
            <td><button class="btn btn-danger remove" type="button"><i class="fas fa-times"></i></button></td>
        </tr>`)
        rowIdx++
    })

    $('#addOpis').on('click', function () {
        $('.pozycje').append(`<tr id="R${++rowIdx}">
        <tr id="R${++rowIdx}">
            <td><i class="fas fa-grip-vertical"></i></td>
            <td colspan="7"><input type="text" name="faktura[pozycje][${++rowIdx}][opis]" class="form-control rounded-0" placeholder="Opis"></td>
            <td><button class="btn btn-danger rounded-0 remove" type="button"><i class="fas fa-times"></i></button></td>
        </tr>`)
    })

        $('.pozycje').on('click', '.remove', function () {
            let child = $(this).closest('tr').nextAll()

            child.each(function () {
                let id = $(this).attr('id')
                let idx = $(this).children('.row-index').children('p')
                let dig = parseInt(id.substring(1))
                idx.html(`Row ${dig - 1}`)
                $(this).attr('id', `R${dig - 1}`)
            });
            $(this).closest('tr').remove()
            rowIdx--
        });
    
                
        $('.sortable-table tbody').sortable()

    })
    
    </script>
@endsection
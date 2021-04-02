@extends('layouts.app')

@section('title', 'Faktura')

@section('css')


@endsection

@section('content')


<div class="container">
    <h3>Faktura</h3>
</div>
<form  action="{{ route('faktura.store') }}" method="POST">
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
                                <input name="faktura[dane][numer_faktury]" class="form-control rounded-0" id="numer_faktury">
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group mb-3">
                                <label for="numer"><b>Data wystawienia:</b></label>
                                <div class="input-group date" id="datawystawienia">
                                    <input type="text" class="form-control datepicker rounded-0" name="faktura[dane][data_wystawienia]" value="{{ date('Y-m-d') }}" id="data_wystawienia">
                                    <div class="input-group-append" style="">
                                        <span class="input-group-text" id="basic-addon3"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group mb-3">
                                <label for="numer"><b>Miejsce wystawienia:</b></label>
                                <input name="faktura[dane][miejsce_wystawienia]" class="form-control rounded-0" id="miejsce">
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="input-group mb-3">
                                <label for="numer"><b>Data sprzedaży:</b></label>
                                <div class="input-group date" data-provide="datepicker" id="datasprzedzy">
                                    <input type="text" class="form-control datepicker rounded-0" name="faktura[dane][data_sprzedazy]" value="{{ date('Y-m-d') }}" id="data_sprzedazy">
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
                                    <textarea autocomplete="off" type="text" name="faktura[sprzedawca][nazwa]" style="overflow: hidden; overflow-wrap: break-word; height: 34px;" class="form-control rounded-0 textarea_class dropdown-toggle" id="sprzedawca_nazwa" rows="1" placeholder="Podaj pełną nazwę firmy"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP:</label>
                                    <input type="text" name="faktura[sprzedawca][nip]" value="" class="form-control rounded-0" id="nip">
                                </div>
                                <div class="form-group">
                                    <label for="ulica">Ulica i nr:</label>
                                    <textarea name="faktura[sprzedawca][ulica_i_numer]" id="ulica" class="form-control klient rounded-0 textarea_class" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 32.9886px;"></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4 float-left">
                                        <label for="kod">Kod pocztowy:</label>
                                        <input type="text" name="faktura[sprzedawca][kod_pocztowy]" value="" class="form-control rounded-0" id="kod">
                                    </div>

                                    <div class="form-group col-md-8 float-right">
                                        <label for="miejscowosc">Miejscowość:</label>
                                        <input type="text" name="faktura[sprzedawca][miejscowosc]" value="" class="form-control rounded-0" id="miejscowosc">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sprzedawca_podpis">Podpis:</label>
                                    <input name="faktura[sprzedawca][podpis]" class="form-control rounded-0" id="sprzedawca_podpis" value="">
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
                                    <textarea autocomplete="off" type="text" name="faktura[nabywca][nazwa]" class="form-control rounded-0 textarea_class dropdown-toggle" id="nazwa_n__" rows="1" placeholder="Podaj pełną nazwę firmy"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP:</label>
                                    <input type="text" name="faktura[nabywca][nip]" value="" class="form-control rounded-0" id="nip_n">
                                </div>
                                <div class="form-group">
                                    <label for="ulica">Ulica i nr:</label>
                                    <textarea name="faktura[nabywca][ulica_i_numer]" id="ulica_i_numer_n" class="form-control rounded-0 klient textarea_class" rows="1" style="overflow: hidden; overflow-wrap: break-word; height: 32.9886px;"></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4 float-left">
                                        <label for="kod">Kod pocztowy:</label>
                                        <input type="text" name="faktura[nabywca][kod_pocztowy]" value="" class="form-control rounded-0" id="kod_pocztowy_n">
                                    </div>

                                    <div class="form-group col-md-8 float-right">
                                        <label for="miejscowosc">Miejscowość:</label>
                                        <input type="text" name="faktura[nabywca][miejscowosc]" value="" class="form-control rounded-0" id="miejscowosc_n">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="podpis_nabywca">Podpis:</label>
                                    <input name="faktura[nabywca][podpis]" class="form-control rounded-0" id="podpis_nabywca">
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
                            <tr id="R0">
                                <td><i class="fas fa-grip-vertical"></i></td>
                                <td><input type="text" name="faktura[pozycje][0][nazwa]" class="form-control rounded-0"></td>
                                <td class="pkwiu" style="display:none;"><input type="text" name="faktura[pozycje][0][pkwiu]" class="form-control rounded-0"></td>
                                <td><input type="text" name="faktura[pozycje][0][ilosc]" class="form-control rounded-0"></td>
                                <td><input type="text" name="faktura[pozycje][0][jm]" class="form-control rounded-0" value="szt."></td>
                                <td class="rabat" style="display:none;"><input type="text" name="faktura[pozycje][0][rabat]" class="form-control rounded-0"></td>
                                <td><input type="text" name="faktura[pozycje][0][wartosc_netto_rabat]" class="form-control rounded-0"></td>
                                <td><input type="text" name="faktura[pozycje][0][vat]" value="23" class="form-control rounded-0"></td>
                                <td><input type="text" name="faktura[pozycje][0][wartosc_netto_rabat]" class="form-control rounded-0"></td>
                                <td><input type="text" name="faktura[pozycje][0][wartosc_brutto_rabat]" class="form-control rounded-0"></td>
                                <td><button class="btn btn-danger rounded-0 remove" type="button"><i class="fas fa-times"></i></button></td>
                            </tr>
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
					                <option value="Przelew" selected="">Przelew</option>
                                    <option value="Gotówka">Gotówka</option>
                                    <option value="Karta płatnicza">Karta płatnicza</option>
                                    <option value="Barter">Barter</option>
                                    <option value="BLIK">BLIK</option>
                                    <option value="Czek">Czek</option>
                                    <option value="DotPay">DotPay</option>
                                    <option value="Kompensata">Kompensata</option>
                                    <option value="Opłata za pobraniem">Opłata za pobraniem</option>
                                    <option value="PayPal">PayPal</option><option value="PayU">PayU</option>
                                    <option value="Płatność elektroniczna">Płatność elektroniczna</option>
                                    <option value="Przelewy24">Przelewy24</option>
                                </select>
                            </div>
                        </div>
                            
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="numer"><b>Termin płatności (dni):</b></label>
                                <input name="faktura[dane][termin_platnosci_dni]" class="form-control rounded-0" value="1" id="termin_platnosci_dni">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="status"><b>Status:</b></label>
                                <select name="faktura[dane][status]" class="form-control rounded-0" id="status">
					                <option value="0" selected="">Nieopłacona</option>
                                    <!-- <option value="1">Częściowo opłacona</option> -->
                                    <option value="2">Opłacona</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="status"><b>Uwagi:</b></label>
                                <textarea name="faktura[dane][uwagi]" id="uwagi" class="form-control dropdown-toggle textarea_class rounded-0"></textarea>
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



    // $(function() {
    //     $( ".sortable-ul" ).sortable();
    // });

    $(document).ready(function () {
        // $.fn.datepicker.defaults.format = "yyyy-mm-dd";
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
            <td><button class="btn btn-danger rounded-0 remove" type="button"><i class="fas fa-times"></i></button></td>
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
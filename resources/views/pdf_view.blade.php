<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<div class="a4">
   <style type="text/css">
      table { padding: 0px; margin: auto; border-collapse: collapse; }
      td { padding: 4px; margin: 0px; font-size:12px; line-height: 1.3; }
      .title { text-align:center; font-weight: 400; font-size:14pt; line-height: 0.8; }
      .subtitle { text-align:center; font-size:12px; line-height: 1.3; padding-top: 2px; }
      td .body { text-align:center; line-height: 1.3; font-weight: 400; }
      td .head { text-align:center; border-top: 0.5px solid black; background-color: #e2e2e2; font-weight: 300; font-size:12px; padding: 5px; line-height: 0.8; }
      td .body1 { text-align:left; font-weight: 300; }
      td .head1 { text-align:center; border-top: 0.5px solid black; background-color: #e2e2e2; font-weight: 400; font-size:12px; padding: 5px; line-height: 0.8; }
      #table th { padding: 2 6 6 6; text-align:center; border-left: 0.5px solid black; border-right: 0.5px solid black; border-top: 0.5px solid black; background-color: #e2e2e2; font-weight: 400; font-size:12px; line-height: 1.3; }
      #table th.no1 { padding: 2 6 6 6; text-align:center; border: 0px; background-color: #ffffff; font-weight: 400; font-size:14px; line-height: 1.3; }
      #table td { padding: 2 6 6 6; border-left: 0.5px solid black; border-right: 0.5px solid black; border-bottom: 0.5px solid black; line-height: 1.3; font-size:12px; }
      #table td.bold { font-weight: 400; border: 0.5px solid black; background-color: #e2e2e2; }
      #table td.bold1 { font-weight: 400; }
      #table tr.pad td { padding: 0 6 6 6; }
      #table td small { font-size:8pt; color: #575757; }
      #table td.no { border: 0px; text-align:center; font-size:8pt; line-height: 1.3; }
      #table td.no1 { border: 0px; text-align:right; font-size:12px; font-weight: 400; padding-top: 4px; }
      #table td.no2 { border: 0px; font-size:12px; line-height: 1.3; border: 0px; }
      #table td.b { border: 0px; text-align:right; font-weight: 400; font-size:12px; }
      .top td { border-top: 0.5px solid black; }
      #table1 td { border-top: 0.5px solid black; line-height: 1.3; vertical-align: baseline; font-size:12px; font-weight: 300; border-collapse: separate; table-layout: fixed; }
      #table1 tr td:first-child { white-space: nowrap; padding: 3 0 3 0; }
      #table1 tr td:last-child { text-align:left; width: 100%; padding: 3 0 3 8; }
      #table1 tr td:first-child.pad { padding: 3 0 3 0; white-space: normal; }
      #table1 b { font-weight: 400; font-size:12px; }
      #table2 td { padding: 3 5 5 5; border-left: 0px; border-right: 0px; border-bottom: 0.5px solid black; line-height: 1.3; font-size:12px; font-weight: 400; }
      #table2 td.no { border: 0px; text-align:center; font-size:8pt; line-height: 1.3; font-weight: 300; }
      #table3 td { border-top: 0.5px solid black; line-height: 1.3; vertical-align: baseline; font-size:12px; font-weight: 300; border-collapse: separate; table-layout: fixed; padding: 3 0 3 0; }
      #table3 b { font-weight: 400; font-size:12px; }
      #table4 td { font-size:14px; font-weight: 400; padding: 0px 0px 8px 0px; }
      #uwagi td { padding: 2 0 5 0; border-top: 0.5px solid black; font-size:12px; line-height: 1.3; vertical-align: baseline; }
      #uwagi td.no { padding: 2 0 5 0; border: 0px; font-size:12px; line-height: 1.3; vertical-align: baseline; }
      .nowrap { white-space: nowrap; }
   </style>
   <br><br>
   <table width="100%" cellpadding="0" cellspacing="0">
      <tbody>
         <tr>
            <td width="50%" valign="" align=""></td>
            <td width="6%"></td>
            <td width="44%" valign="top">
               <table width="100%" cellpadding="0" cellspacing="0">
                  <tbody>
                     <tr>
                        <td class="head">Miejsce wystawienia</td>
                     </tr>
                     <tr>
                        <td class="body">{{ $dane['miejsce_wystawienia'] }}</td>
                     </tr>
                     <tr>
                        <td style="font-size:10px;">&nbsp;</td>
                     </tr>
                     <tr>
                        <td class="head">Data wystawienia</td>
                     </tr>
                     <tr>
                        <td class="body">{{ $dane['data_wystawienia'] }}</td>
                     </tr>
                     <tr>
                        <td style="font-size:10px;">&nbsp;</td>
                     </tr>
                     <tr>
                        <td class="head">Data sprzedaży</td>
                     </tr>
                     <tr>
                        <td class="body">{{ $dane['data_sprzedazy'] }}</td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
   <br><br>
   <table width="100%" cellpadding="0" cellspacing="0">
      <tbody>
         <tr>
            <td width="46%" valign="top">
               <table width="100%" cellpadding="0" cellspacing="0">
                  <tbody>
                     <tr>
                        <td class="head1">Sprzedawca</td>
                     </tr>
                     <tr>
                        <td class="body1">
                        @if($sprzedawca['nazwa'])
                            {{ $sprzedawca['nazwa'] }}
                        @endif
                        @if($sprzedawca['nip'])
                            <br>NIP: {{ $sprzedawca['nip'] }}
                        @endif
                        @if($sprzedawca['ulica_i_numer'])
                            <br>{{ $sprzedawca['ulica_i_numer'] }}
                        @endif
                        @if($sprzedawca['kod_pocztowy'])
                            <br>{{ $sprzedawca['kod_pocztowy'] }}
                        @endif
                        @if($sprzedawca['miejscowosc'])
                            <br>{{ $sprzedawca['miejscowosc'] }}
                        @endif
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
            <td width="8%"></td>
            <td width="46%" valign="top">
               <table width="100%" cellpadding="0" cellspacing="0">
                  <tbody>
                     <tr>
                        <td class="head1">Nabywca</td>
                     </tr>
                     <tr>
                        <td class="body1">
                        @if($nabywca['nazwa'])
                            {{ $nabywca['nazwa'] }}
                        @endif
                        @if($nabywca['nip'])
                            <br>NIP: {{ $nabywca['nip'] }}
                        @endif
                        @if($nabywca['ulica_i_numer'])
                            <br>{{ $nabywca['ulica_i_numer'] }}
                        @endif
                        @if($nabywca['kod_pocztowy'])
                            <br>{{ $nabywca['kod_pocztowy'] }}
                        @endif
                        @if($nabywca['miejscowosc'])
                            <br>{{ $nabywca['miejscowosc'] }}
                        @endif
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
   <br><br>
   <table width="100%" cellpadding="0" cellspacing="0">
      <tbody>
         <tr>
            <td class="title">Faktura VAT {{ $dane['numer_faktury'] }}</td>
         </tr>
      </tbody>
   </table>
   <br>
   <table id="table" cellspacing="0" cellpadding="0" width="100%">
      <tbody>
         <tr>
            <th width="4%">Lp.</th>
            <th >Nazwa towaru lub usługi</th>
            <th width="8%">Jm.</th>
            <th width="7%">Ilość</th>
            <th width="10%">Cena netto</th>
            <th width="10%">Wartość netto</th>
            <th width="10%">Stawka VAT</th>
            <th width="10%">Kwota VAT</th>
            <th width="10%">Wartość brutto</th>
         </tr>
         
         @php 
         $i = 1;
         $summ = 0;
         @endphp
         @foreach($pozycje as $keys => $values)
            @if(!empty($values['nazwa']))
            <tr class="pad">
                <td class="nowrap" align="center" valign="top">{{ $i }}</td>
                <td align="left" valign="top">{{ $values['nazwa'] }}</td>
                <td class="nowrap" align="center" valign="top">{{ $values['jm'] }}</td>
                <td class="nowrap" align="center" valign="top">{{ $values['ilosc'] }}</td>
                <td class="nowrap" align="left" valign="top">{{ number_format($values['wartosc_netto_rabat'], 2, '.', '') }}</td>
                <td class="nowrap" align="right" valign="top">{{ number_format($values['wartosc_netto_rabat'], 2, '.', '')  }}</td>
                <td class="nowrap" align="center" valign="top">{{ $values['vat'] }}%</td>
                <td class="nowrap" align="right" valign="top">{{ number_format($values['vat'], 2, '.', '')  }}</td>
                <td class="nowrap" align="right" valign="top">{{ number_format($values['wartosc_brutto_rabat'], 2, '.', '') }}</td>
            </tr>
            {{ $summ += $values['wartosc_brutto_rabat'] }}
            {{ $i++ }}
            @elseif(!empty($values['opis']))
            <tr class="pad">
                <td class="nowrap" align="left" colspan="9" valign="top">{{ $values['opis'] }}</td>
            </tr>
            @else

            @endif


        
        @endforeach
        
      </tbody>
   </table>
   <br><br><br>
   <table width="100%" cellpadding="0" cellspacing="0">
      <tbody>
         <tr>
            <td width="46%" valign="top">
               <table id="table1" width="100%" cellpadding="0" cellspacing="0">
                  <tbody>
                     <tr>
                     @if($dane["status"] == 0) 
                        <td><b>Nieopłacona</b></td>
                        <td><b>{{ number_format(0, 2, '.', '') }} PLN</b></td>
                     @elseif($dane["status"] == 1)
                        <td><b>Częściowo opłacona</b></td>
                        <td><b>{{ number_format($summ, 2, '.', '') }} PLN</b>
                        @if($dane['termin_platnosci_dni'])<br>Data płatności: 
                           @php echo date('d-m-Y', strtotime($dane['data_wystawienia'].' + '.$dane['termin_platnosci_dni'].' days')) @endphp 
                        @endif
                        </td>
                     @elseif($dane["status"] == 2)
                        <td><b>Opłacona</b></td>
                        <td><b>{{ number_format($summ, 2, '.', '') }} PLN</b>
                        @if($dane['termin_platnosci_dni'])<br>Data płatności: 
                           @php echo date('d-m-Y', strtotime($dane['data_wystawienia'].' + '.$dane['termin_platnosci_dni'].' days')) @endphp 
                        @endif
                        </td>
                     @else
                     <td><b></b></td>
                     @endif
                     </tr>
                  </tbody>
               </table>
               <table id="table1" width="100%" cellpadding="0" cellspacing="0">
                  <tbody>
                     <tr>
                        <td>Sposób płatności</td>
                        <td>{{ $dane['rodzaj_platnosci'] }}</td>
                     </tr>
                  </tbody>
               </table>
            </td>
            <td width="8%"></td>
            <td width="46%" valign="top">
               <table id="table1" width="100%" cellpadding="0" cellspacing="0">
                  <tbody>
                  @if($dane["status"] == 0) 
                     <tr>
                        <td><b>Do zapłaty</b></td>
                        <td><b>{{ number_format($summ, 2, '.', '') }} PLN</b></td>
                     </tr>
                  @elseif($dane["status"] == 2)
                     <tr>
                        <td><b>Do zapłaty</b></td>
                        <td><b>{{ number_format(0, 2, '.', '') }} PLN</b></td>
                     </tr>
                  @else 

                  @endif
                  </tbody>
               </table>
               <table id="table1" width="100%" cellpadding="0" cellspacing="0">
                  <tbody>
                     <tr>
                        <td>Słownie</td>
                        @if($dane["status"] == 0) 
                           @php
                              $kwota = new \KwotaSlownie\KwotaSlownie(number_format($summ, 2, '.', ''), false);
                           @endphp
                           <td>{{ $kwota }}</td>
                        @elseif($dane["status"] == 2)
                           @php
                              $kwota = new \KwotaSlownie\KwotaSlownie(number_format(0, 2, '.', ''), false);
                           @endphp
                           <td>{{ $kwota }}</td>

                        @else 

                        @endif
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
   <br>
   @if($dane['uwagi'])
   <table id="uwagi" width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td><b>Uwagi:</b> {{ $dane['uwagi'] }}</td></tr></tbody></table>
   @endif
   <table width="100%" cellpadding="0" cellspacing="0">
      <tbody>
         <tr>
            @if($sprzedawca['podpis'])
            <td width="50%" align="center" valign="bottom">
               <table id="table2" cellspacing="0" cellpadding="0" width="250">
                  <tbody>
                   
                     <tr>
                        <td width="100%" height="60" valign="bottom" align="center" style="padding-top:5px; padding-bottom:5px;"><br>{{ $sprzedawca['podpis'] }}</td>
                     </tr>
                   
                     <tr>
                        <td class="no">Podpis osoby upoważnionej do wystawienia</td>
                     </tr>
                  </tbody>
               </table>
            </td>
            @endif
            @if($nabywca['podpis'])
            <td width="50%" align="center" valign="bottom">
               <table id="table2" cellspacing="0" cellpadding="0" width="220">
                  <tbody>
                    
                    
                     <tr>
                        <td width="100%" height="60" valign="bottom" align="center" style="padding-top:5px; padding-bottom:5px;"><br>{{ $nabywca['podpis'] }}</td>
                     </tr>
                     
                     <tr>
                        <td class="no">Podpis osoby upoważnionej do odbioru</td>
                     </tr>
                  </tbody>
               </table>
            </td>
            @endif
         </tr>
      </tbody>
   </table>
</div>
</body>
</html>  
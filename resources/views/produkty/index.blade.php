@extends('layouts.app')

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
@endsection

@section('content')

<div class="container">
    <div class="row mb-3">
        <div class="col-md-12 mb-3 text-right">
            <a class="btn btn-success rounded-0" href="{{ route('produkty.create') }}" role="button"><i class="fas fa-plus-square"></i> Dodaj produkt</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><span>Produkty</span></div>
                <div class="card-body">
                        <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Nazwa produktu</th>
                                <th>Cena netto</th>
                                <th>Cena brutto</th>
                                <th>VAT</th>
                                <th>Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($produkty) > 0)
                                @foreach($produkty ?? [] as $key => $value) 
                                <tr>
                                    <td>{{ $value->nazwa }}</td>
                                    <td>{{ $value->netto }} {{ $value->waluta->symbol }}</td>
                                    <td>{{ $value->brutto }} {{ $value->waluta->symbol }}</td>
                                    <td>{{ number_format($value->netto / 100 * $value->vat, 2, '.', '')  }} {{ $value->waluta->symbol }}</td>
                                    <td><a href="{{ route('produkty.edit', ['produkty' => $value->id ]) }}" class="btn btn-info"><i class="far fa-edit"></i></a> <a class="btn btn-danger destroy" data-id="{{ $value->id }}"><i class="far fa-trash-alt"></i></a>
                                </tr>

                                    
                                @endforeach
                            @else
                                <tr>
                                    <td>Brak informacji</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>


<script>

$(document).ready( function () {
    $('#table_id').DataTable()
})

$(".destroy").click(function(e){

    if (confirm('Czy na pewno chcesz usunąć ?')) {
        const id = $(this).data("id")

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax(
        {
            url: "/produkty/"+id,
            type: 'delete',
            dataType: "JSON",
            data: {
                "produkty": id
            },
            success: function (response)
            {
                if(response.status == 1) {
                    toastr.success(response.msg, {timeOut: 5000})
                    location.reload();
                } else if (response.status == 2) {
                    toastr.error(response.msg, {timeOut: 5000})
                } else {
                    toastr.error(response.msg, {timeOut: 5000})
                }
                
            },
            error: function(xhr) {
            console.log(xhr.responseText);
        }
        });
    }
});

</script>
@endsection
@extends('layouts.app')

@section('title', 'Faktury - Strona główna')

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
@endsection

@section('content')

<div class="container">
    <div class="row mb-3">
        <div class="col-md-12 mb-3 text-right">
            <a class="btn btn-success rounded-0" href="{{ route('faktura.create') }}" role="button"><i class="fas fa-plus-square"></i> Wystaw Fakturę</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><span>Faktury</span></div>
                <div class="card-body">
                        <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Numer faktury</th>
                                <th>Data wystawienia</th>
                                <th>Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @if(count($faktura) > 0)
                                @foreach($faktura ?? [] as $key => $value) 
                                @php $dane = json_decode($value); @endphp

                                <tr>
                                    <td>{{ $dane->dane->numer_faktury }}</td>
                                    <td>{{ $dane->dane->data_wystawienia }}</td>
                                    <td><a href="{{ route('faktura.edit', ['faktura' => $value->id ]) }}" class="btn btn-info"><i class="far fa-edit"></i></a>  <a class="btn btn-primary" href="{{ route('create.pdf', ['id' => $value->id]) }}"><i class="far fa-file-pdf"></i></a> <a class="btn btn-danger destroy" data-id="{{ $value->id }}"><i class="far fa-trash-alt"></i></a>
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
            url: "/faktura/"+id,
            type: 'delete',
            dataType: "JSON",
            data: {
                "faktura": id
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
@extends('layouts.app')

@section('content')
 <!-- Jumbotron -->
 <div class="p-5 text-center bg-light">
        <h1 class="mb-3">Celem zadania jest napisanie skryptu PHP do wystawiania faktur.</h1>
          
        <p>  Minimalna funkcjonalność:</p>
        <p> - wystawienie dokumentu dla klienta (dane podane w inputach z klawiatury)</p>
        <p> - przypisanie pozycji do faktury</p>
        <p> - nadanie numeru, daty</p>
        <p> - lista wystawionych faktur</p>
        <p> - usuwanie faktur</p>
        <a class="btn btn-primary" href="{{ route('register') }}" role="button">Start</a>
    </div>
    <!-- Jumbotron -->
@endsection

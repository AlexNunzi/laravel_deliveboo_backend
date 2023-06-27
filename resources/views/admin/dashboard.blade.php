@extends('layouts.app')

@section('content')
<div class=" d-flex justify-content-center my-3 p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
    <div class="col-lg-7 p-3 p-lg-5 pt-lg-3 ">
      <h1 class="display-4 fw-bold lh-1">Benvenuti in Deliveboo!</h1>
      <p class="lead">Benvenuti nella parte amministrativa di Deliveboo! Da qui puoi gestire i tuoi piatti aggiungendone, se vuoi, degli altri! Prova i bottoni qua sotto per provare le funzionalità!</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        <a class="btn btn-primary btn-lg px-4 me-md-2 fw-bold" href="{{ route('admin.foods.index') }}">Cibi</a>
        <a class="btn btn-outline-secondary btn-lg px-4"href="{{ route('admin.foods.create') }}">Aggiungi Piatto</a>
      </div>
    </div>
  </div>
<div class="row align-items-md-stretch">
    <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h2>Change the background</h2>
            <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
          <button class="btn btn-outline-light" type="button">Example button</button>
        </div>
    </div>
    <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Add borders</h2>
            <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
            <button class="btn btn-outline-secondary" type="button">Example button</button>
        </div>
    </div>
</div>
@endsection

{{-- <a class="btn btn-primary" href="{{ route('admin.foods.index') }}">Cibi</a>
<a class="btn btn-warning" href="{{ route('admin.foods.create') }}">Aggiungi piatto</a>
Benvenuti nella parte amministrativa di Deliveboo! Da qui puoi gestire i tuoi piatti aggiungendone, se vuoi, degli altri! Prova i bottoni qua sotto per provare le funzionalità! --}}
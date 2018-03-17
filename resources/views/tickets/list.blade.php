@extends('layouts/app')
@section('content')
    <div class="container-fluid">
        @if(session()->has('fm_t'))
        <div class="alert alert-dismissible fade show alert-{{ session('fm_t') }}">
            {!! session('fm_m') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            @if(count($tickets)>0)
            <div class="col-12">
                <h2 class="mb-4">Lista de Tickets</h2>
            </div>
            @foreach($tickets as $ticket)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">Nombre: {{$ticket->name}} - Prioridad: {{$ticket->priority}}</div>
                    <div class="card-body">
                        <p class="card-text">{{$ticket->description}}</p>
                        <div class="text-right">
                            <a class="btn btn-light mr-2" href="{{ route('tickets.edit', $ticket->id) }}">Editar</a>
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="d-inline-block">
                                <input type="hidden" name="_method" value="DELETE"> {{ csrf_field() }}
                                <button class="btn btn-dark">Eliminar</a>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small>{{$ticket->created_at->format('d-m-Y H:m:s')}}</small>
                    </div>
                </div>
            </div>
            @endforeach @else
            <div class="col-12">
                <h4>No hay tickets registrados</h4>
            </diV>
            @endif
        </div>
    </div>
</div>
@endsection
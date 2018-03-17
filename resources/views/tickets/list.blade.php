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
            <div class="col-12">
                <form method="get" action="{{route('tickets.search')}}">
                    @isset($priority)
                    <input type="hidden" value="{{ $priority }}" name="priority"> @endisset
                    <div class="input-group mb-4">
                        <input type="text" class="form-control" placeholder="Ingrese nombre o descripcion del ticket" aria-label="Ingrese nombre o descripcion del ticket"
                            aria-describedby="basic-addon2" name="q">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Button</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-4 col-lg-3 col-xl-2 mb-4 mb-md-0">
                <div class="list-group">
                    @foreach($priorities as $item) @isset($priority)
                    <a href="{{ route('tickets.priority', $item->value) }}" class="list-group-item list-group-item-action {{ $item->value == $priority ? 'active' : '' }}">
                        {{$item->value}}
                    </a>
                    @endisset @empty($priority)
                    <a href="{{ route('tickets.priority', $item->value) }}" class="list-group-item list-group-item-action">
                        {{$item->value}}
                    </a>
                    @endempty @endforeach
                </div>
            </div>
            @include('includes.cards') @else
            <div class="col-12">
                <h4>No hay tickets registrados</h4>
            </diV>
            @endif @if(Request::is('list/search') || Request::is('list/priority/*'))
            <div class="col-12 mt-3 text-right">
                <a href="{{ route('tickets.list') }}" class="btn btn-secondary">Regresar</a>
            </div>
            @endif
        </div>   
    </div>
@endsection
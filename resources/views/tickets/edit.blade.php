@extends('layouts/app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Editar Ticket</h2>
                <form method="post" action="{{route('tickets.update',$ticket->id )  }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put" />
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" value="{{ $ticket->name }}" name="name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="id_description">Descripción</label>
                        <textarea class="form-control {!! $errors->first('description','is-invalid') !!}" name="description" id="id_description" rows="3">{{ $ticket->description }}</textarea>
                        {!! $errors->first('description','<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="id_priority">Nivel de Importancia </label>                        
                        <select class="form-control" id="id_priority" name="priority">
                            @foreach($priorities as $priority)
                                @if($priority->value == $ticket->priority){
                                    <option selected value="{{$ticket->priority}}">{{$ticket->priority}}</option>
                                }
                                @else{
                                    <option value="{{$priority->value}}">{{$priority->value}}</option>    
                                }
                                @endif
                            @endforeach                             
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-1 mr-2">Editar</button>
                    <a class="btn btn-light mt-1" href="{{route('tickets.list')}}">Regresar</a>
                </form>
            </div>
        </div>
    </div>
@endsection 
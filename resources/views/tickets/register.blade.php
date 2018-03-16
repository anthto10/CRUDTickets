@extends('layouts/app') 
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Registrar Tickets</h2>
                <form method="post" action="{{route('createTicket')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="id_name">Nombre</label>
                        <input type="text" name="name" class="form-control {!! $errors->first('name','is-invalid') !!}" id="id_name" placeholder="Nombre" value="{{ old('name') }}">
                        {!! $errors->first('name','<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="id_description">Descripción</label>
                        <textarea class="form-control {!! $errors->first('description','is-invalid') !!}" name="description" id="id_description" rows="3" placeholder="Descripción" value="{{ old('description') }}"></textarea>
                        {!! $errors->first('description','<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="id_priority">Nivel de Importancia</label>
                        <select class="form-control" id="id_priority" name="priority">
                            <option selected value="Bajo">Bajo</option>
                            <option value="Medio">Medio</option>
                            <option value="Urgente">Urgente</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-1">Registrar</button>
                </form>
                @if(session()->has('fm_t'))
                    <div class="alert mt-4 alert-{{ session('fm_t') }}"> 
                        {!! session('fm_m') !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
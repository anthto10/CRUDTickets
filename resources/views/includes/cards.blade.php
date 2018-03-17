<div class="col-12 col-md">
    <div class="row">
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
        @endforeach
        <div class="col-12 mt-3">
            {!! $tickets->render() !!}
        </div>
    </div>
</div>
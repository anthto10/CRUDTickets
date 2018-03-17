<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;
use App\Ticket;
use App\Priority;

class TicketsController extends Controller
{
    public function index(){
        $priorities = Priority::all();    
        return view('tickets/register')->with('priorities',$priorities);
    }

    public function create(TicketRequest $request){
        try{
            $ticket = new Ticket;
            $ticket->name = $request->name;
            $ticket->description = $request->description;
            $ticket->priority = $request->priority;
            $ticket->save();
            return back()
                ->with( 'fm_t', 'success')
                ->with( 'fm_m', 'Ticket registrado con éxito.');
        }
        catch(\Exception $e){
            return back()
                ->with( 'fm_t', 'danger')
                ->with( 'fm_m', 'Error al registrar el ticket.')
                ->withInput();
        }
    }

    public function list(){
        $priorities = Priority::all();  
        $tickets = Ticket::orderBy('id','DESC')
                    ->paginate(10);   
        return view('tickets/list')
                ->with('tickets',$tickets)
                ->with('priorities',$priorities);
    }

    public function priority($value){
        $priorities = Priority::all();  
        $tickets = Ticket::orderBy('id','DESC')
            ->where('priority',$value)
            ->paginate(10);   
        return view('tickets/list')
            ->with('tickets',$tickets)
            ->with('priorities',$priorities)
            ->with('priority',$value);
    }

    public function edit($id){
        $ticket = Ticket::findOrfail($id);    
        $priorities = Priority::all();    
        return view('tickets/edit')
            ->with('ticket',$ticket)
            ->with('priorities',$priorities);    
    }

    public function update(Request $request, $id){  
        $this->validate($request, [
            'description' => 'required|max:150',
            'priority' => 'required'
        ]);
        try{
            $ticket = Ticket::find($id);  
            $ticket->description = $request->description;
            $ticket->priority = $request->priority;
            $ticket->save();
            return redirect()
                ->route('tickets.list')
                ->with( 'fm_t', 'success')
                ->with( 'fm_m', 'Ticket actualizado con éxito.');
        }
        catch(\Exception $e){
            return redirect()
                ->route('tickets.list')
                ->with( 'fm_t', 'danger')
                ->with( 'fm_m', 'Error al actualizar el ticket.')
                ->withInput();
        } 
    }

    public function destroy($id){
        $ticket = Ticket::find($id);      
        $ticket->delete();
        return back()
            ->with( 'fm_t', 'success')
            ->with( 'fm_m', 'Ticket eliminado con éxito.');;
    }

    public function search(Request $request){
        $priorities = Priority::all();  
        $search = $request->input('q');
        $priority = $request->input('priority');
        $searched = new Ticket;
        if($priority){   
            $searched = $searched->where('priority', $priority );
        }
        $searched = $searched->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', $search.'%')
                  ->orWhere('description', 'LIKE', $search.'%');
        });
        $searched = $searched->paginate(10);   
        return view('tickets/list')->with('tickets',$searched)->with('priorities',$priorities);
    }

  
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
{
    public function index(){
        return view('tickets/register');
    }

    public function createTicket(Request $request){
        $this->validate($request, [
            'name' => 'required|max:25',
            'description' => 'required|max:150',
            'priority' => 'required'
        ]);
        try{
            $ticket = new Ticket;
            $ticket->name = $request->input('name');
            $ticket->description = $request->input('description');
            $ticket->priority = $request->input('priority');
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
        return view('tickets/list');
    }
}

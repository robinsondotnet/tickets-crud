<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Models\Ticket as Ticket;

use Illuminate\Support\Facades\Input;

use Request;

use Redirect;


class TicketController extends Controller
{

    /**
     * Listado de Tickets
     *
     * @return Response
     */
    public function index()
    {
        $query_str = Input::get('query');
        $type = Input::get('type');

        if (Request::ajax() && !$type) {
            return Ticket::latest()->get();

        } else if (Request::ajax() && $type == "search") {
            return Ticket::where('nombre' ,'LIKE', "%$query_str%")
                ->orWhere('descripcion', 'LIKE', "%$query_str%")
                ->get();

        } else if (Request::ajax() && $type == "filter") {
            return Ticket::where('prioridad' , $query_str)
                ->get();

        } else {
            return view('ticket.index');
        }
    }

    /**
     * Vista de Formulario Crear
     *
     * @return Response
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Vista de Formulario Editar
     *
     * @return Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Crear Nuevo Ticket
     *
     * @return Response
     */
    public function store()
    {
        Ticket::create([
            'nombre' => Input::get('nombre'),
            'descripcion' => Input::get('descripcion'),
            'prioridad' => Input::get('prioridad'),
            'fecha_solicitud' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        return Redirect::to('tickets');
    }

    /**
     * Actualizar Ticket
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->nombre = Input::get('nombre');
        $ticket->descripcion = Input::get('descripcion');
        $ticket->prioridad = Input::get('prioridad');
        $ticket->save();

        return Redirect::to('tickets');
    }

    /**
     * Eliminar Ticket
     *
     * @return Response
     */
    public function destroy($id)
    {
        Ticket::destroy($id);

        return Redirect::to('tickets');
    }
    
}

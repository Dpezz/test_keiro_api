<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TicketRepository;
use App\Models\Ticket;

class TicketUserController extends Controller
{
    private $ticketRepository;

    public function __construct(ticketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->ticketRepository->findByUserId();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = $this->ticketRepository->find($id);
        if($ticket->user_id != auth()->user()->id) {
            return response(['message'=>'Invalid data'], 400);
        }
        $ticket->update([ 'ticket_pedido' => true ]);
        return $ticket;
    }
}

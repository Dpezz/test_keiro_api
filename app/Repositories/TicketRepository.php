<?php

namespace App\Repositories;

use App\Models;
use Illuminate\Http\Request;

class TicketRepository
{

    public function all() {
        return Models\Ticket::with('user')->get();
    }

    public function find($id) {
        return Models\Ticket::find($id);
    }

    public function findByUserId() {
        $user_id = auth()->user()->id;
        return Models\Ticket::with('user')->where('user_id', $user_id)->get();
    }
    
}

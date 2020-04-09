<?php

namespace App\Repositories;

use App\Models;
use Illuminate\Http\Request;

class UserRepository
{

    public function all() {
        return Models\User::select('users.*')
        ->join('type_users', 'users.type_user_id', '=', 'type_users.id')
        ->where('type_users.name','Usuario')
        ->get();
    }

    public function find($id) {
        return Models\User::find($id);
    }
    
}

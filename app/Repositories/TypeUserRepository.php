<?php

namespace App\Repositories;

use App\Models;
use Illuminate\Http\Request;

class TypeUserRepository
{

    public function all() {
        return Models\TypeUser::all();
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TypeUserRepository;

class TypeUserController extends Controller
{

    private $typeUserRepository;

    public function __construct(TypeUserRepository $typeUserRepository)
    {
        $this->typeUserRepository = $typeUserRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->typeUserRepository->all();
    }
    
}

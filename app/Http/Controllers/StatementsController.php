<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class StatementsController extends Controller
{
    public function getStatements()
    {
        return Inertia::render('Clientes/extractos');
    }
    public function getOwnStatements()
    {
        return Inertia::render('Extractos/cliente');
    }
}

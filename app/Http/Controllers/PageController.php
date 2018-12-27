<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function index()
    {
        return 'Page accueil';
    }

    public function contact()
    {
        return 'Page contact';
    }
    public function users($id="test")
    {
        return "Utilisateur $id";
    }
}

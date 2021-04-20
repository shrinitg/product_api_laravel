<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //

    public function getData()
    {
        return ['response' => 'API fetched'];
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\TempUser;
use Illuminate\Http\Request;

class TempUserController extends Controller
{
    public function getGuestInfo($id)
    {
        $temp = TempUser::where('idTemp','=',$id)->get();
        return $temp[0];
    }
}

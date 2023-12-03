<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuiMailController extends Controller
{
    public function quyenMatKhau(){
        return view('quen-mat-khau');
    }
}

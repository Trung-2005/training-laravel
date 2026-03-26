<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoxController extends Controller
{
    public function index() {
        $data = '<strong>Quang Trung</strong>';
        $number = 13;
        $array = ['PHP', 'Laravel', 'JavaScript'];
        return view('template-eng', [
            'data' => $data,
            'number' => $number,
            'array' => $array
        ]);
    }
}

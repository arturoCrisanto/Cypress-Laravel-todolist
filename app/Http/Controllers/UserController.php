<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home() {
        $data = todo::all();
        return view('todo', ['data' => $data]);
    }

    public function store(Request $request) {
        $data = todo::create([
            'content' => $request->input('content')
        ]);

        if ($data) {
            return redirect('/');
        }        
    }

    public function remove(Request $request) {
        $checkbox = $request->input('checked');

        foreach($checkbox as $data) {
            $list = todo::find($data);
            $list->delete();
        }        

        return redirect('/');
    }
}

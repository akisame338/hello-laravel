<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        $runningItems = Todo::flg(1)->get();
        $doneItems = Todo::flg(0)->get();

        return view('todo', [
            'runningItems' => $runningItems,
            'doneItems' => $doneItems,
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, Todo::$rules);

        $todo = new Todo();
        $form = $request->all();
        unset($form['_token']);
        $form['flg'] = 1;
        $todo->fill($form)->save();

        return redirect('/todo');
    }

    public function update(Request $request) {
        $todo = Todo::find($request->id);
        $todo->flg = 0;
        $todo->save();

        return redirect('/todo');
    }

    public function delete(Request $request) {
        $todo = Todo::find($request->id);
        $todo->delete();

        return redirect('/todo');
    }
}

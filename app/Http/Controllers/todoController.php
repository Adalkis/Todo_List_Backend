<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todoItem;

class todoController extends Controller
{
    public function index(){
        $todo = todoItem::orderBy('created_at','desc')->get();
        return $todo;

    }

  
    public function store(Request $request){
        $item = new todoItem;
        $item->name=$request->input('name');
        $item->save();
        return response()->json($item);
        
    }
    public function update($id, Request $request){
        $item = todoItem::find($id);
        $item->update($request->all());      
        return response()->json($item);
    }
    public function destroy($id){
        $item= todoItem::find($id);
        $item->delete();
        return response()->json('Deleted');
    }

  
}

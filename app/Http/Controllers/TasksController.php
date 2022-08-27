<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddTask;
// use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{

    public function create(Request $request){
        $this->validate($request,[
            'add_task'=>'required|max:50'
        ]);
        $data = new AddTask;
        $data->taskname = $request->add_task;
        $data->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Task inserted successfully'
            ]
        );
    }

    public function index(){
        $tasks = AddTask::paginate(5);
        return view('welcome',['data'=>$tasks]);
    }

    public function show($id){
        $data =  AddTask::find($id);
        return view('welcome',['data'=>$data]);
    }

    public function destroy($id){
        //  dd($id);
        $task = AddTask::find($id);
        $task->delete();
        // return redirect()->back()->with('message',"Task has been deleted successfully :)");
        return response()->json(
            [
                'success' => true,
                'message' => 'Task is successfully deleted :)'
            ]
        );
    }


    public function update(Request $req){
        $data =  AddTask::find($req -> id);
        $data->taskname = $req->taskname;
        $data->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Task is successfully updated :)'
            ]
        );
    }

}

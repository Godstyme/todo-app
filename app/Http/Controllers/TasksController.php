<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddTask;
// use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function save(Request $request){
        $this->validate($request,[
            'add_task'=>'required|max:50'
        ]);
        $data = new AddTask;
        $data->taskname = $request->add_task;
        $data->save();
        return redirect()->back()->with('message',"Successfully inserted a task :)");
    }

    public function displayTask(){
        $tasks = AddTask::paginate(5);
        return view('welcome',['data'=>$tasks]);
    }



    public function update($id){
        return redirect()->back()->with('message',"Successfully updated a task :)");
    }
    public function destroy($id){
        $task = AddTask::find($id);
        $task->delete();
        return redirect()->back()->with('message',"Task has been deleted successfully :)");
    }
}

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

    public function index(AddTask $addTask){
        $tasks = $addTask->paginate(5);
        // $tasks = AddTask::paginate(5);
        return view('welcome',['data'=>$tasks]);
    }

    public function show($id, AddTask $addTask){
        // $data =  AddTask::find($id);
        $data =  $addTask -> find($id);
        return view('welcome',['data'=>$data]);
    }

    public function destroy($id){
        //  dd($id);
        $task = AddTask::find($id);
        $task->delete();
        return redirect()->back()->with('message',"Task has been deleted successfully :)");
        // return response()->json(
        //     [
        //         'success' => true,
        //         'status'=> 200,
        //         'message' => 'Task is successfully deleted :)'
        //     ]
        // );
    }


    public function update(Request $req){
        $this->validate($req,[
            'taskname'=>'required|max:50'
        ]);
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
// regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/
    // public function index(Request $request,AddTask $addTask){

    //     if ($request->ajax()) {
    //         $getResult = $addTask->where(function($query){
    //             $query->where('welcome',$query->taskname);
    //         });

    //         return view('welcome', ['data'=>$tasks]);
    //     }

    //     $tasks = $addTask->paginate(5);
    //     return view('welcome',['data'=>$tasks]);
    // }

}


// https://www.cloudways.com/blog/live-search-laravel-ajax/
// https://stackoverflow.com/questions/39549007/table-search-that-works-with-laravel-pagination

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    //

    public $timestamps = false;

    


    // Add Tasks & save data in DB
    function addTasks(Request $request)
    {

        // Get the authenticated user's email
        $owner = Auth::user()->email;


        // Get current time stamp
        $currentTime = Carbon::now();

        $currentLocation = $request->loc;

        $address = "Dummy address";

        // echo $owner . $currentTime . $currentLocation;


        $outputResult = Task::insert([
            'owner' => $owner,
            'task_name' => $request->task_name,
            'created_at' => $currentTime,
            'start_lng_lat' => $currentLocation,
            'start_addr' => $address,
        ]);

        if ($outputResult) {
            // echo $outputResult;
            // echo "Data inserted";
            return redirect('tasks');
        } else {
            echo "Data not inserted";
            // echo "Student add called";
        }
    }


    function getTasks()
    {

        // Return function output from   Model
        $data = new Task;

        $owner = Auth::user()->email;
        // echo $data->testEx();

        // -------------------------------------------------
        // get all data from students table using    Model

        // $students = Task::all();
        // $students = Student::get();
        // $students = Student::find(1);
        $task_data = Task::where('owner', $owner)->get();
        // $students = Student::where('batch_year', '2018')->first();
        // $students = Student::where('name', 'John')->get();

        return view('task-list', ['tasks' => $task_data]);
    }


    function getSingleTask(Request $request)
    {

        $task_data = Task::where('id', $request->id)->get();

        return view('task', ['tasks' => $task_data]);
    }



    function updateTask(Request $request)
    {

        // Get the authenticated user's email
        $owner = Auth::user()->email;


        // Get current time stamp
        $currentTime = Carbon::now();

        // Get current time stamp
        $currentTime = Carbon::now();

        $currentLocation = $request->loc;

        $address = "Dummy address";

        // Save current login timestamp
        // $owner = Auth::user()->email;
        $out1 = Task::where('id', $request->id)->update(['status' => $request->status, 'end_lng_lat' => $currentLocation, 'end_addr' => $address, 'end_at' => $currentTime]);

        if ($out1) {
            return redirect('tasks');
        }
        // echo $request->id;
    }
}

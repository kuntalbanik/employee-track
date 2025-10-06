<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    // Add user function
    // Called from user-form.blade.php file
    function addUser(Request $request)
    {

        // store data in session
        $request->session()->put('name', $request->input('name'));

        // check session data
        // echo session('username');


        // store date to flash message
        $request->session()->flash('message', "User has been added successfully");



        // 1. Validation (ensure you validate all fields first)
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required', // 'confirmed' checks for a password_confirmation field
        // ]);


        // 2. Create the User record
        $user = new User();

        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->save();

        if ($user) {
            return "User added";
        } else {
            return "Operation failed";
        }
    }




    // login controller method
    function login(Request $request)
    {
        // Get current time stamp
        $currentTime = Carbon::now();

        $error = 'The provided credentials do not match our records.';
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->put('email', $request->input('email'));
            $request->session()->regenerate();

            // Save current login timestamp
            $owner = Auth::user()->email;
            $out1 = User::where('email', $owner)->update(['updated_at' => $currentTime]);
            if($out1){
                return redirect('dashboard');
            }
        } else {

            return $error;
        }
    }


    // logout controller method
    function logout(Request $request)
    {
        // 1. Log the user out
        Auth::logout();

        // 2. Invalidate the session (destroy all session data)
        $request->session()->invalidate();

        // 3. Regenerate the CSRF token (for security)
        $request->session()->regenerateToken();

        // 4. Redirect the user
        // Redirect the user to the homepage or login page
        return redirect('/login');
        // OR: return redirect('/login');
    }
}









// ======================================================
// ============  REF Code ===============================
// ======================================================

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\View;



// use function Pest\Laravel\put;

// class UserController extends Controller
// {
//     // new getUser() function to connect database manually
//     function getUser()
//     {

//         // for manual query run without using model
//         $users = DB::select('select * from users');
//         return view('user', ['users' => $users]);
//     }




//     function getUserName($name)
//     {
//         // return "Hi ". $name;
//         $users = ['Ram', 'Shyam', 'Roni'];
//         return view('getuser', ['name' => $name, 'users' => $users]);
//     }
//     function adminLogin()
//     {
//         if (View::exists('admin.login')) {
//             return view('admin.login');
//         } else {
//             echo "Page not found";
//         }
//     }

    


    



    





//     // logout function call from profile view page - only using session data testing
//     function logout()
//     {
//         session()->pull('username');
//         return redirect('profile');
//     }


    



//     // -----------------------------------------------

//     // put method
//     function put()
//     {
//         echo "Put method called from Controller";
//     }


//     // delete method
//     function delete()
//     {
//         echo "Delete method called from Controller";
//     }


//     // any method
//     function any()
//     {
//         echo "Any menthod called";
//     }


//     // match method using
//     function groupOne()
//     {
//         echo "Match method called group one";
//     }
//     function groupTwo()
//     {
//         echo "Match method called group two";
//     }



//     // File upload function
//     function upload(Request $request)
//     {
//         // 
//         // Before access uploaded file in project
//         // Enter the command first from command prompt
//         // 
//         // php artisan storage:link
//         // 
//         // and update config/filesystems.php
//         // 

//         // 'local' => [
//         //     'driver' => 'local',
//         //     'root' => storage_path('app'),
//         //     // 'serve' => true,
//         //     // 'throw' => false,
//         //     // 'report' => false,
//         // ],

//         // Automatic file name
//         // 
//         $path = $request->file('file')->store('public');
//         $fileNameArray = explode("/", $path);
//         $fileName = $fileNameArray[1];




//         // Custom file name
//         // 
//         // $file = $request->file('file');
//         // $originalName = $file->getClientOriginalName();

//         // $file->storeAs('public', $originalName);

//         // $fileNameArray = explode("/", $originalName);

//         // $fileName = $fileNameArray[0];




//         // return $fileNameArray;
//         return view('profile', ['filepath' => $fileName]);
//     }
// }

// ============================================================================
// ============================================================================

// function getStudents()
//     {

//         // Return function output from   Model
//         $data = new Student;
//         // echo $data->testEx();

//         // -------------------------------------------------
//         // get all data from students table using    Model

//         $students = Student::all();
//         // $students = Student::get();
//         // $students = Student::find(1);
//         // $students = Student::where('batch_year', '2018')->get();
//         // $students = Student::where('batch_year', '2018')->first();
//         // $students = Student::where('name', 'John')->get();

//         // ---------------------------------------------------

//         // 
//         // Insert data to table
//         // 
//         // $out1 = Student::insert([
//         //     'name'=>'Sam',
//         //     'email'=>'sam@test.com',
//         //     'batch_year'=>'2018',
//         // ]);

//         // if($out1) {
//         //     echo "Data inserted";
//         // } else {
//         //     echo "Data not inserted";

//         // }



//         // ---------------------------------------------------

//         // 
//         // Update data to table
//         // 

//         // $out1 = Student::where('name', 'Sam')->
//         //         update(['email'=>'sam@hello.com']);

//         // if ($out1) {
//         //     echo "Data updated";
//         // } else {
//         //     echo "Data not updated";
//         // }


//         // ---------------------------------------------------

//         // 
//         // Delete data from table
//         // 

//         // $out1 = Student::where('name', 'Sam')->delete();

//         // if ($out1) {
//         //     echo "Data Deleted";
//         // } else {
//         //     echo "Data not exists - From Controller";
//         // }







//         // API call 
//         // $response_data = Http::get('https://jsonplaceholder.typicode.com/posts/1');
//         // $response_data = $response_data->body();





//         // --------------------------------------------------
//         // 
//         // get/create/update/delete data using   database query builder
//         //

//         // get all data from table  'users'
//         $users_data = DB::table('users')->get();

//         // get output where batch year is : 2018
//         // $result = DB::table('users')->where('name', 'Kuntal')->get();

//         // get first row of the table
//         // $result = DB::table('users')->first(); 

//         // ---------------------------------------------------

//         // 
//         // Insert data to table
//         // 

//         // $out = DB::table('students')->insert([
//         //     'name'=>'Tinku',
//         //     'email'=>'tinku@test.com',
//         //     'batch_year'=>'2018',
//         // ]);

//         // if($out) {
//         //     echo "Data inserted";
//         // } else {
//         //  echo "Not Inserted";
//         // }

//         // -------------------------------------------------
//         // 
//         // Update data to table
//         //

//         // $out = DB::table('students')->where('name', 'Sam')->
//         //         update(['email'=>'sam@hello.com']);

//         // if($out) {
//         //     echo "Data Updated";
//         // } else {
//         //     echo "Not updated";
//         // }


//         // -------------------------------------------------
//         // 
//         // Delete data from table
//         //

//         // $out = DB::table('students')->where('name', 'Sam')->
//         //         delete();

//         // if($out) {
//         //     echo "Data Deleted";
//         // } else {
//         //     echo "Not Deleted";
//         // }






//         //  $response_data for API call output
//         // return view('students', ['students' => $students, 'response_data' => json_decode($response_data), 'result' => $result]);



//         return view('students', ['students' => $students, 'users' => $users_data]);
//         // json_decode()  return response to json type
//     }


//     // Delete student function to delete data from DB

//     function deleteStudent($id)
//     {
//         $isDeleted = Student::destroy($id);
//         if ($isDeleted) {
//             // echo "`$id` Deleted";
//             return redirect('students');
//         }
//     }



//     // Add student function to save data in DB

//     function addStudent(Request $request)
//     {

//         $outputResult = Student::insert([
//             'name' => $request->name,
//             'email' => $request->email,
//             'batch_year' => $request->batch,
//         ]);

//         if ($outputResult) {
//             // echo $outputResult;
//             // echo "Data inserted";
//             return redirect('students');
//         } else {
//             echo "Data not inserted";
//             // echo "Student add called";
//         }
//     }
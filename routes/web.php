<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;
use RealRashid\SweetAlert\Facades\Alert;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Display All Tasks
 */


Route::get('/', function () {
    return view('tasks');
});




/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', function ($id) {
    //
});


/**
 * Add A New Task
 */

Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        alert()->error('Whoops! Something went wrong!','The name field is required.');

        return redirect('/')
            ->withInput()
            ->withErrors($validator);

    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});



Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});


Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});



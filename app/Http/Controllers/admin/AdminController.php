<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use Auth;
use App\Admin;
use DB;


class AdminController extends Controller
{
    
    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin.home');
    }
    
    public function admin_dashboard(){
      return view('admin.dashboard');
    }
    
    public function admin_tasks_list(){
        //$tasks = DB::table('tasks')->join('users', 'tasks.user_id', '=', 'users.id')->get();
        
        //$tasks = Task::find(2)->Task()->User()->get();
        //$users = $tasks->user;
        $tasks = Task::with('user')->get();
        $users = User::get();
        //dd($users);
      //$tasks = Task::with('user')->get();
      //echo $tasks->user()->username;
      //dd($tasks);
      return view('admin.task', array(
            'tasks' => $tasks,
            'users' => $users
            ));
      //['tasks' => Task::with('user')->get()]);
    }
    
    
/**
 * Function to retrieve the index page
 */
//public function index()
//{
//$errors = "None";
//return view('admin/login')->with('errors', $errors);
//}

/**
 * Function to attempt authorization, and redirect to admin page if successful, redirect to login with errors if not
 */
//public function login()
//{
//$input = Input::all();
//    if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password'] ))) {
//      return redirect('admin/appointments');
//    } else {
//      $errors = "Invalid username or password";
//      return view('admin/login')->with('errors', $errors);
//}
//}

//  public function appointments()
//  {
//    return view('admin/appointments');
//  }
//  public function availability()
//  {
//    return view('admin/availability');
//  }
//
//  public function configuration()
//  {
//    $configuration = Configuration::with('timeInterval')->first();
//    return view('admin/configuration', ['configuration' => $configuration]);
//  }
//
//  /**
//   * View function for list of packages
//   * @return view 
//   */
//  public function packages() {
//    $packages = Package::all();
//    return view('admin/packages/index', ['packages' => $packages]);
//  }
//
//  /**
//   * View Function to edit package information
//   * @param  int $package_id
//   * @return view
//   */
//  public function editPackage($package_id)
//  {
//    return view('admin/packages/editPackage', ['package' => Package::find($package_id)]);
//  }
//
//  public function updatePackage($package_id)
//  {
//    dd('tets');
//  }
//
//  public function anySetTime()
//  {
//    dd('test');
//  }
}

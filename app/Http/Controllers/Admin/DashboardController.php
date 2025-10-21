<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Field;
use App\Models\Level;
use App\Models\Project;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
      // Module Data
      $this->title = 'الإحصائيات';
      $this->route = 'admin.dashboard';
      $this->view = 'admin';
   }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {


 $projects_count = Project::count();           // returns integer
    $levels_count = Level::count();               // returns integer
    $fields_count = Field::count();               // returns integer
    $contact_messages_count = ContactMessage::count(); // returns integer

    return view('admin.index', compact(
        'projects_count',
        'levels_count',
        'fields_count',
        'contact_messages_count'
    ));



   }


   public function changeStatus(Request $request)
   {
      $item = $request->type::find($request->id);
      $item->active = $request->status;
      $item->save();
      return response()->json(['success' => 'status change successfully.']);
   }
}

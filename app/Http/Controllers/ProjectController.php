<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\DetailProject;
use Illuminate\Support\Facades\Session;
use DB;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function projectPost(Request $request)
    {
        $project =  new Project();
        $project->name_of_project = $request->name_of_project;

        $monthProject = $request->month_of_project;
        $project->month_of_project = date("Y-F", strtotime($monthProject));
        
        $project->email_project = $request->session()->get('email');
        $project->save();

        $getLatestId =  DB::table('projects')->orderBy('id', 'desc')->value('id'); // untuk mendapatkan ID terakhir
        
      
        $c = count($request->destination_project); // count for looping
        for ($x=0; $x < $c; $x++) { 
            $detail_project = new DetailProject;
            $detail_project->id_project = $getLatestId;
            $detail_project->destination_project = $request->destination_project[$x];

            $dateFrom = $request->start_date_project[$x];
            $detail_project->start_date_project = date("Y-m-d", strtotime($dateFrom)); // Convert format date into Y-m-d for database

            $dateTo = $request->end_date_project[$x];
            $detail_project->end_date_project = date("Y-m-d", strtotime($dateTo)); // Convert format date into Y-m-d for database

            $detail_project->remarks_project = $request->remarks_project[$x];
            $detail_project->save();
            
        }

        return redirect('project')->with('alert-success','Project Add Successfully');
        
    }
}

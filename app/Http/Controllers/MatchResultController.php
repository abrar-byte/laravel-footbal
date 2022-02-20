<?php

namespace App\Http\Controllers;

use App\Models\MatchResult;
use App\Models\Schedule;
use App\Models\Score;
use Illuminate\Http\Request;

class MatchResultController extends Controller
{
    //
    // public function idx()
    // { 
    //   $scores = Score::all(); 
    //   foreach ($scores as $score) {
    //     echo $score->match_id;
    // } 
    // }
    public function index(){
        // $count = Score::where('match_id','=','$match_id')->count();

    
   
     


        return view ('matchs',
        [
            "title" => "All matchs", 
            "active" => 'matchs',
        
            "matchs" => MatchResult::latest()->filter(request(['search','schedule']))->paginate(7)->withQueryString(),
            "scores"=>Score::all(),
            // "count"=>$count

        ]);
    }

  
   
}

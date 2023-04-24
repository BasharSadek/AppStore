<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{

    public function main()
    {
        $games = Program::where('status', 'games')->limit(10)->OrderBy('programs.id', 'DESC')->get();
       
        $apps = Program::where("status", 'apps')->limit(10)->OrderBy('programs.id', 'DESC')->get();
        //   dd($apps);
        // $apps = DB::select("SELECT programs.id,programs.name,programs.description,programs.logo,programs.Downloads,
        //  programs.status,programs.path
        //  FROM programs JOIN comments
        //  ON programs.id=comments.program_id
        //  WHERE programs.status='apps'
        //  GROUP BY programs.id
        //  ORDER BY AVG(comments.evaluation) DESC
        //  LIMIT 3");
      //  $apps = DB::select('select * from programs');
    
        // $apps = Program::selectRaw('programs.*')
        //     ->join('comments', 'comments.program_id', '=', 'programs.id')
        //     //->where('')
        //     ->groupBy('programs.id')
        //     ->orderBy('programs.id', 'DESC')
        //     ->limit(10)
        //     ->get();

        // $apps = DB::table('programs')
        //     ->select(DB::raw('count(*) as user_count'))
        //     ->join('comments', 'comments.program_id', 'programs.id')
        //     ->where('status', '=', 'apps')
        //     ->groupBy('programs.id')
        //     ->OrderBy('programs.id', 'DESC')
        //     ->limit(10)
        //     ->get();

        // $apps = DB::table('programs')
        //     ->select('programs.*',DB::raw( 'AVG( comments.evaluation )' ))
        //     ->join('comments', 'comments.program_id', 'programs.id')


        //     // ->avg('comments.evaluation')
        //     ->where('status', '=', 'apps')
        //     ->groupBy('programs.id')
        //     ->OrderBy('programs.id', 'DESC')
        //     ->limit(10)
        //     ->get();



        return view('website.index', compact('games', 'apps'));
    }
    public function redirect()
    {
        $games = Program::where('status', 'games')->limit(10)
            ->OrderBy('programs.id', 'DESC')->get();
        $apps = Program::where('status', 'apps')
            ->limit(10)->OrderBy('programs.id', 'DESC')->get();
        return view('website.index', compact('games', 'apps'));
    }
    public function superAdmin()
    {
        $countClients = User::where('status', 'client')->count('id');
        $countAdmins = User::where('status', 'admin')->count('id');
        $countApps = Program::where('status', 'apps')->count('id');
        $countGames = Program::where('status', 'games')->count('id');
        $user = User::findOrFail(auth()->user()->id);
        return view('superAdmin.index', compact('user', 'countAdmins', 'countClients', 'countApps', 'countGames'));
    }

    public function admin()
    {
        $countClients = User::where('status', 'client')->count('id');
        $countApps = Program::where('status', 'apps')->count('id');
        $countGames = Program::where('status', 'games')->count('id');
        $user = User::findOrFail(auth()->user()->id);
        return view('admin.index', compact('user', 'countClients', 'countApps', 'countGames'));
    }
    public function welcome()
    {
        return view('welcome');
    }
}

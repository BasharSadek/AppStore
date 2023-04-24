<?php

namespace App\Http\Controllers\Website;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function games()
    {
        $games = Program::where('status', '=', 'games')
            ->OrderBy('programs.id', 'DESC')->get();
        return view('website.games', compact('games'));
    }
    public function apps()
    {
        $apps = Program::where('status', '=', 'apps')
            ->OrderBy('programs.id', 'DESC')->get();
        return view('website.apps', compact('apps'));
    }
    public function archive()
    {
        if (Auth::id()) {
            $archive =  DB::table('archives')
                ->select('archives.*', 'programs.*')
                ->join('programs', 'programs.id', 'archives.program_id')
                ->where('archives.user_id', '=', auth()->user()->id)
                ->get();
            return view('website.archive', compact('archive'));
        } else {
            return redirect()->route('login');
        }
    }
    public function addTOArchiveProgram($id)
    {
        if (Auth::id()) {

            $foundProgram = DB::table('archives')
                ->select('archives.program_id', 'archives.user_id')
                ->where('archives.program_id', '=', $id)
                ->where('archives.user_id', '=', auth()->user()->id)
                ->get();

            // dd($foundProgram);
            if (count($foundProgram) == 0) {
                Archive::create([
                    'program_id' => $id,
                    'user_id' => auth()->user()->id,
                ]);
            }
            return redirect()->back();
        } else {
            return redirect()->route('login');
        }
    }
    public function removeFromArchiveProgram($id)
    {

        $archive = Archive::where('program_id', '=', $id);
        $archive->delete();
        return  redirect()->back();
    }
    public function showProgram($id)
    {
        // $program = Program::findOrFail($id);
        // $program = Program::with('images')
        $program = DB::table('programs')
            ->select('programs.*', 'images.name as imgName', 'images.program_id')
            ->join('images', 'images.program_id', 'programs.id')
            ->where('images.program_id', '=', $id)->get();
     //   dd($program);
        $comment = DB::table('users')
            ->select(
                'users.*',
                'comments.name as commentName',
                'comments.created_at as created',
                'comments.evaluation',
                'comments.user_id',
                'comments.id as comment_id'
            )
            ->join('comments', 'comments.user_id', 'users.id')
            ->where('comments.program_id', '=', $id)
            ->where('comments.deleted_at', '=', null)
            ->limit(10)->OrderBy('comments.id', 'DESC')->get();

        return view('website.showProgram', compact('program', 'comment'));
    }

    public function download($id)
    {
        $program = Program::findOrFail($id);
        $path = $program->path;
        $program->Downloads = $program->Downloads + 1;
        $program->save();
        return  response()->download(public_path($path));
    }
    public function searchWebsite(Request $request)
    {
        if ($request->searchText == '') {
            return  redirect()->back();
        }
        $searchText = $request->searchText;
        $program = Program::where('name', 'like', "%$searchText%")
            ->orWhere('description', 'like', "%$searchText%")
            ->get();
        return view('website.search', compact('program'));
    }
    public function storeComment(Request $request, $id)
    {
        if (Auth::id()) {
            $comment = new Comment();
            $comment->name = $request->comment;
            $comment->evaluation = $request->star;
            $comment->program_id = $id;
            $comment->user_id = auth()->user()->id;
            $comment->save();
            return  redirect()->back();
        } else {
            return redirect()->route('login');
        }
    }
    public function deleteComment($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->delete();
        return redirect()->back();
    }

    public function logoutWebsite()
    {
        Auth::logout();
        return redirect('/');
    }
}

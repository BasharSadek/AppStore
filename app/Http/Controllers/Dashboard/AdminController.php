<?php

namespace App\Http\Controllers\Dashboard;


use App\Models\User;
use App\Models\Image;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Trait\UploadDownload;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    use UploadDownload;
    public function viewClients()
    {
        $user = User::findOrFail(auth()->user()->id);
        $clients = User::where('status', '=', 'client')
            ->limit(100)->OrderBy('users.id', 'DESC')->get();
        return view('admin.viewClients', compact('clients', 'user'));
    }
    public function deleteClientAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return  redirect()->back();
    }
    public function profileAdmin()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }
    public function saveProfileAdmin(Request $request)
    {
        // $data = [
        //     'selfie' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'facebook' => 'nullable|string',
        //     'instagram' => 'nullable|string',
        //     'phone' => 'require|string',
        //     'email' => 'require|email|unique:users',
        //     'name' => 'require|string',
        //     'password' => 'require|string',
        // ];


        //   $validatedData = $request->validate($data);

        $id = auth()->user()->id;
        $user = User::findorFail($id);


        $user->name = strip_tags($request->name);
        $user->email = strip_tags($request->email);
        $user->password = strip_tags(bcrypt($request->password));
        $user->facebook = strip_tags($request->facebook);
        $user->instagram = strip_tags($request->instagram);
        $user->phone = strip_tags($request->phone);

        if ($request->file('selfie')) {
            $file = $request->file('selfie');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $user->selfie = strip_tags('images/' . $filename);
        }
        // if ($request->has('selfie')) {
        //     $selfie = $this->uploadImage(strip_tags($request->selfie));
        //     $user->update(['selfie' => $selfie]);
        // }
        $user->save();
        return redirect()->back();
    }
    public function createProgram()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('admin.addProgram', compact('user'));
    }
    public function storeProgram(Request $request)
    {
        // $data = [
        //     'name' => 'require|string',
        //     'description' => 'require|string',
        //     'statas' => 'require',
        //     'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'path' => 'nullable|mimes:apk,abb|max:204800000',
        // ];
        //   $validatedData = $request->validate($data);

        $program = new Program();
        $program->name = strip_tags($request->name);
        $program->description = strip_tags($request->description);
        $program->status = strip_tags($request->status);
        $program->logo = '';
        $program->path = '';
        $program->Downloads = 0;

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $program->logo = strip_tags('images/' . $filename);
        }
        if ($request->file('path')) {
            $file = $request->file('path');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('program'), $filename);
            $program->path = strip_tags('program/' . $filename);
        }
        // if ($request->file('path')) {
        //     $path = $this->uploadImage(strip_tags($request->file('path')));
        //     $program->update(['path' => $path]);
        // }
        $program->save();
        $image = new Image();
        if ($request->file('image1')) {
            $file = $request->file('image1');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $image->name = strip_tags('images/' . $filename);
        }
        //  $image->name;
        $image->program_id = $program->id;
        $image->save();

        $image = new Image();
        if ($request->file('image2')) {
            $file = $request->file('image2');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $image->name = strip_tags('images/' . $filename);
        }

        $image->program_id = $program->id;
        $image->save();


        $image = new Image();
        if ($request->file('image3')) {
            $file = $request->file('image3');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $image->name = strip_tags('images/' . $filename);
        }

        $image->program_id = $program->id;
        $image->save();
        return redirect()->back();
    }
    public function indexProgram()
    {
        $user = User::findOrFail(auth()->user()->id);
        $program = Program::OrderBy('programs.id', 'DESC')->get();
        return view('admin.viewProgram', compact('program', 'user'));
    }
    public function deleteProgram($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return  redirect()->back();
    }
    public function editProgram($id)
    {
        $user = User::findOrFail(auth()->user()->id);
        $program =  Program::findorFail($id);
        return view('admin.updateProgram', compact('program', 'user'));
    }
    public function updateProgram(Request $request, $id)
    {
        // $data = [
        //     'name' => 'require|string',
        //     'description' => 'require|string',
        //     'statas' => 'require',
        //     'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'path' => 'nullable|mimes:apk,abb|max:204800000',
        // ];
        //   $validatedData = $request->validate($data);

        $program = Program::findorFail($id);

        $program->name = strip_tags($request->name);
        $program->description = strip_tags($request->description);
        $program->status = strip_tags($request->status);

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $program->logo = strip_tags('images/' . $filename);
        }
        if ($request->file('path')) {
            $file = $request->file('path');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('program'), $filename);
            $program->path = strip_tags('program/' . $filename);
        }
        $program->save();
        return redirect()->back();
    }
    public function indexComments()
    {
        $user = User::findOrFail(auth()->user()->id);
        $comment = DB::table('comments')
            ->select(
                'users.selfie',
                'programs.name as programName',
                'users.status',
                'users.name as userName',
                'comments.*',
                'comments.name as commentName',
                'comments.id as comment_id'
            )
            ->join('users', 'users.id', 'comments.user_id')
            ->join('programs', 'programs.id', 'comments.program_id')
            ->where('comments.deleted_at', '=', null)
            ->limit(100)->OrderBy('comments.id', 'DESC')
            ->get();
        // dd($comment);
        return view('admin.comment', compact('comment', 'user'));
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Trait\UploadDownload;
use App\Models\Comment;
use App\Models\Program;
use App\Models\Setting;
use App\Notifications\sendEmailNotification;

use Illuminate\Validation\Validator;
//use Illuminate\Support\Facades\Validator;
use Notification;

class SuperAdminController extends Controller
{
    use UploadDownload;
    public function addAdmin()
    {
        $user = User::findOrFail(auth()->user()->id);
        return  view('superAdmin.addAdmin', compact('user'));
    }
    public function supercreateAdmin(Request $request)
    {
        // $result =  Validator::make($request->all(), [
        //     'selfie' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'facebook' => 'nullable|string',
        //     'instagram' => 'nullable|string',
        //     'phone' => 'require|string',
        //     'email' => 'require|email|unique:users',
        //     'name' => 'require|string',
        //     'password' => 'require|string',
        // ])->validate();
        // $data = [
        //     'selfie' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'facebook' => 'nullable|string',
        //     'instagram' => 'nullable|string',
        //     'phone' => 'require|string',
        //     'email' => 'require|email|unique:users',
        //     'name' => 'require|string',
        //     'password' => 'require|string',
        // ];

        $request->validate([
            'selfie' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'phone' => 'require|string',
            'email' => 'require|email|unique:users',
            'name' => 'require|string',
            'password' => 'require|string',
        ]);
        //  $validatedData = $request->validateRequire($result);
        $user = new User();
        $user->name = strip_tags($request->name);
        $user->status = 'admin';
        $user->email = strip_tags($request->email);
        $user->password = strip_tags(bcrypt($request->password));
        $user->facebook = strip_tags($request->facebook);
        $user->instagram = strip_tags($request->instagram);
        $user->phone = strip_tags($request->phone);
        // $user = User::create([
        //     'name' => strip_tags($request->name),
        //     'status' => 'admin',
        //     'email' => strip_tags($request->email),
        //     'password' => strip_tags(bcrypt($request->password)),
        //     'facebook' => strip_tags($request->facebook),
        //     'instgram' => strip_tags($request->instgram),
        //     'phone' => strip_tags($request->phone),
        // ]);
        // if ($request->file('selfie')) {
        //     $selfie = $this->uploadImage($request->file('selfie'));
        //     $user->selfie = $selfie;
        // }
        if ($request->file('selfie')) {
            $file = $request->file('selfie');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $user->selfie = strip_tags('images/' . $filename);
        }
        $user->save();
        return redirect()->back();
    }
    public function allAdmin()
    {
        $admins = User::where('status', '=', 'admin')
            ->OrderBy('users.id', 'DESC')->get();
        $user = User::findOrFail(auth()->user()->id);
        return view('superAdmin.viewAdmin', compact('admins', 'user'));
    }
    public function deleteAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return  redirect()->back();
    }
    public function editAdmin($id)
    {

        $user = User::findOrFail($id);
        if ($user->status == 'admin') {

            return view('superAdmin.editAdmin', compact('user'));
        } else {
            return view('superAdmin.index');
        }
    }
    public function updateAdmin(Request $request, $id)
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
        $user = User::findOrfail($id);
        if ($user->status == 'admin') {

            if ($request->file('selfie')) {
                $file = $request->file('selfie');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $user->selfie = strip_tags('images/' . $filename);
            }


            $user->name = strip_tags($request->name);
            $user->email = strip_tags($request->email);

            $user->facebook = strip_tags($request->facebook);
            $user->instagram = strip_tags($request->instagram);
            $user->phone = strip_tags($request->phone);


            $user->save();
            return redirect()->back();
        } else {
            return view('superAdmin.index');
        }
    }
    public function settingsSuperAdmin()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('superAdmin.settings', compact('user'));
    }

    public function saveSettingsSuperAdmin(Request $request)
    {
        // $data = [
        //     'title' => 'nullable|string',
        //     'description' => 'nullable|string',
        //     'icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ];
        //   $validatedData = $request->validate($data);
        $setting = Setting::first();
        $setting->title = strip_tags($request->title);
        $setting->description = strip_tags($request->description);

        if ($request->file('icon')) {
            $file = $request->file('icon');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $setting->icon = strip_tags('images/' . $filename);
        }

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $setting->logo = strip_tags('images/' . $filename);
        }
        // if ($request->has('icon')) {
        //     $icon = $this->uploadImage(strip_tags($request->icon));
        //     $setting->update(['icon' => $icon]);
        // }
        // if ($request->has('logo')) {
        //     $logo = $this->uploadImage(strip_tags($request->logo));
        //     $setting->update(['logo' => $logo]);
        // }
        $setting->save();
        return redirect()->back();
    }
    public function profileSuperAdmin()
    {
        $user = User::findOrFail(auth()->user()->id);
        $superAdmin = User::first();
        return view('superAdmin.profile', compact('superAdmin', 'user'));
    }
    public function saveProfileSuperAdmin(Request $request)
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
        $user = User::first();

        if ($request->file('selfie')) {
            $file = $request->file('selfie');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $user->selfie = strip_tags('images/' . $filename);
        }
        $user->name = strip_tags($request->name);
        $user->email = strip_tags($request->email);
        $user->password = strip_tags(bcrypt($request->password));
        $user->facebook = strip_tags($request->facebook);
        $user->instagram = strip_tags($request->instagram);
        $user->phone = strip_tags($request->phone);
        $user->save();
        return redirect()->back();
    }

    public function usersDeleted()
    {
        $user = User::findOrFail(auth()->user()->id);
        $users = User::onlyTrashed()->get();
        return view('superAdmin.usersDelete', compact('users', 'user'));
    }
    public function deleteUserForce($id)
    {
        // Post::withTrashed()->where('id', $id)->forceDelete();
        // return redirect()->back();
        $user = User::withTrashed()->find($id);
        $user->forceDelete();
        return redirect()->back();
    }
    public function restoreUsers($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        return redirect()->back();
    }

    public function programDeleted()
    {
        $user = User::findOrFail(auth()->user()->id);
        $programs = Program::onlyTrashed()->get();
        return view('superAdmin.programDeleted', compact('programs', 'user'));
    }

    public function deleteProgramForce($id)
    {
        $program = Program::withTrashed()->find($id);
        $program->forceDelete();
        return redirect()->back();
    }
    public function restorePrograms($id)
    {
        $program = Program::withTrashed()->find($id);
        $program->restore();
        return redirect()->back();
    }

    public function CommentsDeleted()
    {
        $user = User::findOrFail(auth()->user()->id);
        $comments = Comment::onlyTrashed()->get();
        return view('superAdmin.commentDelete', compact('comments', 'user'));
    }
    public function deleteCommentForce($id)
    {
        $comment = Comment::withTrashed()->find($id);
        $comment->forceDelete();
        return redirect()->back();
    }
    public function restoreComments($id)
    {
        $comment = Comment::withTrashed()->find($id);
        $comment->restore();
        return redirect()->back();
    }
    public function send_email($id)
    {
        $user = User::findOrFail(auth()->user()->id);
        $send = User::findOrFail($id);
        return view('superAdmin.email_info', compact('send', 'user'));
    }
    public function sendUserEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $details = [
            'greeting' => strip_tags($request->greeting),
            'firstline' => strip_tags($request->firstline),
            'body' => strip_tags($request->body),
            'button' => strip_tags($request->button),
            'url' => strip_tags($request->url),
            'lastline' => strip_tags($request->lastline),
        ];
        Notification::send($user, new sendEmailNotification($details));
        return redirect()->back();
    }
}

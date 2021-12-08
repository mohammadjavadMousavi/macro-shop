<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {

        Gate::authorize('read-user');

        return view('admin.user.index',[
            'users' => User::all()
        ]);
    }

    public function destroy(User $user)
    {

        Gate::authorize('delete-user',$user);


        $com = Comment::query()->where('user_id',$user->id)->get();

        

        foreach ($com as $comment) {
            $comment->delete();
        }
        

        $user->delete();

        return redirect()->back();
    }

    public function create()
    {
        Gate::authorize('create-user');

        return view('admin.user.create',[
            'roles' => Role::all()
        ]);
    }

    public function store(UserRequest $request)
    {

        Gate::authorize('create-user');


        User::query()->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'statusVerify' => '1',
                'role_id' => $request->get('role_id'),
                'verifyCode' => bcrypt('12345')
            ]);

        return redirect(route('admin.user.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Mail\InviteUser;
use App\Role;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::where('name','!=','app-admin')->get();
//        $locations = Location::orderBy('location_name','asc')->get();

        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserStoreRequest $request)
    {
        $input = $request->validated();
        DB::beginTransaction();
        try{
            $user = User::create(['name'=>$input['name'],'surname'=>$input['surname'],'contact_number'=>$input['contact_number'],'address'=>$input['address'],'email'=>$input['email'],'password'=>Hash::make('secret')]);
            $role = Role::where('name','agent')->first();
            $user->roles()->attach($role->id);
            $user = $user->load('roles');

            $verification_url = url('account-completion/'.$user->id);
            Mail::to($user)->send(new InviteUser($user,$verification_url));
            DB::commit();
            return redirect()->route('user.index')->withStatus(__('User successfully created.'));
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('user.index')->withStatus(__('An Error occurred.'));
//            return response()->json(['message' => 'User could not be saved at the moment ' . $e->getMessage()], 400);
        }

    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User  $user)
    {
        $input = $request->all();
        DB::beginTransaction();
        try{
            $user->update(['name'=>$input['name'],'surname'=>$input['surname'],'contact_number'=>$input['contact_number'],'address'=>$input['address'],'email'=>$input['email']]);
            DB::commit();
            return redirect()->route('user.index')->withStatus(__('User successfully updated.'));

        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('user.index')->withStatus(__('An error occurred during updating.'.$e->getMessage()));
        }

    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}

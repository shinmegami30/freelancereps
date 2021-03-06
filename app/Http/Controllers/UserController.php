<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Request $request, User $user)
    {
        if ( auth()->user()->hasPermissionTo('view users')){
            $q = $request->input('q');
            
            if($q!=""){
                $user = User::where('name', $q)->paginate(20);
            } else{
                $user = User::orderBy('id', 'asc')->paginate(20);
            }
            return view('users.index')->with('users', $user);
        }
        else{
            return redirect()->route('dashboard')->withError(__('You have no permission to access that page.') );
        }
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if ( auth()->user()->hasPermissionTo('publish users')){
            return view('users.create');
        }
        else{
            return redirect()->route('dashboard')->withError(__('You have no permission to access that page.') );
        }
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $user_role = $request->input('role');
        $email = $request->input('email');

        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        
        $user = User::where('email', $email)->first();

        $user->assignRole($user_role);

        return redirect()->route('user.index')->withStatus(__('User successfully created.' ));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        if ( auth()->user()->hasPermissionTo('edit users')){
            if ($user->id == 1) {
                return redirect()->route('user.index')->withError(__('You have no permission to access that page.') );
            }

            return view('users.edit', compact('user'));
        }
        else{
            return redirect()->route('dashboard')->withError(__('You have no permission to access that page.') );
        }
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
        ));
        
        $role = $request->input('role');

        $employerRole = Role::where('name', $role)->first();
        $user->assignRole($employerRole);

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        return route('user.index', ['q' => $q]);
    }


    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        if ($user->id == 1) {
            return abort(403);
        }

        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }

    public function mass_remove(Request $request)
    {
        $data_ids = $request->input('dataid');
        $data = User::whereIn('id', $data_ids);
        if($data->delete()){
            return 1;
        }
    }
}

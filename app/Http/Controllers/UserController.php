<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:web'])->only(['create', 'store', 'edit', 'update', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $rules = [
            'name'      => 'required|string|max:255',
            'email'     => 'required|unique:App\User,email|string|max:255',
            'address_1' => 'required|string|max:255',
            'address_2' => 'string|max:255'
        ];

        $this->validate($request, $rules);


        User::create(array_merge($request->all(), ['password' => bcrypt('secret')]));

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        if ($this->is_logged_in_user($user) || Auth::user()->is_admin == 1)
            return view('user.show', ['user' => $user]);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if ($this->is_logged_in_user($user) || Auth::user()->is_admin == 1)
            return view('user.edit', ['user' => $user]);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        // validate
        if ($request->password) {
            $rules = [
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|max:255',
                'address_1' => 'required|string|max:255',
                'address_2' => 'string|max:255',
                'password' =>  'min:6|confirmed'
            ];
        } else {
            $rules = [
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|max:255',
                'address_1' => 'required|string|max:255',
                'address_2' => 'string|max:255',
            ];
        }

        $this->validate($request, $rules);

        $user->update($request->except('password'));

        $request->password ?
            $user->update(['password' => bcrypt($request['password'])])
        :
            '';

        $user->save();
        $request->session()->flash('status', "User information updated!");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        $request->session()->flash('status', "{$user->name} was deleted");
        return redirect()->route('users.index');
    }
}

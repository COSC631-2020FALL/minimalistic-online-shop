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

        if ($this->is_logged_in_user($user))
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
        if ($this->is_logged_in_user($user)){
            return view('user.edit', ['user' => $user]);
        }
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

        return redirect()->back();
    }
	
    public function search(Request $r){
        $category ;
        $name ;
        if($r->query("c")){
            $category = $r->query("c");
        }
        if($r->query("n")){
            $name = $r->query("n");
        }
        $res = Product::all();
        $cat = Category::all();

        if(isset($category) && isset($name)){
            $name = strtolower($name);
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%' and category_id = $category" ) );
        }
        else if(isset($name)){
            $name = strtolower($name);
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%'" ) );
        }
        else if(isset($category)){
            $sRes = DB::table('products')
            ->where("category_id" , $category)
            ->get();
        }
        else{
            $sRes = DB::table('products')
            ->get();
        }

        if(!isset($category)) {
            $category = -1;
        }

    	return view('store.search')
            ->with('products', $sRes)
            ->with("cat", $cat)
            ->with("a", $category);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}

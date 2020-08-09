<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $this->validate($request,[
         'name'=>'required|string|max:191|unique:users',
         'email'=>'required|string|email|max:191|unique:users',
         'password'=>'required|string|min:8'
       ]);

       return User::create([
         'name' => $request['name'],
         'email' => $request['email'],
         'type' => $request['type'],
         'bio' => $request['bio'],
         'photo' => $request['photo'],
         'password' => Hash::make($request['password']),
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //get the user
      $user = User::findOrFail($id);
      //validate form
      $this->validate($request,[
        'name'=>'required|string|max:191',
        'email'=>'required|string|email|max:191|unique:users,email,'.$user->id,
        'password'=>'sometimes|string|min:8'
      ]);
      //hash the given pass then update it
      $request['password'] = Hash::make($request['password']);
      //update the user
      $user -> update($request->all());
      //retrurn with success message
      return ['message' => 'Updated Successfuly!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $this->authorize('isAdmin');
      $user = User::findOrFail($id);

      //delete user
      $user->delete();

      //msg back or something
      return ['message' => 'User Deleted'];
    }
}

<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as userauthenticate;
use Illuminate\Support\Facades\Auth;
class user extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUserId = Auth::id();

        $users = userauthenticate::where('id', '!=', $currentUserId)->where('role', '!=', 'Student')->where('role', '!=', 'Recruiter') ->orderBy('first_name') ->get(); 
       return view('user.index',compact('users'));
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
        $request->validate([
            'fname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required',
            'password' => 'required|string|min:8',
        ]);
    
        try {
            $user = new userauthenticate();
            $user->first_name = $request->fname;
    
            if ($request->has('lname')) {
                $user->last_name = $request->lname;
            }
    
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = $request->role;
    
            
    
            $user->save();
    
            return redirect()->route('user.index')->with('success', 'User Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = userauthenticate::find($id);
        return view('user.edit',compact('user'));
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
        $request->validate([
            'fname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,'.$id,
            'role' => 'required',
            'password' => 'nullable|string|min:8',
        ]);
    
        try {
           
            $user = userauthenticate::findOrFail($id);
            $user->first_name = $request->fname;
    
            if ($request->has('lname')) {
                $user->last_name = $request->lname;
            }
    
            $user->email = $request->email;
            if($request->filled('password')){
            $user->password = bcrypt($request->password);
            }
            $user->role = $request->role;
    
            
    
            $user->save();
    
            return redirect()->route('user.index')->with('success', 'User Updated Successfully');
        } catch (\Exception $e) {
            // Log the exception message
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = userauthenticate::findOrFail($id);

        if (!$user) {
        return response()->json(['error' => 'User not found.'], 404);
        }

        $user->forceDelete();

        return response()->json(['success' => 'The user has been deleted!']);
    }

}

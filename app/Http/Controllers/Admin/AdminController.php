<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCount = User::count();
        $productCount = Product::count();
        $categoryCount = Category::count();
        
        return view('admin.dashboard', compact('userCount', 'productCount', 'categoryCount'));
    }
    
    /**
     * Display a list of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    
    /**
     * Show the form for editing the user's role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUserRole($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit-role', compact('user'));
    }
    
    /**
     * Update the user's role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUserRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
        ]);
        
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();
        
        return redirect()->route('admin.users')->with('success', 'Роль пользователя успешно обновлена');
    }
}

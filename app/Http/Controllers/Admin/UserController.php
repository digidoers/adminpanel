<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $routeName = "admin.users.";
    private $viewName = "admin.users.";
    
    
    public function getBreadCrumbs($param)
    {
        $breadCrumbs = [
            ['name' => 'Users', 'url' =>  route('admin.users.index'), 'is_active'=> 0 ]
        ];
        if($param == 'index')
            $breadCrumbs[0]['is_active']  = 1;
        elseif($param == 'create')
            $breadCrumbs[] = ['name' => 'Create', 'url' =>  '', 'is_active'=> 1 ];
        elseif($param == 'edit')
            $breadCrumbs[] = ['name' => 'Edit', 'url' =>  '', 'is_active'=> 1 ];

        return $breadCrumbs;
    }
    
    public function getPageName($param)
    {
        if($param == 'index')   
            $pageName = "User List";
        elseif($param == 'create')
            $pageName = "Create New User";
        elseif($param == 'edit')
            $pageName = "Edit This User";

        return $pageName;
    }
    
    public function index()
    {
        $routeName = $this->routeName;
        $users = User::get()->where('is_admin','0');
        $i = 1;
        $breadCrumbs = $this->getBreadCrumbs('index');
        $pageName = $this->getPageName('index');
        return view($this->viewName.'index', compact('users', 'i','routeName','breadCrumbs','pageName'));
    }

    public function create()
    {
        $breadCrumbs = $this->getBreadCrumbs('create');
        $routeName = $this->routeName;
        $pageName = $this->getPageName('create');
        return view($this->viewName.'create', compact('routeName','breadCrumbs','pageName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|max:20',
            'password_confirmation' =>'required_with:password|same:password|min:6|max:20',
            'dob' => 'required',
        ]);

        $data = $request->all();
        User::create($data);
        $request->session()->flash('alert-success', trans('admin_message.create',['name'=>'User']));
        return redirect()->route($this->routeName.'index')->with('message', 'IT WORKS!');;
                        
    }

    Public function edit(User $user)
    {
        $breadCrumbs = $this->getBreadCrumbs('edit');
        $routeName = $this->routeName;
        $pageName = $this->getPageName('edit');
        return view($this->viewName.'edit', compact('user', 'routeName','breadCrumbs','pageName'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'dob' => 'required',
        ]);
        $data = $request->all();
        $user->update($data);
        $request->session()->flash('alert-success', trans('admin_message.update',['name'=>'User']));
        return redirect()->route($this->routeName.'index');
    }

    public function show(User $user)
    {
        return "show";
    }

    public function destroy(User $user, Request $request)
    {
            $user->forceDelete();
            $request->session()->flash('alert-success', trans('admin_message.delete',['name'=>'User']));
        return redirect()->route($this->routeName.'index');
    }

    public function status(User $user, Request $request)
    {
        $var = $user->status;
        ($var==1)?$user->status=0:$user->status=1;
        $user->save();
        $request->session()->flash('alert-success', trans('admin_message.status_change',['name'=>'User']));
        return redirect()->route($this->routeName.'index');
    }

    public function dashboard()
    {
        return view('admin.users.dashboard');
    }

}

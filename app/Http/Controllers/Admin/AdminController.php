<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $routeName = "admin.update-profile.";
    private $viewName = "admin.update-profile.";
    
    
    public function updateProfile()

    {
        $user = Auth::user();
        $routeName = $this->routeName;
        $i = 1;
        return view('admin.adminchanges.updateprofile', compact('user', 'routeName', 'i'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'dob' => 'required',
        ]);

        $data = $request->all();
        $user->update($data);
				$request->session()->flash('alert-success', trans('admin_message.update',['name'=>'User']));
        return redirect()->route($this->routeName.'edit');
    }

	public function changePassword()
	{
			return view('admin.adminchanges.changepassword');
	}

	public function updatePassword(Request $request)
	{
			
	if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
		// The passwords matches
	return redirect()->back()->with("alert-danger","New Password cannot be same as your current password. Please choose a different password.");

	}
		
	if(strcmp($request->get('current-password'), $request->get('password')) == 0){
		//Current password and new password are same
	return redirect()->back()->with("alert-danger","New Password cannot be same as your current password. Please choose a different password.");
	}

		$request->validate([
				'current-password' => 'required',
				'password' => 'required|string|min:6|max:20',
				'password_confirmation' => 'required|same:password|min:6|max:20',
		]);
	//Change Password
	$user = Auth::user();
	$user->password = bcrypt($request->get('password'));
	$user->save();
	$request->session()->flash('alert-success', trans('admin_message.update',['name'=>'User Password']));
	return redirect()->route('admin.change-password.edit');

	}
}

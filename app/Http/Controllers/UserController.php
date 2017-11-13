<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Http\Request;
class UserController extends Controller {
	public function list() {
		$user = User::all();
		return view('admin/user/list', ['user' => $user]);
	}
	public function add() {
		return view('admin/user/add');
	}
	public function search(request $request) {
		$a = '%' . $request->search . '%';

		$user = user_error()::where('user', 'like', $a)->get();
		return view('admin/user/list', ['user' => $user]);

	}
	public function postadd(Request $request) {

		$this->validate($request,
			[
				'txtName' => 'required',
				'txtUser' => 'required|unique:users,user',
				'txtEmail' => 'required|',
				'txtPass' => 'required|',
				'txtRePass' => 'required|same:txtPass',
			],
			[
				'txtName.required' => 'ban can nhap ten day du',
				'txtUser.unique' => 'username phai la duy nhat',
				'txtUserName.required' => 'ban can nhap ten dang nhap',
				'txtEmail.required' => 'can nhap email',
				'txtPass.required' => 'phai nhap mat khau',
				'txtRePass.same' => 'pass nhap lai chua dung',

			]
		);
		$user = new User;
		$user->name = $request->txtName;
		$user->user = $request->txtUser;
		$user->email = $request->txtEmail;
		$user->password = hash::make($request->txtPass);
		$user->save();
		return redirect()->back()->with('success', 'them thanh cong');
	}
	public function delete($id) {
		User::destroy($id);
		return redirect()->back()->with('success', 'xoa thanh cong');
	}
	public function edit($id) {
		$user = User::find($id);
		return view('admin/user/edit', ['user' => $user]);
	}
	public function postedit(Request $request, $id) {
		$user = User::find($id);
		if ($user->user != $request->txtUser) {
			$this->validate($request,
				[
					'txtName' => 'required',
					'txtUser' => 'required|unique:users,user',
					'txtEmail' => 'required|',

				],
				[
					'txtName.required' => 'ban can nhap ten day du',
					'txtUser.unique' => 'username phai la duy nhat',
					'txtUserName.required' => 'ban can nhap ten dang nhap',
					'txtEmail.required' => 'can nhap email',
				]
			);
		} else {
			$this->validate($request,
				[
					'txtName' => 'required',
					'txtUser' => 'required',
					'txtEmail' => 'required|',

				],
				[
					'txtName.required' => 'ban can nhap ten day du',

					'txtUserName.required' => 'ban can nhap ten dang nhap',
					'txtEmail.required' => 'can nhap email',
				]
			);
		}
		if ($request->txtPass == '') {

			$user->name = $request->txtName;
			$user->user = $request->txtUser;
			$user->email = $request->txtEmail;

			$user->save();
			return redirect()->back()->with('success', 'sua thanh cong');
		} else {
			$this->validate($request,
				[
					'txtRePass' => 'required | same:txtPass',

				],
				[
					'txtReName.required' => 'ban can nhap lai mat khau',

					'txtReName.same' => 'mat khau nhap lai chua chinh xac',
				]
			);
			$user->name = $request->txtName;
			$user->user = $request->txtUser;
			$user->email = $request->txtEmail;
			$user->password = hash::make($request->txtPass);
			$user->save();
			return redirect()->back()->with('success', 'sua thanh cong');
		}

	}

}
// user 	email 	pass 	name
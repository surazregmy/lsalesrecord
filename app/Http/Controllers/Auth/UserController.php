<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');  
    }
        
    public function listUser(Request $request){
        $users = User:: all();
        $data = array(
            'heading' => 'Users',
            'subheading' => 'List User',
            'users'=>$users,
            'brname'=>'addPbills'   
        );
        return view('Auth.listUser')->with($data);
    }

    public function createUser(Request $request){

        $log_user = Auth::user();
        if($log_user->role != 'admin'){
            return redirect('/listUser')->with('error','You are not admin');
        }

        $data = array(
            'heading' => 'Users',
            'subheading' => 'Create User' ,
            'brname'=>'addPbills'   
        );
        return view('Auth.createUser')->with($data);
    }

    public function saveUser(Request $request){
        $log_user = Auth::user();
        if($log_user->role != 'admin'){
            return redirect('/listUser')->with('error','You are not admin');
        }

        $this->validate($request,[
            'username'=>'required|unique:debtors,debtor_name',
            'email_address'=>'required|unique:users,email',
            'role'=>'required',
            'password'=> 'required|confirmed|min:6',
        ]);

        $user = new User;
        $user->name = $request->input('username');
        $user->email = $request->input('email_address');
        $user->role = $request->input('role');
        $user->password = Hash::make( $request->input('password'));
        $user->save();
        return redirect('/listUser')->with('success','User created Succesfully');  
       
    }

    public function editUser($id){
        $log_user = Auth::user();
        if($log_user->role != 'admin'){
            return redirect('/listUser')->with('error','You are not admin');
        }

        $user = User::find($id);
        $data = array(
            'heading' => 'Users',
            'subheading' => 'Edit User',
            'user' =>$user   ,
            'brname'=>'addPbills' 
        );
        return view('Auth.editUser')->with($data);
    }

    public function updateUser(Request $request){

        $user = User:: find($request->input('user_id'));
        $this->validate($request,[
            'username'=>'required',
            'email_address'=>'required',
            'role'=>'required',
            'password'=> 'required|confirmed|min:6',
        ]);

        $messages = [
            'username.unique' => 'Username repeated',
            'email_address.unique' => 'Email repeated',
        ];
        $username = $user->name;
        $email_address = $user->email;
        $validator =  Validator::make($request->all(), [
                'd_username' =>  // Look at the query/ Don;t know it requires the field from request
                    Rule::unique('users','name')->ignore($username,'name'),
                'email_address' =>  // Look at the query/ Don;t know it requires the field from request
                Rule::unique('users','email')->ignore($email_address,'email'),
            ],  
            $messages
            );
        if ($validator->fails()) {
            return redirect('editUser/'.$user->id)
                        ->withErrors($validator)
                        ->withInput();
        };

        $user->name = $request->input('username');
        $user->email = $request->input('email_address');
        $user->role = $request->input('role');
        $user->password = Hash::make( $request->input('password'));
        $user->save();
        return redirect('/listUser')->with('success','User updated Succesfully');
        
    }

    public function deleteUser($id){
        $log_user = Auth::user();
        if($log_user->role != 'admin'){
            return redirect('/listUser')->with('error','You are not admin');
        }
        
       $log_user = Auth:: user();
       if($log_user->id == $id){
        return redirect('listUser/')->with('error','You can not delete yourself');
       }
       $user = User:: find($id);
       $user->delete();
       return redirect('/listUser')->with('success','User deleted Succesfully');

    }

}

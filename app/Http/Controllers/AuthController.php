<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPassordReqest;
use App\Http\Requests\UpdatePasswordRequest;

class AuthController extends Controller
{
    public function index()
    {
       return view('auth.login');
    }

    public function login(UserLoginRequest $request)
    {
       $remember_me = $request->has('remember_me'); 

      $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember_me)) {
            return redirect()->intended('dashboard')->with('success', 'You are logged in successfully.');
        }

      return back()->with('message', 'Login credentials are not valid!');
    }

     public function dashboard()
    {
        if(Auth::check()){

          $user = User::all();
          $contacts = Contact::with('user')->where(['user_id' => Auth::id(), 'favourite' => '0'])->get();
            return view('auth.dashboard',compact('user', 'contacts'));
        }
  
        return redirect()->to('/');
    }

    public function registrationForm()
    {
       return view('auth.registration');
    }

    public function registration(CreateUserRequest $request)
    {
      User::create([

         'name' => $request->name,
         'email' => $request->email,
         'password' => bcrypt($request->password),
         'created_at' => now()
      ]);

      return redirect()->to('/');
    }

    public function logout()
    {
      
      Auth::logout();

      return redirect()->to('/');

    }

    public function userProfile()
    {

        $user_id = Auth::id();
        $user = User::findOrFail($user_id);

      return view('profile.index', compact('user'));
    }

    public function userProfileUpdate(Request $request)
    {
       
        $user = User::findOrFail(Auth::id());

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->address = $request->address;
         
        if ($request->file('image')) {
            
            $file = $request->file('image');
            @unlink(public_path('upload/user/'.$user->image));
            $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user'),$fileName);
            $user['image'] = $fileName;
        }

        $user->save();

        return redirect()->to('/dashboard');

        }

        public function userChangePassword()
        {
          return view('profile.change-password');
        }

        public function userUpdatePassword(UpdatePasswordRequest $request)
        {
              
          $hash_password = User::findOrFail(Auth::id())->password;

          if (Hash::check($request->current_password,$hash_password)) {
            
            $user = User::findOrFail(Auth::id());
            $user->password = bcrypt($request->password);
            $user->save();

            Auth::logout();

            return redirect()->to('/')->with('message', 'Your password has been updated!');

          } else {

            return back()->with('message', 'Change password credential does not match!');

          }  
       
    }

    public function forgotPasswordForm()
    {
          return view('auth.forgot-password');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => now()
            ]);
  
          Mail::send('mail.mail', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password Notification');
          });
  
          return back()->with('message', 'We have emailed your password reset link!');;
      }

       public function resetPasswordForm($token) { 
         return view('auth.update-password-form', ['token' => $token]);
      }

       public function resetPassword(ResetPassordReqest $request)
      {
          
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          User::where('email', $request->email)
              ->update(['password' => bcrypt($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          return redirect()->to('/')->with('message', 'Your password has been changed!');
      }
    
}

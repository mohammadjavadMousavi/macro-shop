<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;


class RegisterController extends Controller
{
    public function create()
    {
        return view('client.register.create');
    }

    public function sendMail(Request $request)
    {

        $user = User::generateOtp($request);

        return redirect(route('client.register.otp',$user));


    }

    public function otp(User $user) 
    {
        return view('client.register.otp',[
            'user' => $user
        ]);
    }


    public function verifyOtp(Request $request,User $user)
    {
        if (!Hash::check($request->get('verifyCode'), $user->verifyCode)) {
            return back()->withErrors(['otp' => 'کد وارد شده اشتباه است']);
        }

        $user->update([
            'statusVerify' => '1'
        ]);
        auth()->login($user);

        return redirect(route('client.index'));
    }



    public function logout()
    {
        auth()->logout();

        return redirect()->back();
    }

    public function indexLogin()
    {
        return view('client.register.indexLogin');
    }

    public function login(Request $request)
    {


        $userExists = User::query()->where('email',$request->get('email'));

        if (!$userExists->exists()) {
            return back()->withErrors(['eror' => 'هیچ حساب کاربری با این مشخصات وجود ندارد']);
        }

        $user = $userExists->first();

        if ($user->statusVerify != '1') {
            return back()->withErrors(['login' => 'حساب کاربری تکمیل نشده  ,  لطفا دوباره ثبت نام کنید']);
        }

        if (!Hash::check($request->get('password'), $user->password)) {
            return back()->withErrors(['loginPass' => 'رمز اشتباه است']);

        }

        auth()->login($user);

        return redirect(route('client.index'));

    }

    public function forgot()
    {
        return  view('client.register.forgot');
    }

    public function forgotPass(Request $request)
    {
        $userEmail = User::query()->where('email',$request->get('email'));

        $otp = random_int(11111, 99999);



        if (!$userEmail->exists()) {
            return back()->withErrors(['forgotPass' => 'شما ثبت نام نکرده اید']);
        }

        $user = $userEmail->firstOrFail();

        if ($user->statusVerify == 0) {
            return back()->withErrors(['forgotPass' => 'شما ثبت نام نکرده اید']);

        }

        $user->update([
            'verifyCode' => bcrypt($otp)
        ]);

        Mail::to($user->email)->send(new OtpMail($otp));

        return redirect(route('client.login.forgotPassCodeGet',$user));

    }

    public function forgotPassCodeGet(User $user)
    {
        return view('client.register.forgotOtp',[
            'user' => $user
        ]);
    }

    public function forgotPassCode(Request $request,User $user)
    {
         // $userEmail = User::query()->where('email','mhmdjvadzx83@gmail.com')->first();

        // if (Hash::check($request->get('verifyCode'),$userEmail->verifyCode)) {
        //     dd('yes');
        // }

        // dd('no');


        if (!Hash::check($request->get('verifyCode'), $user->verifyCode)) {
            return back()->withErrors(['otp' => 'کد وارد شده اشتباه است']);
        }

 
        return redirect(route('client.login.setPassGet',$user));

    }

    public function setPassGet(User $user)
    {
        return view('client.register.setPass',[
            'user' => $user
        ]);
    }

    public function setPass(Request $request ,User $user)
    {
        $user->update([
            'password' => bcrypt($request->get('password'))
        ]);

        auth()->login($user);

        return redirect(route('client.index'));

    }
}

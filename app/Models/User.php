<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;




class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded= [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function generateOtp(Request $request)
    {
        
        $otp=random_int(11111, 99999);


        $userOtp=User::query()->where('email',$request->get('email'));

        if ($userOtp->exists()) {

            return redirect()->back()->withErrors(['signUp','شما قبلا ثبت نام کرده اید']);

        }else{

            $user=User::query()->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'statusVerify' => '0',
                'role_id' => Role::findByTitle('user')->id,
                'verifyCode' => bcrypt($otp)
            ]);

        }
        
        Mail::to($user->email)->send(new OtpMail($otp));

        return $user;

    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }

}

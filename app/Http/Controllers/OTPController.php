<?php

namespace App\Http\Controllers;

use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Notifications\SendOtp;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Notification;


class OTPController extends Controller
{
   
    public function index()
    {
        return view('verify');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'token' => 'required|numeric|min:6'
        ]);

        $validationOTP = (new Otp)->validate(Auth::user()->email, $request->token);

        if($validationOTP->status === true) {

            Alert::success('Success', 'OTP berhasil! Akses Anda telah terverifikasi');
            return redirect()->route('home');
        }

        Alert::error('Error', 'Gagal memverifikasi OTP. Silakan coba lagi atau minta kode baru');
        return redirect()->route('verify');
    }   

    public function resendOTP(Request $request)
    {
        $user = Auth::user();
    
        (new Otp)->generate($user->email, 'numeric', 6, 60);

        $otp = \Ichtrojan\Otp\Models\Otp::where('identifier', $user->email)->latest()->first();

        Notification::send($user, new SendOtp($otp));
        Alert::success('Success', 'Token berhasil dikirim ulang!');
        return redirect()->route('verify');
    }


}

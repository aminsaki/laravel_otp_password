<?php

namespace UserAuth\laravelMobileAuth\Http\Controllers;

use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use UserAuth\laravelMobileAuth\Http\Models\Otp;
use UserAuth\laravelMobileAuth\Http\Requests\OptRequest;
use UserAuth\laravelMobileAuth\Http\Requests\PasswordLoginRequst;
use UserAuth\laravelMobileAuth\Http\Requests\UserRequst;

class AuthController extends BaseController
{
    public function login()
    {
        return view('laravel-mobile-auth::login');
    }

    public function authLogout()
    {
        Auth::logout();
        return \redirect()->route('laravelMobileAuthLogin')->with([
            'is_logged_out' => true
        ]);
    }

    public function password()
    {
        return view('laravel-mobile-auth::password');
    }

    public function otpLogin()
    {
        if (!Session::get('phone'))
            return \redirect()->route('laravelMobileAuthLogin');
        Session::reflash();
        return view('laravel-mobile-auth::otp');
    }

    public function CheckOtpLogin(OptRequest $request)
    {
        $phone = $request->phone;
        $code = $request->otp;
        $otp = Otp::phone($phone);
        $codeCreate = rand('1111', '9999');
        $user = User::where(['phone' => $phone])->first();
        $expired_at = $otp->created_at + 120;
        // check code  to code in database
        if ($otp->code == $code) {
            if (time() < $otp->created_at) {
                return Redirect::route('laravelMobileAuthOtpLogin')
                    ->with(['phone' => $phone, 'msg' => 'هنوز  کد  انتقاض پیدانکرد ن است']);
            }
        }
        // check phone  in database
        if ($otp->phone == $phone) {
            Otp::where(['phone' => $phone])->delete();
            Otp::where(['phone' => $phone])->create(['phone' => $phone, 'code' => $codeCreate]);
            Auth::login($user);
            return Redirect::route('laravelMobileAuthDashboard')->with(['welecom_messages' => 'true']);
        }

        Otp::create(['phone' => $phone, 'code' => $codeCreate]);
        Auth::loginUsingId($user->id);
        return Redirect::route('laravelMobileAuthDashboard')->with(['welecom_messages' => 'true']);
    }

    public function dashboardAdmin()
    {
        return view('laravel-mobile-auth::Admin/Dashboard/index');
    }

    public function PasswordLogin(PasswordLoginRequst $request)
    {
        $user = User::where(['phone' => $request->phone])->first();

        if ($user->attempts_left <= 0 || $user->most_login_with_otp) {
            return Redirect::route('laravelMobileAuthPassword')
                ->withErrors([
                    'phone' => $request->phone,
                    'is_redirected_form_password_login' => true
                ]);
        }
        if (Hash::check($request->password, $user->password)) {
            Auth::loginUsingId($user->id);
            return Redirect::route('laravelMobileAuthDashboard')->with(['welecom_messages' => 'true']);
        }
        $user->decrement('attempts_left', 1); ///
        return Redirect::route('laravelMobileAuthPassword')
            ->withInput(['phone' => $request->phone])
            ->withErrors(['password' => 'رمز وارد شده اشتباه می باشد']);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function checkAuth(UserRequst $request)
    {
        $phone = Request('phone');
        $user = User::where(['phone' => $phone])->first();
        /// check user
        return $this->checkStatus($user, $phone);
    }

    /**
     * @param $user
     * @param $phone
     * @return \Illuminate\Http\RedirectResponse|void
     */
    private function checkStatus($user, $phone)
    {
        if (!$user) {
            return Redirect::route('laravelMobileAuthLogin')->withErrors(['phone' => 'شماره موبابل وارد یافت نشده']);
        }
        if (!$user->password || $user->most_login_with_otp || $user->attempts_left <= 0) {
            return Redirect::route('laravelMobileAuthOtpLogin')->with(['phone' => $phone]);
        }
        if ($user->attempts_left > 0) {
            return Redirect::route('laravelMobileAuthPassword')->with(['phone' => $phone]);
        }
    }
}

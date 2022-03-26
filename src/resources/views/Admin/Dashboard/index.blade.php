@extends('laravel-mobile-auth::layouts.master')
@section('title','password')
@section('content')
    <x-laravel-mobile-auth::logo xmlns:x-laravel-mobile-auth=""/>
    <section class="mt-4 bg-stone-100  rounded-lg shadow-2xl p-8 w-2/6">
        <!--- crar ---header--->
        <div>
            <h1 class="text-blue-500 font-bold text-center  p-2">
                به حساب کاربریتان خوش امدید
            </h1>
            <p class="text-gray-500 text-sm text-center ">
                کد تایید ارسال شده به شماره زیر را وارد نمایید
            </p>
        </div>
        <!--- cart body -->
        <div class="mt-4">
            @if(\Illuminate\Support\Facades\Session::has('welecom_message'))
                 <div class="mb-2 bg-green-200 text-green-500 rounded px-4 py-2">
                      <p>ورود شما  موفقعیت امیز بود</p>
                 </div>
            @endif
            <div class="flex items-center">
                <h1 class="text-gray-700 font-medium">
                    شماره موبابل :
                </h1>
                <span class="text-rose-500 mr-2">
                     {{auth()->user()->phone}}
                </span>

            </div>
            <div class="flex items-center justify-end">
                <a  href="{{route('laravelMobileAuthLogin')}}" class=" bg-rose-500  text-white px-2 py-2 rounded w-2/1 " >
                   خروج
                </a>
            </div>
        </div>
    </section>
@endsection


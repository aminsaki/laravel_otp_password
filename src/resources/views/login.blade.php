@extends('laravel-mobile-auth::layouts.master')
@section('title','ورود با گذرواژه')
@section('content')
    <x-laravel-mobile-auth::logo xmlns:x-laravel-mobile-auth=""/>
    <section class="mt-4 bg-stone-100  rounded-lg shadow-2xl p-8 w-2/6">
        <!--- crar ---header--->
        <div>
            <h1 class="text-blue-500 font-bold text-center  p-2">ورود به حساب کاربری</h1>
            <p class="text-gray-500 text-sm text-center ">
                برای ورود به حساب کاربری شماره موبابل خود را وارد نمایید. </p>
        </div>
        <!--- cart body -->
        <div class="mt-4">
            @if(\Illuminate\Support\Facades\Session::has('is_logged_out'))
                <div class="mb-2 bg-green-200 text-green-500 rounded px-4 py-2">
                    <p>خروج شما  موفقعیت امیز بود</p>
                </div>
            @endif
            <form action="{{route('laravelMobileAuthCheckAuth')}}" class="flex flex-col " method="post">
                @csrf
                <label for="phone">
                    <span class="text-sm text-gray-700">شماره تماس </span>
                    <span class="text-rose-500">*</span>
                </label>
                <input
                    type="tell"
                    name="phone"
                    class="bg-slate-50  text-left border border-slate-100 rounded px-2 py-2 text-sm"
                    placeholder="091300000"
                    value="{{old('phone')}}"
                    id="phone">
                @error('phone')
                <sapn class="text-sm text-rose-500">
                    {{ $message }}
                </sapn>
                @enderror
                <div class="flex items-end justify-end">
                    <button class="mt-4 bg-blue-500  text-white px-2 py-2 rounded w-3/6 " type="submit">
                        تایید شماره موبابل
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection


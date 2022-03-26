@extends('laravel-mobile-auth::layouts.master')
@section('title','password')
@section('content')
    <x-laravel-mobile-auth::logo xmlns:x-laravel-mobile-auth=""/>
    <section class="mt-4 bg-stone-100  rounded-lg shadow-2xl p-8 w-2/6">
        <!--- crar ---header--->
        <div>
            <h1 class="text-blue-500 font-bold text-center  p-2">
                ورود با گذار واژه
            </h1>
            <p class="text-gray-500 text-sm text-center ">
                کد تایید ارسال شده به شماره زیر را وارد نمایید
            </p>
        </div>
        <div>
            @error('errors')
            <sapn class="text-sm text-rose-500">
                {{ $message }}
            </sapn>
            @enderror
        </div>
        <!--- cart body -->
        <div class="mt-4">
            <form action="{{route('laravelMobileAuthPasswordLogin')}}"  class="flex flex-col " method="post">
                @csrf
                <label for="phone" class="flex items-center justify-between">
                  <div>
                            <span class="text-sm text-gray-700">
                        شماره تماس </span>
                      <span class="text-rose-500">*</span>
                  </div>

                    <a href="{{route('laravelMobileAuthLogin')}}" class=" flex items-center group">
                        <span class="text-rose-500 text-sm  group-hover:text-rose-600">
                             ویرایش شماره
                        </span>

                        <svg class="svg-icon stroke-rose-500 group-hover:stroke-amber-600 "
                             style="width: 2em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                             viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M810.666667 256a42.666667 42.666667 0 0 0-42.666667 42.666667v170.666666a42.666667 42.666667 0 0 1-42.666667 42.666667H316.16l55.466667-55.04a42.666667 42.666667 0 0 0-60.586667-60.586667l-128 128a42.666667 42.666667 0 0 0-8.96 14.08 42.666667 42.666667 0 0 0 0 32.426667 42.666667 42.666667 0 0 0 8.96 14.08l128 128a42.666667 42.666667 0 0 0 60.586667 0 42.666667 42.666667 0 0 0 0-60.586667L316.16 597.333333H725.333333a128 128 0 0 0 128-128V298.666667a42.666667 42.666667 0 0 0-42.666666-42.666667z"/>
                        </svg>
                    </a>

                </label>
                <input
                    type="tell"
                    name="phone"
                    class="bg-slate-50  text-left border border-slate-100 rounded px-2 py-2 text-sm text-gray-700"
                    value="{{Session::get('phone',old('phone')) }}"
                    readonly
                    id="phone">
                @error('phone')
                <sapn class="text-sm text-rose-500">
                    {{ $message }}
                </sapn>
                @enderror

                <label for="password">
                    <span class="text-sm text-gray-700">گذواژه </span>
                    <span class="text-rose-500">*</span>
                </label>
                <input
                    type="password"
                    name="password"
                    class="bg-slate-50  text-left border border-slate-100 rounded px-2 py-2 text-sm text-gray-700"
                    placeholder="××××××××××××"
                    id="password">
                @error('password')
                <sapn class="text-sm text-rose-500">
                    {{ $message }}
                </sapn>
                @enderror
                <div class="flex items-end justify-between mt-4">
                    <a href="{{route('laravelMobileAuthPassword')}}" class="text-blue-500 text-sm hover:text-blue-600">
                        ورود با گذار واژه
                    </a>
                    <button class=" bg-blue-500  text-white px-2 py-2 rounded w-3/9 " type="submit">
                        ورود به حساب من
                    </button>

                </div>
            </form>
        </div>
    </section>
@endsection


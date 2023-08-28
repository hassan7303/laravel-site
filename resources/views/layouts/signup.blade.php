@extends('layouts.auth.auth')
@section('auth')
    signup
@endsection
@section('content')
    <div class="flex justify-center">
        <div class="bg-white p-6 w-4/12 rounded-lg mt-3">
         <form class="" action="{{Route('signup')}}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">نام و نام خانوادگی</label>
                <input type="text" name="name" id="name" placeholder="نام و نام خانوادگی خود را وارد کنید " 
                value="{{old('name')}}" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('name') border-red-400 @enderror ">
                @error('name')
                <div class="text-red-500 mt-1 mr-5 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="username" class="sr-only">نام کاربری</label>
                <input type="text" name="username" id="username" placeholder="نام کاربری خود را وارد کنید" 
                value="{{old('username')}}" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('username') border-red-400 @enderror ">
                @error('username')
                <div class="text-red-500 mt-1 mr-5 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
               
                <label for="gmail" class="sr-only">جیمیل</label>
                <input type="text" name="gmail" id="gmail" placeholder="جیمیل خود را وارد کنید" 
                value="{{old('gmail')}}" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('gmail') border-red-400 @enderror">
                @error('gmail')
                <div class="text-red-500 mt-1 mr-5 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">رمز</label>
                <input type="text" name="password" id="Password" placeholder="رمز خود را وارد کنید" 
                value="" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('password') border-red-400 @enderror">
                @error('password')
                <div class="text-red-500 mt-1 mr-5 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">تکرار رمز</label>
                <input type="text" name="password_confirmation" id="password_confirmation" placeholder="رمز خود را مجدد وارد کنید" 
                value="" class="bg-gray-100 border-2 p-4 w-full rounded-lg  @error('password_confirmation') border-red-400 @enderror">
                @error('password_confirmation')
                <div class="text-red-500 mt-1 mr-5 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 w-full font-medium rounded-lg"> 
                    ثبت نام
                </button>
            </div>
         </form>
        </div>
    </div>
@endsection
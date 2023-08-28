@extends('layouts.auth.auth')
@section('auth')
   login
@endsection
@section('content')
    <div class="flex justify-center">
        <div class="bg-white p-6 w-4/12 rounded-lg mt-3">
            @if(session('status'))
                <div class="text-red-500 mb-2 mr-5 text-sm">
                    {{session('status')}}
                </div>
            @endif
         <form class="" action="{{Route('login')}}" method="post">
            @csrf
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
                <label for="password" class="sr-only">رمز</label>
                <input type="text" name="password" id="Password" placeholder="رمز خود را وارد کنید" 
                value="" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('password') border-red-400 @enderror">
                @error('password')
                <div class="text-red-500 mt-1 mr-5 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 w-full font-medium rounded-lg"> 
                   ورود
                </button>
            </div>
         </form>
        </div>
    </div>
@endsection
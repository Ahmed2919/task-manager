@extends('layouts.app')

@section('title' , 'الملف الشخصي')

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="text-center">
                    <img src="{{asset('/storage/'.auth()->user()->image)}}" alt="" width="82px" height="82px">
                    <h3>
                        {{
                            auth()->user()->name
                        }}
                    </h3>
                </div>
                <div class="card-body text-right">
                    <form action="/public/profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="for-group">
                            <label for="name">الاسم </label>
                            <input type="text" class="form-control" name="name" id="name" value="{{auth()->user()->name}}">
                            @error('name')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                                
                            @enderror
                        </div>

                        <div class="for-group">
                            <label for="email">البريد الالكتروني </label>
                            <input type="email" class="form-control" name="email" id="email" value="{{auth()->user()->email}}">
                            @error('email')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                                
                            @enderror
                        </div>

                        
                        <div class="for-group">
                            <label form="password">كلمة المرور </label>
                            <input type="password" class="form-control" name="password" id="password" >
                            @error('password')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                                
                            @enderror
                        </div>

                        
                        <div class="for-group">
                            <label for="password-confirmation">اعادة كلمة المرور </label>
                            <input type="password" class="form-control" name="password-confirmation" id="password-confirmation" >
                            @error('password-confirmation')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                                
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">تغيير الصورة الشخصية</label>

                            <div class="custom-file">
                                <input type="file" id="image" name="image" class="custom-file-input">
                                <label for="image" id="image-label" class="custom-file-label text-left" data-browse="استعرض"></label>
                            </div>
                            @error('image')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                                
                            @enderror
                        </div>

                        <div class="form-group d-flex mt-5 flex-row-reverse">
                            <button type="submit" class="btn btn-primary mr-2">حفظ التعديلات</button>
                            <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج</button>
                        </div>
                        <form action="/public/logout" id="logout" method="POST">
                            @csrf
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
    

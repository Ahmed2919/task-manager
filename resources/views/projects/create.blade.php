@extends('layouts.app')

@section('title' , 'انشاء مشروع جديد')

@section('content')
<div class="row justify-content-center text-right">
    <dov class="col-10">
        <div class="text-center pb-5 font-weight-bold">
            مشروع جديد     
        </div> 

        <form action="/public/projects" method="POST" dir="rtl">
           @include('projects.form')
            <div class="form-group">
                <button type="submit" class="btn btn-primary" >اضافة المشروع</button>
                <a href="/public/projects" class="btn btn-light">الغاء</a>
            </div>

        </form>
    </dov>
</div>
    
@endsection
    

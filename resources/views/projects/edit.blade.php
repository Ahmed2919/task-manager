@extends('layouts.app')

@section('title' , 'تعديل المشروع')

@section('content')
<div class="row justify-content-center text-right">
    <dov class="col-10">
        <div class="text-center pb-5 font-weight-bold">
            تعديل المشروع     
        </div> 

        <form action="/public/projects/{{$project->id}}" method="POST" dir="rtl">
           @include('projects.form')
           @method('PATCH')
            <div class="form-group">
                <button type="submit" class="btn btn-primary" >تعديل</button>
                <a href="/public/projects" class="btn btn-light">الغاء</a>
            </div>

        </form>
    </dov>
</div>
    
@endsection
    

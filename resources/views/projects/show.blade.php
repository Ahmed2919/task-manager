@extends('layouts.app')

@section('content')
<header class="d-flex justify-content-between alighn-items-center my-5" dir="rtl">
    <div class="h6 text-dark">
        <a href="/public/projects">المشاريع / {{ $project->title }}</a>
    </div>

    <div>
        <a href="/public/projects/{{ $project->id }}/edit" class="btn btn-primary px-4" role="button"> تعديل المشروع </a>
    </div>
</header>

<section class="row text-right" dir="rtl">
    <div class="col-lg-4">
        <div class="card text-right">
            <div class="card-body">
                <div class="status">
                    @switch($project->status)
                        @case(1)
                            <span class="text-success">مكتمل</span>
                            @break
                        @case(2)
                            <span class="text-danger">ملغي</span>
                            @break
                        @default
                            <span class="text-warning">قيد الانجاز</span>
                    @endswitch
                    <h5 class="font-weight-bold card-title">
                        <a href="/public/projects/{{ $project->id }}">{{ $project->title }}</a>
                    </h5>

                    <div class="card-text mt-4">
                        {{  $project->description }}
                    </div>   

                    @include('projects.footer')
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <form action="/public/projects/{{ $project->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="custom-select" onchange="this.form.submit()">
                        <option value="0" {{ ($project->status == 0) ? 'selected' : '' }}>قيد الانجاز</option>
                        <option value="1" {{ ($project->status == 1) ? 'selected' : '' }}>مكتمل</option>
                        <option value="2" {{ ($project->status == 2) ? 'selected' : '' }}>ملغي</option>
                    </select>
                </form>
               
            </div>
        </div>
    </div>   
    <div class="col-lg-8">
        @foreach ($project->tasks as $task)
        <div class="card d-flex flex-row">
            <div class="{{ $task->done ? 'checked muted' : '' }} " >
                {{ $task->body }}
            </div>

            <div class="mr-auto">
                <form action="/public/projects/{{ $project->id }}/task/{{$task->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" name="done" class="form-check-input ml-4" {{ $task->done ? 'checked' : '' }} onchange="this.form.submit()" / >
                </form>
            </div>

            <div class="d-flex align-items-center ">
                <form action="/public/projects/{{$task->project_id}}/task/{{$task->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn-delete" value="">
                </form>
            </div>
        </div>
       
        @endforeach
        <div class="card">
            <form action="/public/projects/{{ $project->id}}/task" method="POST" class="d-flex">
                @csrf
                <input type="text" name="body" class="form-control p-2 ml-2" placeholder="اضافة مهمة جديدة" >
                <button type="submit" class="btn btn-primary">إضافة</button>
            </form>
        </div>

        
        

    </div>    
</section>
    
@endsection
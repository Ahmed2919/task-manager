@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between alighn-items-center my-5" dir="rtl">
        <div class="h6 text-dark">
            <a href="/public/projects">المشاريع</a>
        </div>

        <div>
            <a href="/public/projects/create" class="btn btn-primary px-4" role="button">مشروع جديد</a>
        </div>
    </header>


    <section>
        <div class="row" >
        @forelse ($projects as $project)
        <div class="col-4 mb-4 " >
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
                            {{ Str::limit( $project->description,150) }}
                        </div>   

                       
                    </div>
                </div>
                @include('projects.footer')
            </div>
        </div>
            
        @empty
            <div class="m-auto align-content-center text-center">
                <p>لا يوجد لديك مشاريع ...</p>
                <a href="/public/projects/create" class="btn btn-primary btn-large d-inline-flex align-items-center" role="button">اضافة شروع جديد</a>
            </div>
        @endforelse
    </div>
    </section>
@endsection
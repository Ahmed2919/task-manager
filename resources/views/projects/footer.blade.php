<div class="card-footer bg-transparent" dir="rtl">
    <div class="d-flex" >

        <div class="d-flex align-items-center">
            <img  src="{{URL::asset("/images/clock.svg")}}"/>
            <div class="mr-2">
                {{ $project->created_at->diffForHumans() }}
            </div>
        </div>

        <div class="d-flex align-items-center mr-4">
            <img src="{{URL::asset('/images/list-check.svg')}}" />
            <div class="mr-2">
                {{count($project->tasks)}}
            </div>
        </div>

        <div class="d-flex align-items-center mr-auto">
            <form action="/public/projects/{{$project->id}}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn-delete" value="">
            </form>
        </div>

    </div>
</div>
    <div class="card card-primary shadow">
        <a href="{{route("goal.show", $goal->id)}}" class="card-header">
        <div>
            <p class="card-title">
                {{ $goal->start_date_human}}
                    <span class="mx-4"><x-svg-icon icon="arrow-right" /></span>
                {{ $goal->target_date_human}}
            </p>
        </div>
        </a>
        <div class="card-body">
            <p class="h5">
                {{ $goal->title }}
            </p>
            <p>
                {{ $goal->what }}
            </p>
        </div>
        <div class="card-footer">
            {{ $goal->user->name}}

            <span class="float-right">
                @include('goal.partials.status-change')
            </span>
        </div>
        <!-- /.card-footer -->
    </div>
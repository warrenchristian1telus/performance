<x-side-layout>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-6 col-6">
                <x-slot name="header">
                    <small><a href="{{ route('goal.index') }}">back</a></small>
                    <form action="">
                        <div class="position-relative w-50">
                            <input type="text" class="form-control float-left" name="search" value={{ $currentSearch ?? '' }}>
                            <button class="btn btn-primary btn-sm position-absolute" style="right:0;margin:3px;height:2rem">Search</button>
                        </div>
                    </form>
                </x-slot>
            </div>
        </div>
    </div>
    <div class="mt-5 pb-5">
        <h2>Goal Library</h2>
        <p>Click below to add goals to your profile that were suggested by:</p>
        <form id="goal_form" method="POST" action="{{ route('goal.library') }}">
            @csrf
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Your organization <i class="fas fa-plus-circle float-right "></i>
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <thead>
                                    <th style="width:50px"> Select Goal</th>
                                    <th style="width:50%"> Goal Title</th>
                                    <th style="width:20%"> Date Added</th>
                                    <th style="width:20%"> Created By</th>
                                </thead>
                                <tbody>
                                    @foreach($organizationGoals as $o)
                                    <tr>
                                        <td style="width:50px"> <input type="radio" name="selected_goal" value="{{ $o->id }}"></td>
                                        <td style="width:50%">
                                            <a href="#" class="show-goal-detail" data-id="{{$o->id}}">{{ $o->title }}</a>
                                        </td>
                                        <td style="width:20%">{{ $o->created_at->format('M d, Y') }} </td>
                                        <td style="width:20%">Supervisor </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Your supervisor <i class="fas fa-plus-circle float-right "></i>

                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <thead>
                                    <th style="width:50px"> Select Goal</th>
                                    <th style="width:50%"> Goal Title</th>
                                    <th style="width:20%"> Date Added</th>
                                    <th style="width:20%"> Created By</th>
                                </thead>
                                <tbody>
                                    @foreach($organizationGoals as $o)
                                    <tr>
                                        <td style="width:50px"> <input type="radio" name="selected_goal" value="{{ $o->id }}"></td>
                                        <td style="width:50%">
                                            <a href="#" class="show-goal-detail" data-id="{{$o->id}}">{{ $o->title }}</a>
                                        </td>
                                        <td style="width:20%">{{ $o->created_at->format('M d, Y') }} </td>
                                        <td style="width:20%">Supervisor </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <x-button type="button" class="float-right" icon="plus-circle" data-toggle="modal" data-target="#addGoalModal">
                Add goal
            </x-button>
        </form>
    </div>
    @include('goal.partials.goal-detail-modal')
    <div class="modal fade" id="addGoalModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="addGoalModalLabel">Select Date</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <x-input label="Start Date" class="error-start" type="date" id="start_date" />
                            <small class="text-danger error-start_date"></small>
                        </div>
                        <div class="col-sm-6">
                            <x-input label="Target Date " class="error-target" type="date" id="target_date" />
                            <small class="text-danger error-target_date"></small>
                        </div>

                        <div class="col-12 text-left pb-5 mt-3">
                            <x-button type="button" class="btn-md btn-submit"> Save Changes</x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="js">

        <script>
            $('.card-header').click(function() {
                $(this).find('i').toggleClass('fas fa-plus-circle fas fa-minus-circle');
            });


            $(document).on('click', '.btn-submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/goal/library'
                    , type: 'POST'
                    , data: $('#goal_form').serialize() + '&start_date=' + $('#start_date').val() + '&target_date=' + $('#target_date').val(),

                    success: function(result) {
                        console.log(result);
                        if (result.success) {
                            window.location.href = '/goal';
                        }
                    }
                    , error: function(error) {
                        var errors = error.responseJSON.errors;

                    }
                });

            });

            $(document).on('click', '.show-goal-detail', function(e) {
                e.preventDefault();
                $.get('/goal/library/'+$(this).data('id'), function (data) {
                    $("#goal-detail-modal").find('.data-placeholder').html(data);
                    $("#goal-detail-modal").modal('show');
                });
            });

        </script>
    </x-slot>


</x-side-layout>

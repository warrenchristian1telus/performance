<x-side-layout>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-6 col-6">
                <x-slot name="header">
                    @include('goal.partials.tabs')
                </x-slot>
            </div>
        </div>
        <form action="" method="get">
            <div class="row">
                <div class="col">
                    <x-dropdown :list="$mandatoryOrSuggested" label="Mandatory/Suggested" name="is_mandatory" :selected="request()->is_mandatory"></x-dropdown>
                </div>
                <div class="col">
                    <x-dropdown :list="$goalTypes" label="Goal Type" name="goal_type" :selected="request()->goal_type"></x-dropdown>
                </div>

                <div class="col">
                    <label>
                        Title
                        <input type="text" name="title" class="form-control" value="{{request()->title}}">
                    </label>
                </div>
                <div class="col">
                    <label>
                        Date Added
                        <input type="text" class="form-control" name="date_added" value="{{request()->date_added ?? 'Any'}}">
                    </label>
                </div>

                <div class="col">
                    <x-dropdown :list="$createdBy" label="Created by"></x-dropdown>
                </div>
                <div class="col">
                    <button class="btn btn-primary mt-4 px-5">Filter</button>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr class="border-bottom">
                                    <th style="width:35%"> Goal Title</th>
                                    <th style="width:20%"> Goal Type</th>
                                    <th style="width:15%"> Date Added</th>
                                    <th style="width:15%"> Created By</th>
                                    <th style="width:15%"> Mandatory/Suggested</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bankGoals as $goal)
                                <tr>
                                    <td>
                                        <a href="#" class="show-goal-detail highlighter" data-id="{{$goal->id}}">{{ $goal->title }}</a>
                                    </td>
                                    <td>{{$goal->goalType->name}}</td>
                                    <td>{{ $goal->created_at->format('M d, Y') }}</td>
                                    <td>{{ $goal->user->name }}</td>
                                    <td>{{ $goal->is_mandatory ? 'Mandatory' : 'Suggested' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
    @push('css')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @endpush
    @push('js')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script>
            $('input[name="date_added"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Any',
                    format: 'MMM DD, YYYY'
                }
            }).on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MMM DD, YYYY') + ' - ' + picker.endDate.format('MMM DD, YYYY'));
            }).on('cancel.daterangepicker', function(ev, picker) {
                $('input[name="date_added"]').val('Any');
            });
        </script>
        <script>
            $(document).on('click', '.show-goal-detail', function(e) {
                e.preventDefault();
                $("#goal_form").find('input[name=selected_goal]').val($(this).data('id'));

                $.get('/goal/library/'+$(this).data('id')+'?add=true', function (data) {
                    $("#goal-detail-modal").find('.data-placeholder').html(data);
                    $("#goal-detail-modal").modal('show');
                });
            });
        </script>
    @endpush
</x-side-layout>

@extends('sysadmin.layout')
@section('tab-content')

<div>
    <div class="h4 p-3">{{__('Open Conversations')}}</div>
    <div class="p-3">
        <div class="row">
            <div class="col">
                <p>The table below displays all open conversations for employees in your organization(s).  Use the filters to search for conversations by orgnanization level, topic, participant or by due date range.  You may also use the text input field to search by name or keyword.  Coversations marked with the "unlocked" icon in the far left column have been unlocked because of a special request.  You can click on the icon to view or edit the lock date of the conversation.</p>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="card card-primary shadow mb-3" style="overflow-x: auto;">
        <div class="d-flex" style="width: 2200px">
            <form action="" method="get">
                <table class="uk-table m-3">
                    <tbody>
                        @include('hradmin.partials.organization_filter')
                        <tr style="text-align: left;" class="p-2 form-group">
                            <td style="text-align: left; width: 300px;" class="p-2 form-group">
                                <label for='topic'>Topic</label>
                                <select class="form-control" name="topic" id="topic">
                                    <option value="all">All</option>
                                </select>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label for='participants'>
                                    Participants
                                    <input type="text" class="form-control" name="participants" value="{{request()->participants ?? 'Any'}}">
                                </label>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label for='dateFrom'>
                                    Due Date (From)
                                    <input type="text" name="dateFrom" class="form-control" value="{{request()->dateFrom}}">
                                </label>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label for='dateTo'>
                                    Due Date (To)
                                    <input type="text" name="dateTo" class="form-control" value="{{request()->dateTo}}">
                                </label>
                            </td>
                        </tr>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label for='searchText'>
                                    Search
                                    <input type="text" name="searchText" class="form-control" value="{{request()->searchText}}">
                                </label>
                            </td>
                            <td style="text-align: left; width: 200px; " class"p-2 form-group">
                                <button class="btn btn-primary mt-4 px-5" name="searchBtn" id="searchBtn">Search</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="collapseOne" class="collapse {{$openConversations ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionLibrary">
            <div class="table table-wrapper" style="width: 2200px">
                <div class="md-card-content" style="overflow-x: auto;">
                    <table class="uk-table m-3">
                        <thead>
                            <tr>
                                <th style="text-align: left; width: 50px; "></th>
                                <th style="text-align: left; width: 300px; "> Topic</th>
                                <th style="text-align: left; width: 200px; "> Participants</th>
                                <th style="text-align: left; width: 300px; "> Completion Date</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 1</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 2</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 3</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 4</th>
                                <th style="text-align: left; width: 200px; "> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($openConversations as $o)
                            <tr>
                                <td style="text-align: left; width: 50px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$o->id}}'></a>
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->conversation_topic_id }}</a>
                                </td>
                                <td style="text-align: left; width: 200px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$o->id}}'></a>
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->date }}</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->level1_program }}</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->level2_division }}</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->level3_branch }}</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->level4 }}</a>
                                </td>
                                <td style="text-align: left; width: 200px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$o->id}}'>{{ $o->level4 }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $openConversations->links() }}
</div>

@include('sysadmin.partials.organization_script')
<br>
<br>

<div>
    <div class="h4 p-3">{{__('Closed Conversations')}}</div>
    <div class="p-3">
        <div class="row">
            <div class="col">
                <p>The table below displays all completed conversations for employees in your organization(s).  Use the filters to search for conversations by orgnanization level, topic, participant or by due date range.  You may also use the text input field to search by name or keyword.  Coversations marked with the "unlocked" icon in the far left column are still within the two-week window of time that allows for any additional content edits by either conversation participant.  You can view the initial conversation completion date to the right of the 'Participants' column.</p>
                <p>Conversations marked with a "locked" icon have passed the two-week window of time to allow for any additional content edits by either conversation participant.  If you need to unlock the conversation, you can click the "Unlock" button to the right of the "View" button in the 'Action' column.</p>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="card card-primary shadow mb-3" style="overflow-x: auto;">
        <div class="d-flex" style="width: 2200px">
            <form action="" method="get">
                <table class="uk-table m-3">
                    <tbody>
                        @include('sysadmin.partials.organization_filter2')
                        <tr style="text-align: left;" class="p-2 form-group">
                            <td style="text-align: left; width: 300px;" class="p-2 form-group">
                                <label for='eetopic'>Topic</label>
                                <select class="form-control" name="eetopic" id="eetopic">
                                    <option value="all">All</option>
                                </select>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label for='eeparticipants'>
                                    Participants
                                    <input type="text" class="form-control" name="eeparticipants" value="{{request()->eeparticipants ?? 'Any'}}">
                                </label>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label for='eedateFrom'>
                                    Due Date (From)
                                    <input type="text" name="eedateFrom" class="form-control" value="{{request()->eedateFrom}}">
                                </label>
                            </td>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label for='eedateTo'>
                                    Due Date (To)
                                    <input type="text" name="eedateTo" class="form-control" value="{{request()->eedateTo}}">
                                </label>
                            </td>
                        </tr>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label for='eesearchText'>
                                    Search
                                    <input type="text" name="eesearchText" class="form-control" value="{{request()->eesearchText}}">
                                </label>
                            </td>
                            <td style="text-align: left; width: 200px; " class"p-2 form-group">
                                <button class="btn btn-primary mt-4 px-5" name="eesearchBtn" id="searchBtn">Search</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="collapseOne" class="collapse {{$closedConversations ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionLibrary">
            <div class="table table-wrapper" style="width: 2200px">
                <div class="md-card-content" style="overflow-x: auto;">
                    <table class="uk-table m-3">
                        <thead>
                            <tr>
                                <th style="text-align: left; width: 50px; "></th>
                                <th style="text-align: left; width: 300px; "> Topic</th>
                                <th style="text-align: left; width: 200px; "> Participants</th>
                                <th style="text-align: left; width: 300px; "> Completion Date</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 1</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 2</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 3</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 4</th>
                                <th style="text-align: left; width: 200px; "> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($closedConversations as $e)
                            <tr>
                                <td style="text-align: left; width: 50px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$e->id}}'></a>
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$e->id}}'>{{ $e->conversation_topic_id }}</a>
                                </td>
                                <td style="text-align: left; width: 200px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$e->id}}'></a>
                                </td>
                                <td style="text-align: left; width: 300px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$e->id}}'>{{ $e->date }}</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$e->id}}'>{{ $e->level1_program }}</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$e->id}}'>{{ $e->level2_division }}</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$e->id}}'>{{ $e->level3_branch }}</a>
                                </td>
                                <td style="text-align: left; width: 400px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$e->id}}'>{{ $e->level4 }}</a>
                                </td>
                                <td style="text-align: left; width: 200px; ">
                                    <a href='# class="edit-goal-detail highlighter" data-id="{{$e->id}}'>{{ $e->level4 }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $closedConversations->links() }}
</div>

@include('sysadmin.partials.organization_script2')



@endsection

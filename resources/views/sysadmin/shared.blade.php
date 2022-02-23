@extends('sysadmin.layout')
@section('tab-content')

<div>
    <div class="h4 p-3">{{__('Shared Employees')}}</div>
    <div class="p-3">
        <div class="row">
            <div class="col">
                <p>Below lists the names of all employees who you have shared with other members of your organization.</p>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="card card-primary shadow mb-3" style="overflow-x: auto;">
        <div class="d-flex" style="width: 3400px">
            <form action="" method="get">
                <table class="uk-table m-3">
                    <tbody>
                        @include('sysadmin.partials.organization_filter')
                        <tr>
                            <td style="text-align: left; width: 300px; " class="p-2 form-group">
                                <label for='dd_level2'>Shared Elements</label>
                                <select class="form-control" name="sharedElements" id="sharedElements">
                                    <option value="all">All</option>
                                </select>
                            </td>
                            <td style="text-align: left; width: 400px; " class="p-2 form-group">
                                <label>
                                    Search
                                    <input type="text" name="searchtext" class="form-control" value="{{request()->searchtext}}">
                                </label>
                            </td>
                            <td style="text-align: left; width: 150px; " class="p-2 form-group">
                                <button class="btn btn-primary mt-4 px-5">Search</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="collapseOne" class="collapse {{$sEmpl ? 'show' : ''}}" aria-labelledby="headingOne" data-parent="#accordionLibrary">
            <div class="table table-wrapper" style="width: 3400px">
                <div class="md-card-content" style="overflow-x: auto;">
                    <table class="uk-table m-3">
                        <thead>
                            <tr>
                                <th style="text-align: left; width: 500px; "> Employee Name</th>
                                <th style="text-align: left; width: 250px; "> Job Title</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 1</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 2</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 3</th>
                                <th style="text-align: left; width: 400px; "> Organization Level 4</th>
                                <th style="text-align: left; width: 200px; "> Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

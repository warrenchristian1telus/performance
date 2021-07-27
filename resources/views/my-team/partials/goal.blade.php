<div class="row border-bottom py-2">
    <div class="col-12 col-sm-8">
        <h4>
            {{ $goal->title }}
        </h4>
        <p>
            {{ $goal->what }}
        </p>
        <span class="d-flex flex-row align-items-center">
            <span class="pr-2 mr-2 border-right">
                <x-profile-pic size="20"></x-profile-pic> {{ Auth::user()->name}} 
            </span>
            <span class="pr-2 mr-2 border-right">
                <x-goal-status :status="$goal->status"></x-goal-status>
            </span>
            <span class="pr-2 mr-2 border-right">{{ $goal->target_date_human }}</span>
            <span class="pr-2 mr-2">
                <div class="form-check form-switch p-0">
                    <label class="form-check-label" for="is_shared_{{$goal->id}}">
                        <input type="hidden" name="is_shared[{{ $goal->id }}]" value="0">
                        <input class="form-check-input is-shared" type="checkbox" id="is_shared_{{$goal->id}}"  name="is_shared[{{ $goal->id }}]" data-goal-id="{{ $goal->id }}" {{ count($goal->sharedWith) > 0 ? 'checked' : ''}} value="1">
                        <i></i><span>{{count($goal->sharedWith) > 0 ? 'Shared' : 'Private'}}</span>
                    </label>
                </div>
            </span>
        </span>
    </div>
    <div class="col-12 col-sm-4">
        <label>
            Share with: <br>
            <select multiple class="form-control search-users" id="search-users-{{$goal->id}}" name="share_with[{{$goal->id}}][]"  {{ count($goal->sharedWith) > 0 ? '' : 'disabled'}} data-goal-id="{{$goal->id}}">
                @php
                    $alreadyAdded = [];
                @endphp
                @foreach ($goal->sharedWith as $employee)
                    <option value="{{ $employee->id }}" selected> {{$employee->name}}</option>
                    @php array_push($alreadyAdded, $employee->id) @endphp
                @endforeach
                @foreach ($employees as $employee)
                    @if (!in_array($employee->id, $alreadyAdded))
                        <option value="{{ $employee->id }}" {{ count($alreadyAdded) === 0 ? 'selected' : ''}}> {{$employee->name}}</option>
                    @endif
                @endforeach
            </select>
        </label>
    </div>
</div>
<label class="d-flex justify-content-left align-items-center" style="font-weight: normal;">
    Shared with:&nbsp;
    <select multiple class="form-control search-users ml-1" id="search-users-{{$goal->id}}" name="share_with[{{$goal->id}}][]" data-goal-id="{{$goal->id}}">
        @php
            $alreadyAdded = [];
        @endphp
        @foreach ($goal->sharedWith as $employee)
            <option value="{{ $employee->id }}" selected> {{$employee->name}}</option>
            @php array_push($alreadyAdded, $employee->id) @endphp
        @endforeach
        @foreach ($employees as $employee)
            @if (!in_array($employee->id, $alreadyAdded))
                <option value="{{ $employee->id }}"> {{$employee->name}}</option>
            @endif
        @endforeach
    </select>
</label>

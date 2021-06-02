       <div class="card card-primary">

   <table class="table ">
 
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Start Date</th>
      <th scope="col">Target Date</th>
      <th scope="col">Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($goals as $goal)
   <tr>
      <th scope="row">
        <a href="{{route("goal.show", $goal->id)}}">
          {{ $goal->title }}
        </a>
      </th>
      <td>{{ $goal->start_date_human }}</td>
      <td>{{ $goal->target_date_human }}</td>
      <td> 
        @include('goal.partials.status-change')
      </td>
      <td>
        <form id="delete-goal-{{$goal->id}}" action="{{ route('goal.destroy', $goal->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this goal?')">
            @csrf
            @method('DELETE')
            <x-button icon='trash' type="danger"></x-button>
        </form>
      </td>
    </tr>
      @endforeach
  </tbody>

</table>
</div>
       <div class="card card-primary">

   <table class="table ">
 
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Start Date</th>
      <th scope="col">Target Date</th>
      <th scope="col">Employee</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($goals as $goal)
   <tr>
      <th scope="row">{{ $goal->title }}</th>
      <td>{{ $goal->start_date_human }}</td>
      <td>{{ $goal->target_date_human }}</td>
      <td> 
                @include('goal.partials.status-change')
           </td>
    </tr>
      @endforeach
  </tbody>

</table>
</div>
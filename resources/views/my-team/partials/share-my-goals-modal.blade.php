
<div class="modal fade" id="shareMyGoalsModal" tabindex="-1" aria-labelledby="shareMyGoalsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="shareMyGoalsModalLabel">{{ Auth::user()->name}}'s Goal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <form action="{{ route('my-team.sync-goals')}}" method="POST">
          @csrf
          @foreach ($goals as $goal)
              @include('my-team.partials.goal')
          @endforeach
          <div class="row">
            <div class="col-12 text-right">
              <button type="submit" class="btn btn-primary mt-3">Save</button>
              <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
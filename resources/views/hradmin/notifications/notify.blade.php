
<x-side-layout title="{{ __('Dashboard') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary leading-tight" role="banner">
            Notify Users
        </h2> 
		@include('hradmin.notifications.partials.tabs')
    </x-slot>


<p class="px-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt, nibh nec interdum fermentum, est metus rutrum elit, in molestie ex massa ut urna. Duis dignissim tortor ipsum, dignissim rutrum quam gravida sed. Mauris auctor malesuada luctus. Praesent vitae ante et diam gravida lobortis. Donec eleifend euismod scelerisque. Curabitur laoreet erat sit amet tortor rutrum tristique. Sed lobortis est ac mauris lobortis euismod. Morbi tincidunt porta orci eu elementum. Donec lorem lacus, hendrerit a augue sed, tempus rhoncus arcu. Praesent a enim vel eros elementum porta. Nunc ut leo eu augue dapibus efficitur ac ac risus. Maecenas risus tellus, tincidunt vitae finibus vel, ornare vel neque. Curabitur imperdiet orci ac risus tempor semper. Integer nec varius urna, sit amet rhoncus diam. Aenean finibus, sapien eu placerat tristique, sapien dui maximus neque, id tempor dui magna eget lorem. Suspendisse egestas mauris non feugiat bibendum.</p>

<p class="px-3">Cras quis augue quis risus auctor facilisis quis ac ligula. Fusce vehicula consequat dui, et egestas augue sodales aliquam. In hac habitasse platea dictumst. Curabitur sit amet nulla nibh. Morbi mollis malesuada diam ut egestas. Pellentesque blandit placerat nisi ac facilisis. Vivamus consequat, nisl a lacinia ultricies, velit leo consequat magna, sit amet condimentum justo nibh id nisl. Quisque mattis condimentum cursus. Nullam eget congue augue, a molestie leo. Aenean sollicitudin convallis arcu non maximus. Curabitur ut lacinia nisi. Nam cursus venenatis lacus aliquet dapibus. Nulla facilisi.</p>


 @if ($message = Session::get('success'))
 <div class="alert alert-success">
	 <p>{{ $message }}</p>
 </div>
@endif

<form action="{{ route('hradmin.notifications.send') }}" method="post">
	@csrf

<h6 class="text-bold">Step 1. Select employees to notify</h6>
<div class="card">
	<div class="card-body">

		<div class="form-row mb-2">
			<div class="col-6">
				<label for="recipients">To</label>
				<select class="form-control select2 @error('recipients') is-invalid @enderror" 
					name="recipients[]" id="recipients" multiple="multiple">
					@if (old('recipients')) 
						@foreach ( Session::get('old_recipients') ?? [] as $key =>$value )
							<option value="{{ $key }}" selected="selected">{{ $value }}</option>
						@endforeach
					@endif
				</select>
				@error('recipients')
					<span class="invalid-feedback">
					{{  $message  }}
					</span>
				@enderror
			</div>
		</div>
	</div>    
</div>   


@include('hradmin.notifications.partials.recipient-test')



<h6 class="text-bold">Step 2. Enter notificatio details</h6> 




<div class="card">
	<div class="card-body">

{{-- 		<h2 class="mb-4">Send Notification</h2>  --}}


			<div class="form-row mb-2">
{{-- 
			  <div class="col-6">
				<label for="recipients">To</label>
				<select class="form-control select2 @error('recipients') is-invalid @enderror" 
					name="recipients[]" id="recipients" multiple="multiple">
					@if (old('recipients')) 
						@foreach ( Session::get('old_recipients') ?? [] as $key =>$value )
							<option value="{{ $key }}" selected="selected">{{ $value }}</option>
						@endforeach
					@endif
				</select>
				@error('recipients')
					<span class="invalid-feedback">
					{{  $message  }}
					</span>
				@enderror
			  </div>
 --}}				
			  <div class="col-4">
				<label for="sender_id" >From</label>
				<select class="form-control select2 @error('sender_id') is-invalid @enderror" 
						name="sender_id" id="sender_id" >
					@if (old('sender_id')) 
						@foreach ( Session::get('old_sender_ids') ?? [] as $key =>$value )
							<option value="{{ $key }}" selected="selected">{{ $value }}</option>
						@endforeach
					@endif
				</select>
				@error('sender_id')
					<span class="invalid-feedback">
					{{  $message  }}
					</span>
				@enderror
			  </div>
			</div>
			<div class="form-row mb-2">
			  <div class="col-8">
				<label for="subject">Subject</label>
				<input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" 
				    placeholder="Subject" value="{{ old('subject') }}">
				@error('subject')
					<span class="invalid-feedback">
						{{  $message  }}
					</span>
			  	@enderror
			  </div>
{{-- 
			  <div class="col-2">
				<label for="alert_type">Alert type</label>
				<input type="text" name="alert_type" class="form-control @error('alert_type') is-invalid @enderror" placeholder="">
				@error('alert_type')
					<span class="invalid-feedback">
						{{  $message  }}
					</span>
			  	@enderror
			  </div>
--}}

			  <div class="col-2">
				<label for="alert_format">Alert format</label>
				<select  class="form-control @error('alert_format') is-invalid @enderror" id="alert_format" name="alert_format">
					@foreach ($alert_format_list as $key => $value)
					  <option value="{{ $key }}" {{ old('alert_format') == $value ?? 'selected'}}>{{ $value }}</option>
					@endforeach
				  </select>     
{{--  
				<input type="text" name="alert_format" class="form-control @error('alert_format') is-invalid @enderror" placeholder="">
--}}
				@error('alert_format')
					<span class="invalid-feedback">
						{{  $message  }}
					</span>
			  	@enderror
			  </div>

			</div>
			<div class="form-row mb-2">
				<div class="col-10">
				  <label for="body">Body</label>
				  <textarea type="text" id="body" name="body" class="form-control  @error('body') is-invalid @enderror" 
				     placeholder="Type the content here" rows="3">{{ old('body') }}</textarea>
				  @error('body')
					<span class="invalid-feedback">
						{{  $message  }}
					</span>
				  @enderror
				</div>
			  </div>

	</div>    
</div>   

<h6 class="text-bold">Step 3. Finish</h6>
<div class="col-md-3 mb-2">
	<button class="btn btn-primary mt-2" type="submit">Notify Employees</button>
	<button class="btn btn-secondary mt-2">Cancel</button>
</div>

</form>

<h6 class="m-20">&nbsp;</h6>
<h6 class="m-20">&nbsp;</h6>
<h6 class="m-20">&nbsp;</h6>



<x-slot name="css">
<style>

.select2-container .select2-selection--single {
    height: 38px !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
	height: 38px !important;
}
</style>
</x-slot>

<x-slot name="js">
	
    <script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

    <script>
	$(document).ready(function(){
		CKEDITOR.replace('body', {
				toolbar: "Custom",
				toolbar_Custom: [
					["Bold", "Italic", "Underline"],
					["NumberedList", "BulletedList"],
					["Outdent", "Indent"],
					["Blockquote", "Source"],
				],
				
		});
	});

	$("#recipients").select2({
                width: '100%',
                ajax: {
                    url: '{{ route('hradmin.notifications.users.list') }}', // '/users', 
                    dataType: 'json',
                    data: function (params) {
                        const query = {
                            search: params.term,
                            page: params.page || 1
                        };
                        return query;
                    },
                    processResults: function (response, params) {
                        return {
                            results: $.map(response.data.data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            }),
                            pagination: {
                                more: response.data.current_page !== response.data.last_page
                            }
                        }
                    }
                }
            });

	$('#sender_id').select2({
			ajax: {
				url: '/graph-users'
				, dataType: 'json'
				, delay: 250
				, data: function(params) {
					var query = {
						'q': params.term
					, }
					return query;
				}
				, processResults: function(data) {
					return {
						results: data
						};
				}
				, cache: false
			}
		});

    </script>

</x-slot>


</x-side-layout>
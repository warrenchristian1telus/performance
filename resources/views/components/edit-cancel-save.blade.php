@props(['name', 'id', 'hideEdit' => false])
@if(!$hideEdit)
<button class="btn btn-primary btn-sm ml-2 btn-conv-edit" data-name="{{ $name }}" data-id="{{ $id }}" type="button">Edit</button>
@endif
<button class="btn btn-primary btn-sm ml-2 btn-conv-save d-none" data-name="{{ $name }}" data-id="{{ $id }}" type="button">Save</button>
<button class="btn btn-outline-primary btn-sm btn-conv-cancel d-none" data-name="{{ $name }}" data-id="{{ $id }}" type="button">Cancel</button>


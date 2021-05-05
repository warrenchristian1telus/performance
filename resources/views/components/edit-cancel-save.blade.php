@props(['name', 'id'])
<button class="btn btn-primary btn-sm ml-5 btn-conv-edit" data-name="{{ $name }}" data-id="{{ $id }}" type="button">Edit</button>
<button class="btn btn-outline-primary btn-sm ml-5 btn-conv-cancel d-none" data-name="{{ $name }}" data-id="{{ $id }}" type="button">Cancel</button>
<button class="btn btn-primary btn-sm ml-5 btn-conv-save d-none" data-name="{{ $name }}" data-id="{{ $id }}" type="button">Save</button>
<x-button style="link" class="share-profile-btn" data-user-id="{{$row->id}}" data-user-name="{{$row->name}}" data-toggle="modal" data-target="#employee-profile-sharing-modal">{{$yesOrNo ?? 'View'}}</x-button>
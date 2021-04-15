<div class="d-inline-flex flex-row align-items-center">
    <div class="bg-{{ \Config::get("global.status.$status.color") }} rounded-circle mr-2" style="width:15px; height:15px;"></div>
    <div class="text-capitalize">
        {{ $status }}
    </div>
</div>
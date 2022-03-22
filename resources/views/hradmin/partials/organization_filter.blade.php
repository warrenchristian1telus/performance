<tr>
    <td style="text-align: left; width: 300px; " class="p-2 form-group">
        <label for='dd_level0'>Organization</label>
        <select class="form-control" name="dd_level0" id="dd_level0">
            <option value="all">All</option>
            @foreach ($level0 as $l0)
                <option value="{{ $l0->key0 }}">{{ $l0->organization }}</option>
            @endforeach
        </select>
    </td>
    <td style="text-align: left; width: 300px; " class="p-2 form-group">
        <label for='dd_level1'>Organization Level 1</label>
        <select class="form-control" name="dd_level1" id="dd_level1">
            <option value="all">All</option>
        </select>
    </td>
    <td style="text-align: left; width: 300px; " class="p-2 form-group">
        <label for='dd_level2'>Organization Level 2</label>
        <select class="form-control" name="dd_level2" id="dd_level2">
            <option value="all">All</option>
        </select>
    </td>
    <td style="text-align: left; width: 300px; " class="p-2 form-group">
        <label for='dd_level3'>Organization Level 3</label>
        <select class="form-control" name="dd_level3" id="dd_level3">
            <option value="all">All</option>
        </select>
    </td>
    <td style="text-align: left; width: 300px; " class="p-2 form-group">
        <label for='dd_level4'>Organization Level 4</label>
        <select class="form-control" name="dd_level4" id="dd_level4">
            <option value="all">All</option>
        </select>
    </td>
    <td style="text-align: left; width: 200px; " class="p-2">
    </td>
</tr>

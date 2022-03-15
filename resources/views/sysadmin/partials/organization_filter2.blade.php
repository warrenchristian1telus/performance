<tr>
    <td style="text-align: left; width: 300px; " class="p-2 form-group">
        <label for='ee_level0'>Organization</label>
        <select class="form-control" name="ee_level0" id="ee_level0">
            <option value="all">All</option>
            @foreach ($eelevel0 as $e0)
                <option value="{{ $e0->key0 }}">{{ $e0->organization }}</option>
            @endforeach
        </select>
    </td>
    <td style="text-align: left; width: 300px; " class="p-2 form-group">
        <label for='ee_level1'>Organization Level 1</label>
        <select class="form-control" name="ee_level1" id="ee_level1">
            <option value="all">All</option>
        </select>
    </td>
    <td style="text-align: left; width: 300px; " class="p-2 form-group">
        <label for='ee_level2'>Organization Level 2</label>
        <select class="form-control" name="ee_level2" id="ee_level2">
            <option value="all">All</option>
        </select>
    </td>
    <td style="text-align: left; width: 300px; " class="p-2 form-group">
        <label for='ee_level3'>Organization Level 3</label>
        <select class="form-control" name="ee_level3" id="ee_level3">
            <option value="all">All</option>
        </select>
    </td>
    <td style="text-align: left; width: 300px; " class="p-2 form-group">
        <label for='ee_level4'>Organization Level 4</label>
        <select class="form-control" name="ee_level4" id="ee_level4">
            <option value="all">All</option>
        </select>
    </td>
    <td style="text-align: left; width: 200px; " class="p-2">
    </td>
</tr>

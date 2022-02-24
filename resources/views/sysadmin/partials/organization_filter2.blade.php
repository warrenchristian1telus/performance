<tr>
    <td style="text-align: left; width: 300px; " class="p-2 form-group">
        <label for='ee_level1'>Organization Level 1</label>
        <select class="form-control" name="ee_level1" id="ee_level1">
            <option value="all">All</option>
            @foreach ($eelevel1 as $el1)
            <option value="{{ $el1->key1 }}">{{ $el1->level1_program }}</option>
            @endforeach
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
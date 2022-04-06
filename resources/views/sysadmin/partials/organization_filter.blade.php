<tr>
    <td style="text-align: left; width: 300px; " class="p-1 form-group">
        <label for='dd_level0'>Organization</label>
        <select class="form-control" name="dd_level0" id="dd_level0">
            <option value="all">All</option>
            @foreach ($level0 as $l0)
                @if ($request->dd_level0 == $l0->key0)
                    <option value="{{ $l0->key0 }}" selected>{{ $l0->organization }}</option>
                @else
                    <option value="{{ $l0->key0 }}">{{ $l0->organization }}</option>
                @endif
            @endforeach
        </select>
    </td>
    <td style="text-align: left; width: 300px; " class="p-1 form-group">
        <label for='dd_level1'>Organization Level 1</label>
        <select class="form-control" name="dd_level1" id="dd_level1">
            <option value="all">All</option>
        </select>
        <?php $request->dd_level1 = $request->dd_level1 ?>
    </td>
    <td style="text-align: left; width: 300px; " class="p-1 form-group">
        <label for='dd_level2'>Organization Level 2</label>
        <select class="form-control" name="dd_level2" id="dd_level2">
            <option value="all">All</option>
        </select>
        <?php $request->dd_level2 = $request->dd_level2 ?>
    </td>
    <td style="text-align: left; width: 300px; " class="p-1 form-group">
        <label for='dd_level3'>Organization Level 3</label>
        <select class="form-control" name="dd_level3" id="dd_level3">
            <option value="all">All</option>
        </select>
        <?php $request->dd_level3 = $request->dd_level3 ?>
    </td>
    <td style="text-align: left; width: 300px; " class="p-1 form-group">
        <label for='dd_level4'>Organization Level 4</label>
        <select class="form-control" name="dd_level4" id="dd_level4">
            <option value="all">All</option>
        </select>
        <?php $request->dd_level4 = $request->dd_level4 ?>
    </td>
</tr>

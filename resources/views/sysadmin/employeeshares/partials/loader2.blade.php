<div class="card p-3">
    <div class="form-row">
        <div class="form-group col-md-2">
        <label for="edd_level0">Organization</label>
        <select id="edd_level0" name="edd_level0" class="form-control select2">
            @if ( old('edd_level0') && session()->get('elevel0') )
                <option value="{{ session()->get('elevel0')->id }}">{{ session()->get('elevel0')->name }}</option>
            @endif
        </select>
        </div>
        <div class="form-group col-md-2">
        <label for="edd_level1">Level 1</label>
        <select id="edd_level1" name="edd_level1" class="form-control select2">
            @if ( old('edd_level1') && session()->get('elevel1') )
                <option value="{{ session()->get('elevel1')->id }}">{{ session()->get('elevel1')->name }}</option>
            @endif
        </select>
        </div>
        <div class="form-group col-md-2">
            <label for="edd_level2">Level 2</label>
            <select id="edd_level2" name="edd_level2" class="form-control select2">
                @if ( old('edd_level2') && session()->get('elevel2') )
                    <option value="{{ session()->get('elevel2')->id }}">{{ session()->get('elevel2')->name }}</option>
                @endif
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="edd_level3">Level 3</label>
            <select id="edd_level3" name="edd_level3" class="form-control select2">
                @if ( old('edd_level3') && session()->get('elevel3') )
                    <option value="{{ session()->get('elevel3')->id }}">{{ session()->get('elevel3')->name }}</option>
                @endif
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="edd_level4">Level 4</label>
            <select id="edd_level4" name="edd_level4" class="form-control select2">
                @if ( old('edd_level4') && session()->get('elevel4') )
                    <option value="{{ session()->get('elevel4')->id }}">{{ session()->get('elevel4')->name }}</option>
                @endif
            </select>
        </div>
        <div class="form-group col-md-2">
        </div>
        <div class="form-group col-md-2">
            <label for="ecriteria">Search Criteria</label>
            <select id="ecriteria" name="ecriteria" class="form-control">
                @foreach( $ecriteriaList as $key => $value )
                    <option value="{{ $key }}" {{  old('ecriteria') == $key ? 'selected' : '' }} >{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="esearch_text">Search Text</label>
            <input type="text" id="esearch_text" name="esearch_text" class="form-control" 
                value="{{ old('esearch_text') }}" placeholder="Search Text">
        </div>
        <div class="form-group col-md-2 p-3" style="text-align:left; vertical-align:bottom;">
            <div class="form-group row"> 
            </div>
            <div class="form-group row">
                <span class="float-left float-bottom">  
                    <button type="button" class="btn btn-primary" id="ebtn_search" name="ebtn_search">Filter</button>
                    <button type="button" class="btn btn-secondary" id="ebtn_search_reset" name="ebtn_search_reset" value="ebtn_reset">Reset</button>
                </span>
            </div>
        </div>
    </div>
</div>


@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
    .select2-selection--multiple{
        overflow: hidden !important;
        height: auto !important;
        min-height: 38px !important;
    }

    .select2-container .select2-selection--single {
        height: 38px !important;
        }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
    }

    </style>

@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        $(document).ready(function() {

            $('#edd_level0').change(function (e){
                e.preventDefault();
                console.log('#edd_level0.change');
            });

            $('#edd_level1').change(function (e){
                e.preventDefault();
                console.log('#edd_level1.change');
            });

            $('#edd_level2').change(function (e){
                e.preventDefault();
                console.log('#edd_level2.change');
            });

            $('#edd_level3').change(function (e){
                e.preventDefault();
                console.log('#edd_level3.change');
            });

            $('#edd_level4').change(function (e){
                e.preventDefault();
                console.log('#edd_level4.change');
                $('#ebtn_search').click();
            });

            $('#ecriteria').change(function (e){
                e.preventDefault();
                console.log('#ecriteria.change');
                $('#ebtn_search').click();
            });

            $('#esearch_text').change(function (e){
                e.preventDefault();
                console.log('#esearch_text.change');
               $('#ebtn_search').click();
            });

            $('#esearch_text').keydown(function (e){
                if (e.keyCode == 13) {
                    e.preventDefault();
                    console.log('#esearch_text.keydown');
                    $('#ebtn_search').click();
                }
            });

            $('#ebtn_search_reset').click(function (e){
                e.preventDefault();
                console.log('#ebtn_search_reset.click');
                $('#ecriteria').val('all');
                $('#esearch_text').val(null);
                $('#edd_level0').val(null).trigger('change');
                $('#edd_level1').val(null).trigger('change');
                $('#edd_level2').val(null).trigger('change');
                $('#edd_level3').val(null).trigger('change');
                $('#edd_level4').val(null).trigger('change');
            });

            $('#edd_level0').select2({
                placeholder: 'Select Organization',
                allowClear: true,
                ajax: {
                    url: '/sysadmin/employeeshares/eorg-organizations'
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

            $('#edd_level1').select2({
                placeholder: 'Select Level 1',
                allowClear: true,
                ajax: {
                    url: '/sysadmin/employeeshares/eorg-programs' 
                    , dataType: 'json'
                    , delay: 250
                    , data: function(params) {
                        var query = {
                            'q': params.term,
                            'elevel0': $('#edd_level0').children("option:selected").val()
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

            $('#edd_level2').select2({
                placeholder: 'Select Level 2',
                allowClear: true,
                ajax: {
                    url: '/sysadmin/employeeshares/eorg-divisions' 
                    , dataType: 'json'
                    , delay: 250
                    , data: function(params) {
                        var query = {
                            'q': params.term,
                            'elevel0': $('#edd_level0').children("option:selected").val(),
                            'elevel1': $('#edd_level1').children("option:selected").val()
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

            $('#edd_level3').select2({
                placeholder: 'Select Level 3',
                allowClear: true,
                ajax: {
                    url: '/sysadmin/employeeshares/eorg-branches' 
                    , dataType: 'json'
                    , delay: 250
                    , data: function(params) {
                        var query = {
                            'q': params.term,
                            'elevel0': $('#edd_level0').children("option:selected").val(),
                            'elevel1': $('#edd_level1').children("option:selected").val(),
                            'elevel2': $('#edd_level2').children("option:selected").val()
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

            $('#edd_level4').select2({
                placeholder: 'Select Level 4',
                allowClear: true,
                ajax: {
                    url: '/sysadmin/employeeshares/eorg-level4' 
                    , dataType: 'json'
                    , delay: 250
                    , data: function(params) {
                        var query = {
                            'q': params.term,
                            'elevel0': $('#edd_level0').children("option:selected").val(),
                            'elevel1': $('#edd_level1').children("option:selected").val(),
                            'elevel2': $('#edd_level2').children("option:selected").val(),
                            'elevel3': $('#edd_level3').children("option:selected").val()
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
            
            $('#edd_level0').on('select2:select', function (e) {
                e.preventDefault();
                console.log('#edd_level0.select2:select');
                $('#edd_level1').val(null).trigger('change');
                $('#edd_level2').val(null).trigger('change');
                $('#edd_level3').val(null).trigger('change');
                $('#edd_level4').val(null).trigger('change');
            });

            $('#edd_level1').on('select2:select', function (e) {
                e.preventDefault();
                console.log('#edd_level1.select2:select');
                $('#edd_level2').val(null).trigger('change');
                $('#edd_level3').val(null).trigger('change');
                $('#edd_level4').val(null).trigger('change');
            });

            $('#edd_level2').on('select2:select', function (e) {
                e.preventDefault();
                console.log('#edd_level2.select2:select');
                $('#edd_level3').val(null).trigger('change');
                $('#edd_level4').val(null).trigger('change');
            });

            $('#edd_level3').on('select2:select', function (e) {
                e.preventDefault();
                console.log('#edd_level3.select2:select');
                $('#edd_level4').val(null).trigger('change');
            });

            $('#edd_level4').on('select2:select', function (e) {
                e.preventDefault();
                console.log('#edd_level4.select2:select');
            });

            $('#edd_level0').on('select2:unselect', function (e) {
                e.preventDefault();
                console.log('#edd_level0.select2:unselect');
                $('#edd_level0').val(null).trigger('change');
                $('#edd_level1').val(null).trigger('change');
                $('#edd_level2').val(null).trigger('change');
                $('#edd_level3').val(null).trigger('change');
                $('#edd_level4').val(null).trigger('change');
            });

            $('#edd_level1').on('select2:unselect', function (e) {
                e.preventDefault();
                console.log('#edd_level1.select2:unselect');
                $('#edd_level1').val(null).trigger('change');
                $('#edd_level2').val(null).trigger('change');
                $('#edd_level3').val(null).trigger('change');
                $('#edd_level4').val(null).trigger('change');
            });

            $('#edd_level2').on('select2:unselect', function (e) {
                e.preventDefault();
                console.log('#edd_level2.select2:unselect');
                $('#edd_level2').val(null).trigger('change');
                $('#edd_level3').val(null).trigger('change');
                $('#edd_level4').val(null).trigger('change');
            });

            $('#edd_level3').on('select2:unselect', function (e) {
                e.preventDefault();
                console.log('#edd_level3.select2:unselect');
                $('#edd_level3').val(null).trigger('change');
                $('#edd_level4').val(null).trigger('change');
            });

            $('#edd_level4').on('select2:unselect', function (e) {
                e.preventDefault();
                console.log('#edd_level4.select2:unselect');
                $('#edd_level4').val(null).trigger('change');
                $('#ebtn_search').click();
            });

        });

    </script>

@endpush
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
jQuery(document).ready(function ()
{
    jQuery('select[name="ee_level0"]').on('change',function(){
        var eelevel0 = jQuery(this).val();
        if(eelevel0 == 'all') {
            jQuery('select[name="ee_level1"]').empty();
            jQuery('select[name="ee_level2"]').empty();
            jQuery('select[name="ee_level3"]').empty();
            jQuery('select[name="ee_level4"]').empty();
            $('select[name="ee_level1"]').append('<option value="all">All</option>');
            $('select[name="ee_level2"]').append('<option value="all">All</option>');
            $('select[name="ee_level3"]').append('<option value="all">All</option>');
            $('select[name="ee_level4"]').append('<option value="all">All</option>');
            ee_level1 = 'all';
            ee_level2 = 'all';
            ee_level3 = 'all';
            ee_level4 = 'all';
        }else if(eelevel0 != null){
            jQuery.ajax({
                url : '/hradmin/level1/'+eelevel0,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    jQuery('select[name="ee_level1"]').empty();
                    $('select[name="ee_level1"]').append('<option value="all">All</option>');
                    jQuery.each(data, function(key1, level1_program){
                        $('select[name="ee_level1"]').append('<option value="'+ key1 +'">'+ level1_program +'</option>');
                    });
                    jQuery('select[name="ee_level2"]').empty();
                    $('select[name="ee_level2"]').append('<option value="all">All</option>');
                    ee_level2 = 'all';
                    jQuery('select[name="ee_level3"]').empty();
                    $('select[name="ee_level3"]').append('<option value="all">All</option>');
                    ee_level3 = 'all';
                    jQuery('select[name="ee_level4"]').empty();
                    $('select[name="ee_level4"]').append('<option value="all">All</option>');
                    ee_level4 = 'all';
                }
            });
        }else {
            $('select[name="ee_level1"]').empty();
            $('select[name="ee_level2"]').empty();
            $('select[name="ee_level3"]').empty();
            $('select[name="ee_level4"]').empty();
            $('select[name="ee_level1"]').append('<option value="all">All</option>');
            $('select[name="ee_level2"]').append('<option value="all">All</option>');
            $('select[name="ee_level3"]').append('<option value="all">All</option>');
            $('select[name="ee_level4"]').append('<option value="all">All</option>');
            ee_level1 = 'all';
            ee_level2 = 'all';
            ee_level3 = 'all';
            ee_level4 = 'all';
        }
    });
    jQuery('select[name="ee_level1"]').on('change',function(){
        var eelevel0 = jQuery('select[name="ee_level0"]').val();
        var eelevel1 = jQuery(this).val();
        if(eelevel1 == 'all') {
            jQuery('select[name="ee_level2"]').empty();
            jQuery('select[name="ee_level3"]').empty();
            jQuery('select[name="ee_level4"]').empty();
            $('select[name="ee_level2"]').append('<option value="all">All</option>');
            $('select[name="ee_level3"]').append('<option value="all">All</option>');
            $('select[name="ee_level4"]').append('<option value="all">All</option>');
            ee_level2 = 'all';
            ee_level3 = 'all';
            ee_level4 = 'all';
        }else if(eelevel1 != null){
            jQuery.ajax({
                url : '/hradmin/level2/'+eelevel0+'/'+eelevel1,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    jQuery('select[name="ee_level2"]').empty();
                    $('select[name="ee_level2"]').append('<option value="all">All</option>');
                    jQuery.each(data, function(key2, level2_division){
                        $('select[name="ee_level2"]').append('<option value="'+ key2 +'">'+ level2_division +'</option>');
                    });
                    jQuery('select[name="ee_level3"]').empty();
                    $('select[name="ee_level3"]').append('<option value="all">All</option>');
                    ee_level3 = 'all';
                    jQuery('select[name="ee_level4"]').empty();
                    $('select[name="ee_level4"]').append('<option value="all">All</option>');
                    ee_level4 = 'all';
                }
            });
        }else {
            $('select[name="ee_level2"]').empty();
            $('select[name="ee_level3"]').empty();
            $('select[name="ee_level4"]').empty();
            $('select[name="ee_level2"]').append('<option value="all">All</option>');
            $('select[name="ee_level3"]').append('<option value="all">All</option>');
            $('select[name="ee_level4"]').append('<option value="all">All</option>');
            ee_level2 = 'all';
            ee_level3 = 'all';
            ee_level4 = 'all';
        }
    });
    jQuery('select[name="ee_level2"]').on('change',function(){
        var eelevel0 = jQuery('select[name="ee_level0"]').val();
        var eelevel1 = jQuery('select[name="ee_level1"]').val();
        var eelevel2 = jQuery(this).val();
        if(eelevel2 == 'all') {
            jQuery('select[name="ee_level3"]').empty();
            jQuery('select[name="ee_level4"]').empty();
            $('select[name="ee_level3"]').append('<option value="all">All</option>');
            $('select[name="ee_level4"]').append('<option value="all">All</option>');
            ee_level3 = 'all';
            ee_level4 = 'all';
        }else if(eelevel2 != null){
            jQuery.ajax({
                url : '/hradmin/level3/'+eelevel0+'/'+eelevel1+'/'+eelevel2,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    console.log(data);
                    jQuery('select[name="ee_level3"]').empty();
                    $('select[name="ee_level3"]').append('<option value="all">All</option>');
                    jQuery.each(data, function(key3, level3_branch){
                        $('select[name="ee_level3"]').append('<option value="'+ key3 +'">'+ level3_branch +'</option>');
                    });
                    jQuery('select[name="ee_level4"]').empty();
                    $('select[name="ee_level4"]').append('<option value="all">All</option>');
                    ee_level4 = 'all';
                }
            });
        }else {
            $('select[name="ee_level3"]').empty();
            $('select[name="ee_level4"]').empty();
            $('select[name="ee_level3"]').append('<option value="all">All</option>');
            $('select[name="ee_level4"]').append('<option value="all">All</option>');
            ee_level3 = 'all';
            ee_level4 = 'all';
        }
    });
    jQuery('select[name="ee_level3"]').on('change',function(){
        var eelevel0 = jQuery('select[name="ee_level0"]').val();
        var eelevel1 = jQuery('select[name="ee_level1"]').val();
        var eelevel2 = jQuery('select[name="ee_level2"]').val();
        var eelevel3 = jQuery(this).val();
        if(eelevel3 == 'all') {
            jQuery('select[name="ee_level4"]').empty();
            $('select[name="ee_level4"]').append('<option value="all">All</option>');
            ee_level4 = 'all';
        }else if(eelevel3 != null){
            jQuery.ajax({
                url : '/hradmin/level4/'+eelevel0+'/'+eelevel1+'/'+eelevel2+'/'+eelevel3,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    jQuery('select[name="ee_level4"]').empty();
                    $('select[name="ee_level4"]').append('<option value="all">All</option>');
                    jQuery.each(data, function(key4, level4){
                        $('select[name="ee_level4"]').append('<option value="'+ key4 +'">'+ level4 +'</option>');
                    });
                }
            });
        }else {
            $('select[name="ee_level4"]').empty();
            $('select[name="ee_level4"]').append('<option value="all">All</option>');
            ee_level4 = 'all';
        }
    });
});
</script>

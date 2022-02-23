<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
jQuery(document).ready(function ()
{
    jQuery('select[name="dd_level1"]').on('change',function(){
        var ddlevel1 = jQuery(this).val();
        if(ddlevel1 == 'all') {
            jQuery('select[name="dd_level2"]').empty();
            jQuery('select[name="dd_level3"]').empty();
            jQuery('select[name="dd_level4"]').empty();
            $('select[name="dd_level2"]').append('<option value="all">All</option>');
            $('select[name="dd_level3"]').append('<option value="all">All</option>');
            $('select[name="dd_level4"]').append('<option value="all">All</option>');
            dd_level2 = 'all';
            dd_level3 = 'all';
            dd_level4 = 'all';
        }else if(ddlevel1 != null){
            console.log('Not Null');
            jQuery.ajax({
                url : 'level2/'+ddlevel1,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    jQuery('select[name="dd_level2"]').empty();
                    $('select[name="dd_level2"]').append('<option value="all">All</option>');
                    jQuery.each(data, function(key2, level2_division){
                        $('select[name="dd_level2"]').append('<option value="'+ key2 +'">'+ level2_division +'</option>');
                    });
                    jQuery('select[name="dd_level3"]').empty();
                    $('select[name="dd_level3"]').append('<option value="all">All</option>');
                    dd_level3 = 'all';
                    jQuery('select[name="dd_level4"]').empty();
                    $('select[name="dd_level4"]').append('<option value="all">All</option>');
                    dd_level4 = 'all';
                }
            });
        }else {
            $('select[name="dd_level2"]').empty();
            $('select[name="dd_level3"]').empty();
            $('select[name="dd_level4"]').empty();
            $('select[name="dd_level2"]').append('<option value="all">All</option>');
            $('select[name="dd_level3"]').append('<option value="all">All</option>');
            $('select[name="dd_level4"]').append('<option value="all">All</option>');
            dd_level2 = 'all';
            dd_level3 = 'all';
            dd_level4 = 'all';
        }
    });
    jQuery('select[name="dd_level2"]').on('change',function(){
        var ddlevel1 = jQuery('select[name="dd_level1"]').val();
        var ddlevel2 = jQuery(this).val();
        if(ddlevel2 == 'all') {
            jQuery('select[name="dd_level3"]').empty();
            jQuery('select[name="dd_level4"]').empty();
            $('select[name="dd_level3"]').append('<option value="all">All</option>');
            $('select[name="dd_level4"]').append('<option value="all">All</option>');
            dd_level3 = 'all';
            dd_level4 = 'all';
        }else if(ddlevel2 != null){
            jQuery.ajax({
                url : 'level3/'+ddlevel1+'/'+ddlevel2,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    console.log(data);
                    jQuery('select[name="dd_level3"]').empty();
                    $('select[name="dd_level3"]').append('<option value="all">All</option>');
                    jQuery.each(data, function(key3, level3_branch){
                        $('select[name="dd_level3"]').append('<option value="'+ key3 +'">'+ level3_branch +'</option>');
                    });
                    jQuery('select[name="dd_level4"]').empty();
                    $('select[name="dd_level4"]').append('<option value="all">All</option>');
                    dd_level4 = 'all';
                }
            });
        }else {
            $('select[name="dd_level3"]').empty();
            $('select[name="dd_level4"]').empty();
            $('select[name="dd_level3"]').append('<option value="all">All</option>');
            $('select[name="dd_level4"]').append('<option value="all">All</option>');
            dd_level3 = 'all';
            dd_level4 = 'all';
        }
    });
    jQuery('select[name="dd_level3"]').on('change',function(){
        var ddlevel1 = jQuery('select[name="dd_level1"]').val();
        var ddlevel2 = jQuery('select[name="dd_level2"]').val();
        var ddlevel3 = jQuery(this).val();
        if(ddlevel3 == 'all') {
            jQuery('select[name="dd_level4"]').empty();
            $('select[name="dd_level4"]').append('<option value="all">All</option>');
            dd_level4 = 'all';
        }else if(ddlevel3 != null){
            jQuery.ajax({
                url : 'level4/'+ddlevel1+'/'+ddlevel2+'/'+ddlevel3,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    jQuery('select[name="dd_level4"]').empty();
                    $('select[name="dd_level4"]').append('<option value="all">All</option>');
                    jQuery.each(data, function(key4, level4){
                        $('select[name="dd_level4"]').append('<option value="'+ key4 +'">'+ level4 +'</option>');
                    });
                }
            });
        }else {
            $('select[name="dd_level4"]').empty();
            $('select[name="dd_level4"]').append('<option value="all">All</option>');
            dd_level4 = 'all';
        }
    });
});
</script>

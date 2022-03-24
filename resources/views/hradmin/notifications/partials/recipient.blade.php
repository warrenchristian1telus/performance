<div class="container">
    <div class="accordion-option">
        <h3 class="title">(Include File) Lorem Ipsum</h3>
        <a href="javascript:void(0)" class="toggle-accordion active" 
           accordion-id="#accordion"></a>
    </div>
    <div class="clearfix"></div>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

@foreach($organization_list as $key => $organization)         
        
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                
                <div class="panel-title">
            
                    <div class="form-check">    
                    <input class="form-check-input" type="checkbox" value="" id="">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOrg{{ $key }}"
                            aria-expanded="true" aria-controls="collapseOrg{{ $key }}">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                            {{ $organization  }}
                            </label>
                        </a>
                    </div>
                </div>
            </div>
            <div id="collapseOrg{{ $key }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                    eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                    on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                    Leggings occaecat craft beer farm-to-table,
                    raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                    VHS.
                </div>
            </div>
        </div>
@endforeach
{{-- 
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h6 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                        href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Collapsible Group Item #2
                    </a>
                </h6>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                    eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                    on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                    Leggings occaecat craft beer farm-to-table,
                    raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                    VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h6 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                        href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        Collapsible Group Item #3
                    </a>
                </h6>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                    eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                    on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                    beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                    Leggings occaecat craft beer farm-to-table,
                    raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable
                    VHS.
                </div>
            </div>
        </div>
--}}
    </div>
</div>


@push('css')
<style>
/* body {
color: #6a6c6f;
background-color: #f1f3f6;
margin-top: 30px;
} */


.panel-default {
    margin-bottom: 0.4em;
    padding: 5px;
}

.panel-default>.panel-heading {
    color: #333;
    background-color: #fff;
    border-color: #e4e5e7;
    padding: 0;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.panel-default .panel-body {
    background-color: #fff;
}

.panel-default .form-check {
    /* display: block; */
    /* padding: 10px 15px 10px; */
}
.panel-default>.panel-heading a {
    /* display: block;
    padding: 10px 15px; */
}
.panel-default>.panel-heading a:after {
    content: "";
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    float: right;
    transition: transform .25s linear;
    -webkit-transition: -webkit-transform .25s linear;
}
.panel-default>.panel-heading a[aria-expanded="true"] {
    background-color: #eee;
}
.panel-default>.panel-heading a[aria-expanded="true"]:after {
    content: "\2212";
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
}
.panel-default>.panel-heading a[aria-expanded="false"]:after {
    content: "\002b";
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}

.panel-body {
    padding: 10px 15px;
}
.accordion-option {
    width: 100%;
    float: left;
    clear: both;
    margin: 15px 0;
}
.accordion-option .title {
    font-size: 20px;
    font-weight: bold;
    float: left;
    padding: 0;
    margin: 0;
}
.accordion-option .toggle-accordion {
    float: right;
    font-size: 16px;
    color: #6a6c6f;
}
.accordion-option .toggle-accordion:before {
    content: "Expand All";
}
.accordion-option .toggle-accordion.active:before {
    content: "Collapse All";
}
</style>
@endpush

@push('js')

    <script>
    $(document).ready(function() {

        $(".toggle-accordion").on("click", function() {
            var accordionId = $(this).attr("accordion-id"),
            numPanelOpen = $(accordionId + ' .collapse.in').length;
            $(this).toggleClass("active");
            if (numPanelOpen == 0) {
                openAllPanels(accordionId);
            } else {
                closeAllPanels(accordionId);
            }
        })

        openAllPanels = function(aId) {
            console.log("setAllPanelOpen");
            $(aId + ' .panel-collapse:not(".in")').collapse('show');
        }

        closeAllPanels = function(aId) {
            console.log("setAllPanelclose");
            $(aId + ' .panel-collapse.in').collapse('hide');
        }
    });
    </script>

@endpush

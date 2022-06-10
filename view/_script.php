<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
    <script src="../assets/dist/respond/dest/respond.min.js"></script>
    <script src="../assets/dist/Flot/excanvas.min.js"></script>
    <script src="../assets/dist/jquery-1.x/dist/jquery.min.js"></script>
    <![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="../assets/dist/jquery/dist/jquery.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="../assets/dist/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="../assets/dist/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/dist/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="../assets/dist/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="../assets/dist/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="../assets/dist/perfect-scrollbar/js/min/perfect-scrollbar.jquery.min.js"></script>
<script type="text/javascript" src="../assets/dist/jquery.cookie/jquery.cookie.js"></script>
<script type="text/javascript" src="../assets/dist/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/min/main.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- <script type="text/javascript" src="../assets/dist/jquery-ui-list/jquery-ui.js"></script> -->

<!-- start: custom plugins -->
<script src="../assets/dist/select2/dist/js/select2.min.js"></script>
<script src="../assets/dist/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/dist/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="../assets/dist/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
<script src="../assets/dist/bootstrap-fileinput/js/fileinput.min.js"></script>
<!-- end: custom plugins-->

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="../assets/dist/js/jquery.validate.min.js"></script>
<script src="../assets/dist/js/jquery.smartWizard.js"></script>
<script src="../assets/dist/js/form-wizard.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="../assets/dist/twbs-pagination/jquery.twbsPagination.min.js"></script>
<script src="../assets/dist/jquery.pulsate/jquery.pulsate.min.js"></script>
<script src="../assets/dist/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="../assets/dist/js/min/ui-elements.min.js"></script>
<script src="../assets/dist/js/_notifications.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

<!-- Fa -->
<script type="text/javascript" src="../assets/dist/datePicker/js/pwt-date.js"></script>
<script type="text/javascript" src="../assets/dist/datePicker/js/pwt-datepicker.js"></script>

<!-- for search list -->
<script type="text/javascript" src="../assets/dist/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js"></script>

<!-- Summernote Plugin JavaScript -->
<script src="../assets/dist/summernote/dist/summernote.min.js"></script>



<!-- confrim alert for deleted and another alert  -->
<script src="../assets/jquery-confirm/jquery-confirm.min.js"></script>


    

<script type="text/javascript">
    jQuery(document).ready(function() {
        Main.init();
        $(".select2").select2({placeholder:"یکی را انتخاب  نمایید ",allowClear:!0, width:'100%',dir:'rtl'});
    });

    // For Date
    var dp;
    $(document).ready(function() {
        var options = {
            format : "YYYY-MM-DD",
            formatter : function(unix) {
                var pdate = new persianDate(unix);
                pdate.formatPersian = false;
                return pdate.format("YYYY-MM-DD");
                //return new persinDate(unix).format("YYYY/MM/DD");
            },
            daysTitleFormat : "YYYY MMMM",
            observer : true,
            sendOption : "p",
            //position : [2, 2],
            autoclose : true,
            toolbox : true,
            altField : "#alternateField",
            altFormat : "u",
            altFieldFormatter : function(unix) {
                var pdate = new persianDate(unix);
                pdate.formatPersian
                pdate.formatPersian = false;
                return pdate.format("YYYY-MM-DD");
            },
            onShow : function() {
                //console.log("user config onShow event ")
            },
            onHide : function() {
                //console.log("user config onHide event ")
            },
            onSelect : function(unix) {
               this.hide();
            }
        };
        $(".date").persianDatepicker(options);
        dp = $(".date").data("datepicker");
    });
    $('.mdate').datepicker({format: 'yyyy-mm-dd'});


    $(".deleted").click(function(e){
        e.preventDefault();
        const c_url =  $(this).attr('href');
        $.confirm({
            title: '<span class="bfont text-danger" > هشدار!   </span> ',
            content: '<span class="cfont text-warning" >  ریکارد مورد نظر حذف خواهد شد ؟  </span> ',
            rtl: true,
            closeIcon: true,
            animationBounce: 2, 
            backgroundDismissAnimation: 'glow',
            buttons: {
                 confirm :  {
                    text: '<span class="bfont"> تایید  </span>',
                    btnClass: 'btn-blue',
                    action : function(){
                        window.location = c_url;
                    }
                },
                cancel:  {
                    text:'<span class="bfont"> لغو   </span>',
                    btnClass: 'btn-red',
                    action : function () {
                    }
                }
            }
        });
    });

    $(".noDeleted").click(function() {
        $.alert({
            title:   '<span class="bfont text-danger"  > هشدار!   </span> ',
            content: '<span class="cfont text-warning" >  این اطلاعات قابل حذف نیست ! </span> ',
            closeIcon: true,
            rtl: true,
            buttons:{
                cancel:  {
                    text:'<span class="bfont">  لغو   </span>',
                    btnClass: 'btn-red',
                    action : function () {
                    }
                }
            }
        });
    });

    // for input date to cant type andy key
     $(document).ready(function(){
        $(".date").keypress(false);
        $(".date").keyup(false);
        $(".date").keydown(false);
     });


    function setStart(input_id){
        $("#"+input_id).css("background","#FFF url(img/input-loading.gif) no-repeat center");
    }
    function setStop(input_id){
        $("#"+input_id).css("background","#FFF");
    }


    function is_dublicate(data,type,is_edit = ''){
        if (is_edit == data) {
            $(`#${type}`).hide();
            return;
        }
        //  type == div_id
        $.ajax ({
            url: "ajax_checkDoble_id.php",
            method: "POST" ,
            data: {data,type},
            success:function(data){
                if(data == "true"){
                    $(`#${type}`).show();
                }else{
                    $(`#${type}`).hide();
                }
            }
        });
        }


</script>


// This arrayes contains ID tags to use  for Library 
var tr_row = [
    "k_entrance_exam_id",
    "gender",
    "mother_tongue",
    "graduate",
    "main_province",
    "curr_province",
    "student_faculty1",
    "student_faculty2",
    "student_faculty3",
    "convenient_time",


    "name",
    "en_name",
    "l_name",
    "en_l_name",
    "father_name",
    "en_father_name",
    "g_father_name",
    "en_gfather_name",
    "birthday",
    "birth_location",
    "job",
    "other_language",
    "institute_graduate",
    "school",
    "phone_number",
    "o_phone_number",
    "email",
    "main_village",
    "main_district",
    "curr_village",
    "curr_district",
    "f_name",
    "f_job",
    "f_job_location",
    "f_phone",
    "b_name",
    "b_job",
    "b_job_location",
    "b_phone",

    "u_name",
    "u_job",
    "u_job_location",
    "u_phone",

    "_u_name",
    "_u_job",
    "_u_job_location",
    "_u_phone",

    "genral_number",
    "issuance_location",
    "tome",
    "page",
    "number",

    "p_other",
    "message"
    
    ];

    for (var i = 0; i < tr_row.length ; i++) {
        var data  = $("#"+tr_row[i]).html().trim();  
        $('#'+tr_row[i]).editable({
            url:   'ajax_test.php',  
            params:{id:id,key:tr_row[i],value:data,type:"S-DETAILES"},
            success:function(data){                
                if(data == 2){
                    $("#institute_graduate_school").show();                    
                    $("#institute_graduate_instetut").hide(); 
                    $("#school").html("");
                }else if( data == 3){
                    $("#institute_graduate_school").hide();                    
                    $("#institute_graduate_instetut").show();
                    $("#institute_graduate").html("");
                }  
            }
        });               
    }

    var chickBox  = [
        "in_baner",
        "in_friends",
        "in_borshor",
        "in_tv",
        "in_radio",
        "in_nahad",
        "in_family",
        "in_etafqi",
        "in_student",

        "p_you",
        "p_father",
        "p_mother",
        "p_nahad",

        "p_monthly",
        "p_twovice",
        "p_threetimes",
        "p_discount"

    ];

    for(var i = 0 ; i < chickBox.length ;i++ ){
        test(chickBox[i]);
    } 

    function test(id_c){
        var data  = $("#"+id_c).html().trim();
        $('#'+chickBox[i]).editable({
            url:   'ajax_test.php',  
            params:{id:id,key:id_c,value:data,isChick:1,type:"S-DETAILES"},
            success:function(data){

                if(data  == "4"){
                    $("#"+id_c).attr('class', '');
                    $("#"+id_c).addClass("clip-cancel-circle-2");
                }else{
                    $("#"+id_c).attr('class', '');
                    $("#"+id_c).addClass("clip-checkmark-circle-2");
                }
            }
        });
    }
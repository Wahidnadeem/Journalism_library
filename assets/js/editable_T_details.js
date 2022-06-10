// This arrayes contains ID tags to use  for Library 
  var tr_row = [
    "name_fa",
    "name_en",
    "l_name",
    "l_name_en",
    "father_name",
    "en_father_name",
    "birthday",
    "marital_status",
    "gender",
    "blood_group",

    "phone_number",
    "emaile",
    "date",

    "note",
    "educations",
    "education_degree",

    "work_experience"
];


for (var i = 0; i < tr_row.length ; i++) {
    var data  = $("#"+tr_row[i]).html().trim();  
    $('#'+tr_row[i]).editable({
        url:   'ajax_test.php',  
        params:{id:id,key:tr_row[i],value:data,type:"T-DETAILES"}
    });               
}
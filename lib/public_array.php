<?php


function getTypePayment($type = null){

    $payment_type = [
        "payment"    => 'پرداخت',
        "free"       => 'رایگان',
        "then"       => 'شخص یا نهاد',
        "debt"       => 'قرض',
    ];

    if($type != null)
        return $payment_type[$type];

    return $payment_type ;

}

function getTypeAntSeg($type = null){

    $AntSeg = [
        "sick"                   => 'Sick',
        "lids"                   => 'Lids',
        "conj"                   => 'Conj',
        "cornea"                 => 'Cornea',
        "sclera"                 => 'Sclera',
        "ac"                     => 'AC',
        "lris"                   => 'Lris',
        "pupil"                  => 'Pupil',
        "lens"                   => 'Lens',
        "ocular movements"       => 'Ocular Movements',
    ];

    if($type != null)
        return $AntSeg[$type];

    return $AntSeg ;

}



function getPupil (){
    return ['-','+','1+','2+','3+','4+'];
}


function getDilatationMedicine(){
    return ['T','T+PH','PH','C','H'];
}

function getOpdIndirect(){
    return ['90D','78D','20D','360'];
}


function getAdviceType(){
    return [
        1 => 'دارو' ,
        2 => 'عینک' ,
        3 => 'عملیات' ,
        4 => 'حرکات نرمیشی'
    ];
}


function getRefractionValue(){

    return [
        "vf"                     => 'VF',
        "amsler_grid"            => 'Amsler Grid',
        "cv"                     => 'CV',
        "fbc"                    => 'FBC',
        "rbs"                    => 'Rbs',
        "hbaic"                  => 'HbAic',
        "sx"                     => 'SX',
        "al"                     => 'AL',
        "iol"                    => 'IOL',
    ];
}


function getInsertType(){
    return ['Lids','Conj','Cornea','Selera','AC','Iris','Lens'];
}


    //  function getRefractionValue(){

    //     return [
    //         "vf"                     => 'VF',
    //         "amsler_grid"            => 'Amsler Grid',
    //         "cv"                     => 'CV',
    //         "fbc"                    => 'FBC',
    //         "rbs"                    => 'Rbs',
    //         "hbaic"                  => 'HbAic',
    //         "sx"                     => 'SX',
    //         "al"                     => 'AL',
    //         "iol"                    => 'IOL',
    //     ];
    // }





?>
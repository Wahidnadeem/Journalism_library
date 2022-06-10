
  <?php 
  		require_once("_config.php");
       
		$book_data = $db->prepare('SELECT * FROM books WHERE `is_deleted` =:is_deleted ORDER BY id DESC ');
        $book_data->execute(['is_deleted' => 0]);
 
	    require '../lib/barcode/autoload.php';
	    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();

		if( isset( $_POST['chackbox_select'] ) &&  count($_POST['chackbox_select']) > 0 ){
			
			$output = [];

			foreach( $_POST['chackbox_select'] as $key => $row  ){
				$temp = [];
				$name = selectOne('books',base64_decode($row))['book_name'];
				$temp['name'] = $name;
				$temp['id']   = $row;
				$temp['amount'] = $_POST['amount'][$key];
				array_push($output , $temp);
			}
			
		}else {
			echo ' <h1 > لطفا اول یک کتاب انتخاب کنید  </h1> ';
			exit();
		}


   ?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> چاپ بار کد</title>
  

  <link rel="shortcut icon" href="img/dorsa.png" />
  <link rel="stylesheet" type="text/css" href="../assets/dist/bootstrap/dist/bootstrap.min.css">
  <style type="text/css">
  	@media print{
  		.div-box{
  			width: 200px !important;
  			font-size: 50px !important;
  			margin-left: 4%;
  		}

  	}
  </style>
</head>
<body class=>
  <br>
  <br>

  	<div class="col-md-12" >
  		<div class="row">
  			<?php 
			    
				$count = "1";
				
				if(count($output) > 0 ){

					foreach($output as $row ){

						for ($i=0; $i < $row['amount'] ; $i++) { 

							$bar_code_value = $KEY_BARCODE.$row['id'];

							echo '
							<div class="col-md-6 div-box " style="border:1px dotted lightgray ">
								<div class="table-responsive">
									<table class="table  table-hover" id="sample-table-1" >
										<tr class="active">
											<td class = "text-center"> ' .$generator->getBarcode( $bar_code_value , $generator::TYPE_CODE_128). '<br><br>'.$row['name'].' </td>
										</tr>
									</table>
								</div>	 
							</div>
						';	
						}
					}
				}
 		?>

  		</div>
  	</div>

</body>
</html>
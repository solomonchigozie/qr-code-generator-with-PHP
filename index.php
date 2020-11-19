<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>How to generate QR code using PHP and Ajax | Mitrajit's Tech Blog</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<style>
.post-title { font-size:20px; }
.mtb-margin-top { margin-top: 20px; }
.top-margin { border-bottom:2px solid #ccc; margin-bottom:20px; display:block; font-size:1.3rem; line-height:1.7rem;}
.btn-success {
	cursor:pointer;
}
.qrdiv {
	width: 100%;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	border: 1px solid #000;
	border-radius: 10px;
}
.loading {
	background-image: url('images/loader.gif');
	background-repeat: no-repeat;
	background-position: center;
	width: 100%;
	height: 100%;
}
</style>
</head>



<body>
	<div class="container-fluid mtb-margin-top">
		<div class="row">
			<div class="col-md-12">
				</div>
		</div>
    </div> 


	<div class="container">
		<div class="row">
			<div class="col-md-6 col-6">
		        <form class="form-horizontal" method="POST" id="form" onsubmit="return false">
		            <div class="form-group">
		            	<label class="control-label">Data : </label>
		            	<input class="form-control col-xs-12" name="dataContent" id="dataContent" type="text" value="" required="required">
		            </div>

		            <div class="form-group">
		            	<label class="control-label">ECC : </label>
		            	<select class="form-control col-xs-12" name="ecc" id="ecc">
		            		<option value="H">H - best</option>
		            		<option value="M">M</option>
		            		<option value="Q">Q</option>
		            		<option value="L">L - smallest</option>       		            
		            	</select>
		            </div>

		            <div class="form-group">
		            	<label class="control-label">Size : </label>
		            	<input type="number" min="1" max="10" step="1" class="form-control col-xs-12" name="size" id="size" value="5">
		            </div>

		            <div class="form-group">
		            	<label class="control-label"></label>
		            	<input type="submit" name="submit" id="submit" class="btn btn-success" value="Generate QR">
		            </div>
		        </form>
	    	</div>

	    	<div class="col-md-6 col-6 thumbnail">
	    		<div class="qrdiv loading thumbnail"></div>
	    	</div>
    	</div><!-- .row -->
    </div>


    <script type="text/javascript">
    	$(document).ready(function() {
    		$("#form").submit(function(){
    		    $.ajax({
	    			url:'generate-qr-code.php',
	    			type:'POST',
	    			data: {dataContent:$("#dataContent").val(), ecc:$("#ecc").val(), size:$("#size").val()},
	    			beforeSend: function() {
	    			    $(".qrdiv").addClass('loading');  
	    			},
	    			success: function(resp) {
	    				$(".qrdiv").html(resp);  
	    			},
	    			complete: function() {
	    			    $(".qrdiv").removeClass('loading');  
	    			},
	    		 });
    		});
    	});
    </script>


	
</body>
</html>

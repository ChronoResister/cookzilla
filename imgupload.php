<?php
extract($_REQUEST);
//include('db.php');

$file = $_FILES['image']['name'];

$file=strtolower($file);

$img_format=array('jpg','jpeg','png','gif');

$get_format=explode('.',$file);

list($name, $ext) = $get_format;

if(!$file){
	
	echo '<div class="msg">no file chosen</div>';
	
}else if(in_array($ext,$img_format)) {
	
	move_uploaded_file($_FILES['image']['tmp_name'],"images/".$file);
	
	$sql=mysql_query("insert into images(img) values($file)");
	
	
	echo "<img src='../images/".$file."' class='img' width = '600'><br>";
	echo "../images/".$file."";
	//echo "images/".$file."";

}else{
		
echo '<div class="msg">image format must be jpg, jpeg, png, gif</div>';
	
}

?>
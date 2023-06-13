<?php
if(isset($_POST)){	
	// Variabel pengaturan
	$ThumbSquareSize 		= 150; //Thumbnail will be 150x150
	$ThumbPrefix			= "gbr_"; //Normal thumb Prefix
	$DestinationDirectory	= '../../img/project/'; //specify upload directory ends with / (slash)
	$Quality 				= 100; //jpeg quality
	//check if this is an ajax request
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		die();
	}
	// check $_FILES['ImageFile'] not empty
	if(!isset($_FILES['gambar']) || !is_uploaded_file($_FILES['gambar']['tmp_name'])){
		die('Something wrong with uploaded file, something missing!'); // output error when above checks fail.
	}
	// Random number will be added after image name
	$RandomNumber 	= rand(0, 99999); 
	$ImageName 		= str_replace(' ','-',strtolower($_FILES['gambar']['name'])); //get image name
	$ImageSize 		= $_FILES['gambar']['size']; // get original image size
	$TempSrc	 	= $_FILES['gambar']['tmp_name']; // Temp name of image file stored in PHP tmp folder
	$ImageType	 	= $_FILES['gambar']['type']; //get file type, returns "image/png", image/jpeg, text/plain etc.
	//Let's check allowed $ImageType, we use PHP SWITCH statement here
	switch(strtolower($ImageType)){
		case 'image/png':
			//Create a new image from file 
			$CreatedImage =  imagecreatefrompng($_FILES['gambar']['tmp_name']);
			break;
		case 'image/gif':
			$CreatedImage =  imagecreatefromgif($_FILES['gambar']['tmp_name']);
			break;			
		case 'image/jpeg':
		case 'image/pjpeg':
			$CreatedImage = imagecreatefromjpeg($_FILES['gambar']['tmp_name']);
			break;
		default:
			die('Unsupported File!'); //output error and exit
	}
	//PHP getimagesize() function returns height/width from image file stored in PHP tmp folder.
	//Get first two values from image, width and height. 
	//list assign svalues to $CurWidth,$CurHeight
	list($CurWidth,$CurHeight)=getimagesize($TempSrc);
	//Get file extension from Image name, this will be added after random name
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
  	$ImageExt = str_replace('.','',$ImageExt);
	//remove extension from filename
	$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
	//Construct a new name with random number and extension.
	$NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;
	//set the Destination Image
	$thumb_DestRandImageName 	= $DestinationDirectory.$ThumbPrefix.$NewImageName; //Thumbnail name with destination directory
	// koneksi database
	require('../../config.php');
	koneksi_on();
	//Create a square Thumbnail right after, this time we are using cropImage() function
	if(cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType)){
		// deklarasi
		$id = $_POST['kd'];
		$kdlangkah = $_POST['kode-langkah'];
		$urutan = $_POST['urutan'];
		$kdsolusi = $_POST['kode-solusi'];
		$hpsgambar = $_POST['hpsgambar'];
		$i_nmlangkah = nl2br($_POST['diskripsi']);// utk insert
		$u_nmlangkah = $_POST['diskripsi'];// utk update
		$nmgambar = $ThumbPrefix.$NewImageName;
		// proses tambah data langkah
		if($id == ""){
			mysql_query("INSERT INTO tb_langkah VALUES('$kdlangkah','$i_nmlangkah','$nmgambar','$urutan','$kdsolusi')");
		// proses ubah data langkah dengan ganti gambar
		}else{
			// update data langkah
			if ( mysql_query("UPDATE tb_langkah SET nm_langkah = '$u_nmlangkah', gambar = '$nmgambar', urutan = '$urutan', kd_solusi = '$kdsolusi' WHERE kd_langkah = '$id'")){
				// hapus gambar yang diganti
				$urlgambar = '../../img/project/'.$hpsgambar;
				unlink($urlgambar);
			}
		}
	}else{
		die('Error'); //output error
	}
	koneksi_off();
}
//This function corps image to create exact square images, no matter what its original size!
function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType){	 
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0){
		return false;
	}
	//abeautifulsite.net has excellent article about "Cropping an Image to Make Square bit.ly/1gTwXW9
	if($CurWidth>$CurHeight){
		$y_offset = 0;
		$x_offset = ($CurWidth - $CurHeight) / 2;
		$square_size 	= $CurWidth - ($x_offset * 2);
	}else{
		$x_offset = 0;
		$y_offset = ($CurHeight - $CurWidth) / 2;
		$square_size = $CurHeight - ($y_offset * 2);
	}
	$NewCanves 	= imagecreatetruecolor($iSize, $iSize);	
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size)){
		switch(strtolower($ImageType)){
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	//Destroy image, frees memory	
	if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
	return true;
	}  
}
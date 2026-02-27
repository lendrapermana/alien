<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	function from_session($key)
	{
		$CI =& get_instance();
		$ss = $CI->session->userdata($key);
		return $ss;
	}

	function warning($input,$goTo)
	{
		$url = site_url().'/'.$goTo;
		$output="<script> 
			alert(\"$input\");
			location = '$url';
			</script>";
		return $output;
	}
	
	function generateUsername($namaLengkap)
	{
		// Hilangkan karakter yang bukan huruf, angka, atau spasi
		$nama = preg_replace('/[^a-zA-Z0-9 ]/', '', $namaLengkap);
		// Ubah spasi menjadi titik dan huruf kecil semua
		$username = strtolower(str_replace(' ', '.', $nama));
		return $username;
	}
	
	function file_exists_remote($url)
	{
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		$result = curl_exec($curl);
		$ret = false;
		if ($result !== false)
		{
			$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if($statusCode == 200)
			{
				$ret = true;
			}
		}
		curl_close($curl);
		return $ret;
	}
	
	function fsize($file)
	{
		$a = array("B", "KB", "MB", "GB","TB", "PB");
		$pos = 0;
		$size = filesize($file);
		while ($size >= 1024)
		{
			$size /= 1024;
			$pos++; 
		}
		return round($size,2)." ".$a[$pos];
	}
	
	function compress_image($source_url,$destination_url,$quality)
	{
		$info = getimagesize($source_url);
		
		if($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
		elseif($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
		elseif($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
		
		imagejpeg($image,$destination_url,$quality);
		return $destination_url;
	}
	
	function isMobileDevice()
	{
		return preg_match("/(android|webos|iphone|ipad|ipod|blackberry|windows phone)/i",$_SERVER['HTTP_USER_AGENT']);
	}
?>
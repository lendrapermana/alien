<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
	class Footprint
	{
		var $CI = null;
		function Footprint()
		{
			$this->CI =& get_instance();
			$this->CI->load->database();
		}
		
		function getIpAdress()
		{
			$ip = '';
			if(!empty($_SERVER['HTTP_CLIENT_IP']))
			{
				$ip=$_SERVER['HTTP_CLIENT_IP'];
			}
			elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			{
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			else
			{
				$ip = $_SERVER['REMOTE_ADDR'];
			}
			return $ip;
		}
		
		function getDetailIpAdress($ip_client)
		{
			if($ip_client != '')
			{
				$apiUrl = "http://ip-api.com/json/$ip_client";
				// Lakukan request ke API ip-api
				$response = @file_get_contents($apiUrl);
				// Decode respons JSON
				$data = json_decode($response, true);
				$country = '';
				$city = '';
				$lat = '';
				$lon = '';
				$timezone = '';
				$isp = '';
				$as = '';
				if($data)
				{
					if($data['status'] == 'success')
					{
						$country = $data['country'];
						$city = $data['city'];
						$lat = $data['lat'];
						$lon = $data['lon'];
						$timezone = $data['timezone'];
						$isp = $data['isp'];
						$as = $data['as'].' - API: 1';
					}
					else
					{
						$apiUrl = "https://freegeoip.app/json/$ip_client";
						// Lakukan request ke API FreeGeoIP
						$response = @file_get_contents($apiUrl);
						// Decode respons JSON
						$data = json_decode($response, true);
						if($data)
						{
							$country = $data['country_name'];
							$city = $data['city'];
							$lat = $data['latitude'];
							$lon = $data['longitude'];
							$timezone = $data['time_zone'];
							$isp = '';
							$as = ' - API: 2';
						}
					}
				}
				$detail_ip_client = "Negara: $country - Kota: $city - Lat: $lat - Lon: $lon - Timezone: $timezone - ISP: $isp - as: $as";
			}
			else
			{
				$detail_ip_client = '-';
			}
			return $detail_ip_client;
		}
		
		function getHostnameClient()
		{
			$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			if(!$hostname)
			{
				$hostname = '';
			}
			return $hostname;
		}
		
		function getBrowser()
		{
			$browser = '';
			$useragent = $_SERVER ['HTTP_USER_AGENT'];
			if(strpos($useragent,"Firefox"))
			{
				$browser="Mozilla Firefox";
			}
			else
				if(strpos($useragent,"Chrome"))
				{
					$browser="Google Chrome";
				}
				else
					if(strpos($useragent,"Opera"))
					{
						$browser="Opera";
					}
					else
						if(strpos($useragent,"MSIE"))
						{
							$browser="Internet Explorer";
						}
						else
							if(strpos($useragent,"SeaMonkey"))
							{
								$browser="Sea Monkey";
							}
							else
								if(strpos($useragent,"Flock"))
								{
									$browser="Flock";
								}
								else
									if(strpos($useragent,"Safari"))
									{
										$browser="Safari";
									}
									else
										if(strpos($useragent,"Orca"))
										{
											$browser="Orca";
										}
			return $browser;
		}
		
		function getOs()
		{
			$os = '';
			if (@ereg("Windows NT 5.1", $_SERVER["HTTP_USER_AGENT"])){
				$os="Windows eXPerience(XP)";
			}elseif(@ereg("Windows",$_SERVER["HTTP_USER_AGENT"])){
				$os="Windows"; 
			}elseif((@ereg("Mac",$_SERVER["HTTP_USER_AGENT"]))||(@ereg("PPC",$_SERVER["HTTP_USER_AGENT"]))){
				$os="MacOS";
			}elseif(@ereg("Linux",$_SERVER["HTTP_USER_AGENT"])){
				$os="Linux";
			}elseif(@ereg("FreeBSD",$_SERVER["HTTP_USER_AGENT"])){
				$os="FreeBSD";
			}elseif(@ereg("SunOS",$_SERVER["HTTP_USER_AGENT"])){
				$os="SunOS";
			}elseif(@ereg("IRIX",$_SERVER["HTTP_USER_AGENT"])){
				$os="IRIX";
			}elseif(@ereg("BeOS",$_SERVER["HTTP_USER_AGENT"])){
				$os="BeOS";
			}elseif(@ereg("OS/2",$_SERVER["HTTP_USER_AGENT"])){
				$os="OS/2";
			}elseif(@ereg("AIX",$_SERVER["HTTP_USER_AGENT"])){
				$os="AIX";
			}else{
				$os="Sistem Operasi Belum Dikenal";
			}
			return $os;
		}
		
		function getPerangkat()
		{
			$perangkat = '';
			$mystring = $_SERVER['HTTP_USER_AGENT'];
			$findme   = 'Android';
			$pos = strpos(strtolower($mystring), strtolower($findme));
			$ismobile = false;
			if ($pos !== false)
			{
				$ismobile = true;
			}
			else
			{
				//echo "The string '$findme' was not found in the string '$mystring'";
			}
			$findme   = 'iPhone';
			$pos = strpos(strtolower($mystring), strtolower($findme));
			if ($pos !== false)
			{
				$ismobile = true;
			}
			$findme   = 'Mobile Safari';
			$pos = strpos(strtolower($mystring), strtolower($findme));
			if ($pos !== false)
			{
				$ismobile = true;
			}
			$findme   = 'Blackberry';
			$pos = strpos(strtolower($mystring), strtolower($findme));
			if ($pos !== false)
			{
				$ismobile = true;
			}
			$findme   = 'MeeGo';
			$pos = strpos(strtolower($mystring), strtolower($findme));
			if ($pos !== false)
			{
				$ismobile = true;
			}
			if ($ismobile == true)
			{
				$perangkat = "Mobile";
			}
			else
			{
				$perangkat = "Desktop";
			}
			return $perangkat;
		}
		
		function getPerangkatDetail()
		{
			$perangkatDetail = '';
			$mystring = $_SERVER['HTTP_USER_AGENT'];
			$findme   = 'Android';
			$pos = strpos(strtolower($mystring), strtolower($findme));
			$perangkatDetail = '';
			if ($pos !== false)
			{
				$perangkatDetail = $findme;
			}
			else
			{
				//echo "The string '$findme' was not found in the string '$mystring'";
				$findme   = 'iPhone';
				$pos = strpos(strtolower($mystring), strtolower($findme));
				if ($pos !== false)
				{
					$perangkatDetail = $findme;
				}
				else
				{
					$findme   = 'Mobile Safari';
					$pos = strpos(strtolower($mystring), strtolower($findme));
					if ($pos !== false)
					{
						$perangkatDetail = $findme;
					}
					else
					{
						$findme   = 'Blackberry';
						$pos = strpos(strtolower($mystring), strtolower($findme));
						if ($pos !== false)
						{
							$perangkatDetail = $findme;
						}
						else
						{
							$findme   = 'MeeGo';
							$pos = strpos(strtolower($mystring), strtolower($findme));
							if ($pos !== false)
							{
								$perangkatDetail = $findme;
							}
							else
							{
								$perangkatDetail = "Not Listed";
							}
						}
					}
				}
			}
			return $perangkatDetail;
		}
		
		function getVersiOs()
		{
			$mystring = $_SERVER['HTTP_USER_AGENT'];
			$word1 = explode("(", $mystring);
			$word2 = explode(")", @$word1[1]);
			$word3 = explode("; ", @$word2[0]);
			if(@$word3[1] == null)
			{
				$versiOS = '';
			}
			else
			{
				$versiOS = @$word3[1];
			}
			return $versiOS;
		}
		
		function getMerek()
		{
			$mystring = $_SERVER['HTTP_USER_AGENT'];
			$word1 = explode("(", $mystring);
			$word2 = explode(")", $word1[1]);
			$word3 = explode("; ", $word2[0]);
			if(@$word3[2] == null)
			{
				$merek = '';
			}
			else
			{
				$merek = @$word3[2];
			}
			return $merek;
		}
		
		function getMacAddress()
		{
			$_HASIL = '';
			$_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
			$_PERINTAH = "arp -a $_IP_ADDRESS";
			ob_start();
			system($_PERINTAH);
			$_HASIL = ob_get_contents();
			ob_clean();
			$_PECAH = strstr($_HASIL, $_IP_ADDRESS);
			$_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
			$_HASIL = substr(@$_PECAH_STRING[1], 0, 17);
			
			if($_HASIL == '')
			{
				ob_start();
				system("ipconfig /all");
				$mycom = ob_get_contents();
				ob_clean();
				$findme = "Wireless LAN adapter Wi-Fi";
				$pmac = strpos($mycom, $findme);
				$mac = substr($mycom,($pmac+197),17);
				$_HASIL = $mac;
			}
			return strtoupper($_HASIL);
		}
	}
?>
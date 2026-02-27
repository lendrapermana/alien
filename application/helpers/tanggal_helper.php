<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
	if(!function_exists('tgl_indo'))
	{
		function tgl_indo($tgl)
		{
			$ubah = gmdate($tgl, time()+60*60*8);
			$pecah = explode("-",$ubah);
			$tanggal = $pecah[2];
			$bulan = bulan_singkat($pecah[1]);
			$tahun = $pecah[0];
			return $tanggal.' '.$bulan.' '.$tahun;
		}
	}
	
	if(!function_exists('tgl_singkat_eng'))
	{
		function tgl_eng($tgl)
		{
			$ubah = gmdate($tgl, time()+60*60*8);
			$pecah = explode("-",$ubah);
			$tanggal = @$pecah[2];
			$bulan = bulan_eng(@$pecah[1]);
			$tahun = $pecah[0];
			return $tanggal.' '.$bulan.' '.$tahun;
		}
	}
	
	if(!function_exists('tgl_singkat_eng'))
	{
		function tgl_singkat_eng($tgl)
		{
			$ubah = gmdate($tgl, time()+60*60*8);
			$pecah = explode("-",$ubah);
			$tanggal = @$pecah[2];
			$bulan = bulan_singkat_eng(@$pecah[1]);
			$tahun = $pecah[0];
			return $tanggal.' '.$bulan.' '.$tahun;
		}
	}
	
	if(!function_exists('bulan_eng'))
	{
		function bulan_eng($bulan_eng)
		{
			switch ($bulan_eng)
			{
				case 1:
					return "January";
					break;
				case 2:
					return "February";
					break;
				case 3:
					return "March";
					break;
				case 4:
					return "April";
					break;
				case 5:
					return "May";
					break;
				case 6:
					return "June";
					break;
				case 7:
					return "July";
					break;
				case 8:
					return "August";
					break;
				case 9:
					return "September";
					break;
				case 10:
					return "October";
					break;
				case 11:
					return "November";
					break;
				case 12:
					return "December";
					break;
			}
		}
	}
	
	if(!function_exists('bulan_singkat_eng'))
	{
		function bulan_singkat_eng($bulan_singkat_eng)
		{
			switch ($bulan_singkat_eng)
			{
				case 1:
					return "Jan";
					break;
				case 2:
					return "Feb";
					break;
				case 3:
					return "Mar";
					break;
				case 4:
					return "Apr";
					break;
				case 5:
					return "May";
					break;
				case 6:
					return "Jun";
					break;
				case 7:
					return "Jul";
					break;
				case 8:
					return "Aug";
					break;
				case 9:
					return "Sep";
					break;
				case 10:
					return "Oct";
					break;
				case 11:
					return "Nov";
					break;
				case 12:
					return "Dec";
					break;
			}
		}
	}
	
	if(!function_exists('bulan'))
	{
		function bulan($bln)
		{
			switch ($bln)
			{
				case 1:
					return "Januari";
					break;
				case 2:
					return "Februari";
					break;
				case 3:
					return "Maret";
					break;
				case 4:
					return "April";
					break;
				case 5:
					return "Mei";
					break;
				case 6:
					return "Juni";
					break;
				case 7:
					return "Juli";
					break;
				case 8:
					return "Agustus";
					break;
				case 9:
					return "September";
					break;
				case 10:
					return "Oktober";
					break;
				case 11:
					return "November";
					break;
				case 12:
					return "Desember";
					break;
			}
		}
	}
	
	if(!function_exists('bulan_singkat'))
	{
		function bulan_singkat($bln)
		{
			switch ($bln)
			{
				case 1:
					return "Jan";
					break;
				case 2:
					return "Feb";
					break;
				case 3:
					return "Mar";
					break;
				case 4:
					return "Apr";
					break;
				case 5:
					return "May";
					break;
				case 6:
					return "Jun";
					break;
				case 7:
					return "Jul";
					break;
				case 8:
					return "Agu";
					break;
				case 9:
					return "Sep";
					break;
				case 10:
					return "Okt";
					break;
				case 11:
					return "Nov";
					break;
				case 12:
					return "Des";
					break;
			}
		}
	}

	if(!function_exists('nama_hari'))
	{
		function nama_hari($tanggal)
		{
			$ubah = gmdate($tanggal, time()+60*60*8);
			$pecah = explode("-",$ubah);
			$tgl = $pecah[2];
			$bln = $pecah[1];
			$thn = $pecah[0];

			$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
			$nama_hari = "";
			if($nama=="Sunday") {$nama_hari="Minggu";}
			else if($nama=="Monday") {$nama_hari="Senin";}
			else if($nama=="Tuesday") {$nama_hari="Selasa";}
			else if($nama=="Wednesday") {$nama_hari="Rabu";}
			else if($nama=="Thursday") {$nama_hari="Kamis";}
			else if($nama=="Friday") {$nama_hari="Jumat";}
			else if($nama=="Saturday") {$nama_hari="Sabtu";}
			return $nama_hari;
		}
	}

	if(!function_exists('nama_hari_eng'))
	{
		function nama_hari_eng($tanggal)
		{
			$ubah = gmdate($tanggal, time()+60*60*8);
			$pecah = explode("-",$ubah);
			$tgl = $pecah[2];
			$bln = $pecah[1];
			$thn = $pecah[0];
			
			$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
			$nama_hari = "";
			if($nama=="Sunday") {$nama_hari="Sun";}
			else if($nama=="Monday") {$nama_hari="Mon";}
			else if($nama=="Tuesday") {$nama_hari="Tue";}
			else if($nama=="Wednesday") {$nama_hari="Wed";}
			else if($nama=="Thursday") {$nama_hari="Thu";}
			else if($nama=="Friday") {$nama_hari="Fri";}
			else if($nama=="Saturday") {$nama_hari="Sat";}
			return $nama_hari;
		}
	}

	if(!function_exists('day_name'))
	{
		function day_name($tanggal)
		{
			$ubah = gmdate($tanggal, time()+60*60*8);
			$pecah = explode("-",$ubah);
			$tgl = $pecah[2];
			$bln = $pecah[1];
			$thn = $pecah[0];

			$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
			return $nama;
		}
	}
	
	if(!function_exists('jumlah_hari'))
	{
		function jumlah_hari($bulan = 0, $tahun = '')
		{
			if($bulan < 1 OR $bulan > 12)
			{
				return 0;
			}
			if(!is_numeric($tahun) OR strlen($tahun) != 4)
			{
				$tahun = date('Y');
			}
			if($bulan == 2)
			{
				if($tahun % 400 == 0 OR ($tahun % 4 == 0 AND $tahun % 100 != 0))
				{
					return 29;
				}
			}
			$jumlah_hari    = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
			return $jumlah_hari[$bulan - 1];
		}
	}
	
	if(!function_exists('time_ago'))
	{
		function time_ago($datetime)
		{
			// Pastikan $datetime adalah format yang valid
			if(!$datetime) return '';
			$timestamp = strtotime($datetime);
			if(!$timestamp) return '';
			$diff = time() - $timestamp;
			// Jika waktu di masa depan
			if($diff < 0)
			{
				return 'in the future';
			}
			// Definisi waktu dalam detik
			$seconds = $diff;
			$minutes = floor($seconds / 60);
			$hours   = floor($seconds / 3600);
			$days    = floor($seconds / 86400);
			$weeks   = floor($seconds / 604800);
			$months  = floor($seconds / 2592000);
			$years   = floor($seconds / 31536000);
			if ($seconds < 60) {
				return 'just now';
			} elseif ($minutes < 60) {
				return $minutes == 1 ? 'a minute ago' : $minutes . ' minutes ago';
			} elseif ($hours < 24) {
				return $hours == 1 ? 'an hour ago' : $hours . ' hours ago';
			} elseif ($days < 7) {
				return $days == 1 ? 'yesterday' : $days . ' days ago';
			} elseif ($weeks < 4) {
				return $weeks == 1 ? 'a week ago' : $weeks . ' weeks ago';
			} elseif ($months < 12) {
				return $months == 1 ? 'a month ago' : $months . ' months ago';
			} else {
				return $years == 1 ? 'a year ago' : $years . ' years ago';
			}
		}
	}
	
	if(!function_exists('hitung_mundur'))
	{
		function hitung_mundur($wkt)
		{
			$waktu=array(	365*24*60*60	=> "tahun",
							30*24*60*60		=> "bulan",
							7*24*60*60		=> "minggu",
							24*60*60		=> "hari",
							60*60			=> "jam",
							60				=> "menit",
							1				=> "detik");
			$hitung = strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt;
			$hasil = array();
			if($hitung<5)
			{
				$hasil = 'kurang dari 5 detik yang lalu';
			}
			else
			{
				$stop = 0;
				foreach($waktu as $periode => $satuan)
				{
					if($stop>=6 || ($stop>0 && $periode<60)) break;
					$bagi = floor($hitung/$periode);
					if($bagi > 0)
					{
						$hasil[] = $bagi.' '.$satuan;
						$hitung -= $bagi*$periode;
						$stop++;
					}
					else if($stop>0) $stop++;
				}
				$hasil=implode(' ',$hasil).' yang lalu';
			}
			return $hasil;
		}
	}
	
	if(!function_exists('hitungHari'))
	{
		function hitungHari($awal,$akhir)
		{
			$tglAwal = strtotime($awal);
			$tglAkhir = strtotime($akhir);
			$jeda = abs($tglAkhir - $tglAwal);
			return floor($jeda/(60*60*24));
		}
	}
	
	if(!function_exists('name_month_to_number'))
	{
		function name_month_to_number($name_month_to_number)
		{
			if($name_month_to_number == "Jan") { return "01"; }
			if($name_month_to_number == "Feb") { return "02"; }
			if($name_month_to_number == "Mar") { return "03"; }
			if($name_month_to_number == "Apr") { return "04"; }
			if($name_month_to_number == "May") { return "05"; }
			if($name_month_to_number == "Jun") { return "06"; }
			if($name_month_to_number == "Jul") { return "07"; }
			if($name_month_to_number == "Aug") { return "08"; }
			if($name_month_to_number == "Sep") { return "09"; }
			if($name_month_to_number == "Oct") { return "10"; }
			if($name_month_to_number == "Nov") { return "11"; }
			if($name_month_to_number == "Dec") { return "12"; }
		}
	}
	
	if(!function_exists('selisih_jam_menit'))
	{
		function selisih_jam_menit($jam_masuk,$jam_keluar)
		{
			list($h,$m,$s) = explode(":",$jam_masuk);
			$dtAwal = mktime($h,$m,$s,"1","1","1");
			list($h,$m,$s) = explode(":",$jam_keluar);
			$dtAkhir = mktime($h,$m,$s,"1","1","1");
			$dtSelisih = $dtAkhir - $dtAwal;
			
			$totalmenit = $dtSelisih/60;
			$jam = explode(".",$totalmenit/60);
			$sisamenit = ($totalmenit/60)-$jam[0];
			$sisamenit2 = round($sisamenit*60);
			
			return "$jam[0] hours $sisamenit2 minutes";
		}
	}
	
	if(!function_exists('selisih_jam'))
	{
		function selisih_jam($jam_masuk,$jam_keluar)
		{
			list($h,$m,$s) = explode(":",$jam_masuk);
			$dtAwal = mktime($h,$m,$s,"1","1","1");
			list($h,$m,$s) = explode(":",$jam_keluar);
			$dtAkhir = mktime($h,$m,$s,"1","1","1");
			$dtSelisih = $dtAkhir - $dtAwal;
			
			$totalmenit = $dtSelisih/60;
			$jam = explode(".",$totalmenit/60);
			$sisamenit = ($totalmenit/60)-$jam[0];
			$sisamenit2 = round($sisamenit*60);
			
			return "$jam[0]";
		}
	}
	
	if(!function_exists('selisih_menit'))
	{
		function selisih_menit($jam_masuk,$jam_keluar)
		{
			list($h,$m,$s) = explode(":",$jam_masuk);
			$dtAwal = mktime($h,$m,$s,"1","1","1");
			list($h,$m,$s) = explode(":",$jam_keluar);
			$dtAkhir = mktime($h,$m,$s,"1","1","1");
			$dtSelisih = $dtAkhir - $dtAwal;
			
			$totalmenit = $dtSelisih/60;
			$jam = explode(".",$totalmenit/60);
			$sisamenit = ($totalmenit/60)-$jam[0];
			$sisamenit2 = round($sisamenit*60);
			
			return $totalmenit;
		}
	}
	
	if(!function_exists('konversi_i_h_i_s'))
	{
		function konversi_i_h_i_s($jumlah_detik)
		{
			$sj = 3600;
			$sm = 60;
			
			$J = $jumlah_detik % $sj;
			$SJam = $jumlah_detik - $J;
			$Jam = $SJam / $sj;
			
			$M = $J % $sm;
			$SMenit = $J - $M;
			$Menit = $SMenit / $sm;

			$Detik = $M;
			
			$hasil = "$Jam jam $Menit menit $Detik detik";
			
			return $hasil;
		}
	}
	
	if(!function_exists('konversi_i_h_i'))
	{
		function konversi_i_h_i($jumlah_menit)
		{
			$sm = 60;
			
			$J = $jumlah_menit % $sm;
			$SJam = $jumlah_menit - $J;
			$Jam = $SJam / $sm;
			
			$Menit = $J % $sm;
			
			$hasil = "$Jam jam $Menit menit";
			
			return $hasil;
		}
	}
?>
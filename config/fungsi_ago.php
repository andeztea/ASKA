<?php
function relative_format($time)
{
	// ubah format input menjadi unix time
	$unix_time = strtotime($time);
	// simpan waktu sekarang
	$now = time();

	// hitung perbedaan waktu input dan waktu sekarang (satuan detik)
	$time_diff = $now - $unix_time;

	switch (TRUE) {
		case ($unix_time > strtotime('-1 min', $now)):
			// waktu input tidak sampai 1 menit yang lalu
			$relative_time = 'Beberapa waktu yang lalu';
			break;
		case ($unix_time > strtotime('-1 hour', $now)):
			// waktu input antara 1 menit - 1 jam yang lalu
			$relative_time = floor($time_diff / 60) . ' menit yang lalu';
			break;
		case ($unix_time > strtotime('-1 day', $now)):
			// waktu input antara 1 jam - 1 hari yang lalu
			$relative_time = floor($time_diff / 60 / 60) . ' jam yang lalu';
			break;
		default:
			// waktu input lebih dari 1 hari yang lalu
			$relative_time = 'Beberapa hari yang lalu';
	}

	return $relative_time;
}
?>
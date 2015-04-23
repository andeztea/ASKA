var t, day, minute, second;
var daynumber, monthnumber, monthday, year;
var hari, bulan;
window.onload =function() {
	//start jam
	var sec =document.getElementById('the-time');
	sec.timer =setInterval(function(){jam()},1000);
}

function jam(){
	if(t != null) t=null;
	t = new Date();
	hour = t.getHours(); // Jumlah jam (0-23)
	minute = t.getMinutes(); // Jumlah menit (0-59)
	second = t.getSeconds(); // Jumlah detik (0-59)
	daynumber = t.getDay();
	monthnumber = t.getMonth(); // Jumlah bulan (0-11)
	monthday = t.getDate(); // Hari dari bulan (0-31)
	year = t.getFullYear();
	//jam
	if(hour < 10) hour ='0'+hour;
	if(minute < 10) minute ='0'+minute;
	if(second < 10) second ='0'+second;
	//hari
	hari = getTheDay(daynumber);
	//bulan
	bulan = getTheMonth(monthnumber);
	
	document.getElementById('the-time').innerHTML=hour+':'+minute+':'+second;
	document.getElementById('the-day').innerHTML= hari+', ' +monthday+' '+bulan+' '+year;
}

function getTheDay(num){
	if(num == 1) return 'Senin';
	else if(num == 2) return 'Selasa';
	else if(num == 3) return 'Rabu';
	else if(num == 4) return 'Kamis';
	else if(num == 5) return 'Jumat';
	else if(num == 6) return 'Sabtu';
	else if(num == 0) return 'Minggu';
}

function getTheMonth(num){
	if(num == 0) return 'Januari';
	else if(num == 1) return 'Februari';
	else if(num == 2) return 'Maret';
	else if(num == 3) return 'April';
	else if(num == 4) return 'Mei';
	else if(num == 5) return 'Juni';
	else if(num == 6) return 'Juli';
	else if(num == 7) return 'Agustus';
	else if(num ==8) return 'September';
	else if(num == 9) return 'Oktober';
	else if(num == 10) return 'November';
	else if(num == 11) return 'Desember';
}
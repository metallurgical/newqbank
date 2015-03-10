function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu');
        h = date.getHours();
		m = date.getMinutes();
		s = date.getSeconds();
		sesi='AM';
		if (h > 12 ) { 
			sesi='PM';
			h=h-12; }

		if (h == 0 ) { h=12; }
		
        result = ''+days[day]+', '+d+' '+months[month]+' '+year+' - '+h+':'+m+':'+s+' '+sesi;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}


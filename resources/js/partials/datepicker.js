import 'jquery-ui/ui/widgets/datepicker.js';

let date = new Date();
date.setFullYear(date.getFullYear() - 18);
$("#datepicker").datepicker({
	changeYear: true,
	changeMonth: true,
	dateFormat: 'dd-mm-yy',
	yearRange: '-100:',
	maxDate: date,
	// monthNamesShort: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"]
	monthNamesShort: ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"]
});
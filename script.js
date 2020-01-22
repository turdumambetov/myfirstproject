function Selected(a) {
	var label = a.value;
	if (label=='3-й моляр') {
		document.getElementById("Label1").style.display='inline-block';
		document.getElementById("Label2").style.display='none';
		document.getElementById("Label3").style.display='none';
		
	} else if (label==2) {
		document.getElementById("Label1").style.display='none';
		document.getElementById("Label2").style.display='block';
		document.getElementById("Label3").style.display='none';
		
	} else if (label==3) {
		document.getElementById("Label1").style.display='none';
		document.getElementById("Label2").style.display='none';
		document.getElementById("Label3").style.display='block';
		
	} else {
		document.getElementById("Label1").style.display='none';
		document.getElementById("Label2").style.display='none';
		document.getElementById("Label3").style.display='none';
	}
	
}

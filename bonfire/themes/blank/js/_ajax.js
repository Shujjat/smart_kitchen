/*function getBatches()
{
	var department_id=document.getElementById('department_id').value;
	var program_id=document.getElementById('program_id').value;
	var program_id=2;
	var department_id=1;
	var semester_no=document.getElementById('semester_no').value;
	//alert(program_id);
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("batches").innerHTML=xmlhttp.responseText;
		
		}
		
	  }
	xmlhttp.open("GET","http://site_url().'/'.SITE_AREA/ims/index.php/admin/content/batches/get_batches_drop_down/"+"/"+department_id+"/"+program_id+"/"+semester_no,true);
	xmlhttp.send();
}



function getSemesters()
{
	
	var program_id=document.getElementById('program_id').value;
	alert(program_id);
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("semesters").innerHTML=xmlhttp.responseText;
		
		}
		
	  }
	xmlhttp.open("GET","http://site_url().'/'.SITE_AREA/ims/index.php/admin/content/programs/get_semesters_drop_down/"+program_id,true);
	xmlhttp.send();
}*/
$("#program_id").change(function() {

var program_id = $("#program_id :selected").val();
       
    $.ajax({

        type: "POST",
        url : "http://site_url().'/'.SITE_AREA/ims/index.php/admin/content/programs/get_semesters_drop_down/"+program_id,
        
		
        success: function(msg){
            $('#semesters').html(msg);
        }
    });
});

$("#department_id").change(function() {

var department_id = $("#department_id :selected").val();

       
    $.ajax({

        type: "POST",
        url : "http://site_url().'/'.SITE_AREA/ims/index.php/admin/content/programs/get_programs_drop_down/"+department_id,
        
		
        success: function(msg){
            $('#programs').html(msg);
        }
    });
});


/*
function getDepartments(campusId)
{
	alert(campusId);

/*function getPrograms()
{
	var department_id=document.getElementById('department_id').value;
//	alert(department_id);
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("programs").innerHTML=xmlhttp.responseText;
		//document.getElementById("contacts").innerHTML='SS';
		}
		
	  }
	xmlhttp.open("GET","http://site_url().'/'.SITE_AREA/ims/index.php/admin/content/programs/get_programs_drop_down/"+department_id,true);
	xmlhttp.send();
}

	
	var count=document.getElementById("count").value;
	count=Number(count)+1;
	document.getElementById("count").value=count;
	//alert();
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("departments").innerHTML=document.getElementById("departments").innerHTML+xmlhttp.responseText;
		//document.getElementById("contacts").innerHTML='SS';
		}
		
	  }
	xmlhttp.open("GET","http://site_url().'/'.SITE_AREA/ims/index.php/admin/content/students/contact_form/"+count,true);
	xmlhttp.send();
}


function addMoreContact()
{
	
	var count=document.getElementById("count").value;
	count=Number(count)+1;
	document.getElementById("count").value=count;
	//alert();
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("contacts").innerHTML=document.getElementById("contacts").innerHTML+xmlhttp.responseText;
		//document.getElementById("contacts").innerHTML='SS';
		}
		
	  }
	xmlhttp.open("GET","http://site_url().'/'.SITE_AREA/ims/index.php/admin/content/students/contact_form/"+count,true);
	xmlhttp.send();
}


*/

// JavaScript Document
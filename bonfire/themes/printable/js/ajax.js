$(document).ready(function(){
// hide parent search and registration divs
$('#search-parents, #register-parents').css('display', 'none');

// Parents Options Selection
	$('#parents-options').change(function(){
		// on option change, hide everything
		$('#search-parents, #register-parents').css('display', 'none');

		switch ($(this).val())
		{
			case 'search_parents':
				$('#search-parents').css('display', 'block');
				break;
			case 'register_parents':
				$('#register-parents').css('display', 'block');
				break;
		}
	});
	
$("#campus_id").change(function() {
    
	var campus_id = $("#campus_id :selected").val();   
    $.ajax({

        type: "POST",
        url : "http://ims.waysall.com/index.php/admin/content/departments/get_departments_dropdown/"+campus_id,
        success: function(msg){
          
            $('#department_id').html(msg);
        }
    });
});

$("#department_id").change(function() {

var department_id = $("#department_id :selected").val();

       
    $.ajax({

        type: "POST",
        url : "http://ims.waysall.com/index.php/admin/content/programs/get_programs_drop_down/"+department_id,
        
		
        success: function(msg){
            $('#program_id').html(msg);
        }
    });
});
	
$("#program_id").change(function() {
	var program_id = $("#program_id :selected").val();   
    $.ajax({

        type: "POST",
        url : "http://ims.waysall.com/index.php/admin/content/programs/get_semesters_drop_down/"+program_id,
        
		
        success: function(msg){
            $('#semester_id').html(msg);
        }
    });
});

$("#semester_id").change(function() {

var department_id = $("#department_id :selected").val();
var program_id = $("#program_id :selected").val();
var semester_id = $("#semester_id :selected").val();

       
    $.ajax({

        type: "POST",
        url : "http://ims.waysall.com/index.php/admin/content/batches/get_batches_drop_down/"+department_id+"/"+program_id+"/"+semester_id,
        
		
        success: function(msg){
            $('#batch_id').html(msg);
        }
    });
});


$("#batch_id").change(function() {
var program_id = $("#program_id :selected").val();
var semester_id = $("#semester_id :selected").val();

       
    $.ajax({

        type: "POST",
        url : "http://ims.waysall.com/index.php/admin/content/courses/get_courses_drop_down/"+program_id+"/"+semester_id,
        
		
        success: function(msg){
            $('#course_id').html(msg);
        }
    });
});

});



function addMoreContact()
{

	var count=document.getElementById("count").value;
	count=Number(count)+1;
	document.getElementById("count").value=count;
    count=document.getElementById("count").value;

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
		document.getElementById("student_contact_"+count).innerHTML=xmlhttp.responseText;
          //document.getElementById("contacts").innerHTML=count;      
		
		}
		
	  }
	xmlhttp.open("GET","http://ims.waysall.com/index.php/admin/content/students/contact_form/"+count,true);
	xmlhttp.send();
}

var script = document.createElement('script');
script.src = 'http://code.jquery.com/jquery-1.11.0.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);


function hostName()
{
    var hostname=window.location.hostname;
    
    if(hostname=='localhost' || hostname=='127.0.0.1')
    {
        return 'http://'+hostname+'/smart_kitchen';
    }
    else 
    {
        return 'http://'+hostname+'/';  
    }
    
    
}
function    getInstituteType()
{
    $.ajax({

        
        url : hostName()+"/index.php/admin/content/institutes/get_institute_type/",
        success: function(msg)
        {
            delay()    
            
            
        },
        
               
    });
    
}
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

 

$("#campus_id").change(function() 
{
    
  	var campus_id = $("#campus_id :selected").val();
       
    $.ajax({

        type: "POST",
        url : hostName()+"/index.php/admin/content/departments/get_departments_dropdown/"+campus_id,
        success: function(msg){
          
            $('#department_id').html(msg);
            
        }
    });
});

$("#department_id").change(function() {

var department_id = $("#department_id :selected").val();

       
    $.ajax({

        type: "POST",
        url : hostName()+"/index.php/admin/content/programs/get_programs_drop_down/"+department_id,
        
		
        success: function(msg){
            $('#program_id').html(msg);
        }
    });
});
	 
$("#program_id").change(function() {
    
	var program_id = $("#program_id :selected").val();   
    var department_id = $("#department_id :selected").val();
    $.ajax({

        
        url : hostName()+"/index.php/admin/content/institutes/get_institute_type/",
        success: function(msg)
        {
            if(msg=='university')
            {
                $.ajax({
        
                type: "POST",
                
                 url : hostName()+"/index.php/admin/content/programs/get_semesters_drop_down/"+program_id,
                
        		
                success: function(msg){
                    $('#semester_id').html(msg);
                    
                }
            });
            }
            else
            {
                $.ajax({
        
                type: "POST",
                 url : hostName()+"/index.php/admin/content/batches/get_batches_drop_down/"+department_id+"/"+program_id+"/"+1,
                // url : hostName()+"/index.php/admin/content/programs/get_semesters_drop_down/"+program_id,
                
        		
                success: function(msg){
                    //$('#semester_id').html(msg);
                     $('#batch_id').html(msg);
                }
            });    
            }
      
            
            
        },
        
               
    });
    
});

$("#semester_id").change(function() {

var department_id = $("#department_id :selected").val();
var program_id = $("#program_id :selected").val();
var semester_id = $("#semester_id :selected").val();

       
    $.ajax({

        type: "POST",
        url : hostName()+"/index.php/admin/content/batches/get_batches_drop_down/"+department_id+"/"+program_id+"/"+semester_id,
        
		
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
        url : hostName()+"/index.php/admin/content/courses/get_courses_drop_down/"+program_id+"/"+semester_id,
        
		
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
		 // alert("student_contact_"+count);
		document.getElementById("student_contact_"+count).innerHTML=xmlhttp.responseText;
          //document.getElementById("contacts").innerHTML=count;      
		
		}
		
	  }
	xmlhttp.open("GET",hostName()+"/index.php/admin/content/students/contact_form/"+count,true);
	xmlhttp.send();
}

function cssClassChanger()
{
    elements=document.getElementsByTagName("input")
    for (i = 0; i < elements.length; i++) 
    {
        //alert(elements[i].id);
        if(elements[i].id!='')
        {
            document.getElementById(elements[i].id).setAttribute("class","form-control input-sm");    
        }
        
    }
    elements=document.getElementsByTagName("select")
    for (i = 0; i < elements.length; i++) 
    {
      //  alert(elements[i].id);
        if(elements[i].id!='')
        {
            document.getElementById(elements[i].id).setAttribute("class","form-control");    
        }
        
    }
    elements=document.getElementsByTagName("textarea")
    for (i = 0; i < elements.length; i++) 
    {
        alert(elements[i].id);
        if(elements[i].id!='')
        {
            document.getElementById(elements[i].id).setAttribute("class","form-control");    
        }
        
    }
    
}
function cssClassChanger()
{
    elements=document.getElementsByTagName("input")
    for (i = 0; i < elements.length; i++) 
    {
       // alert(elements[i].name);
        
        if(elements[i].name!='' && elements[i].type=='text')
        {
           // document.getElementById(elements[i].id).setAttribute("class","form-control input-sm");
            document.getElementsByName(elements[i].name)[0].className="form-control input-sm";    
        }
        
    }
    elements=document.getElementsByTagName("select")
    for (i = 0; i < elements.length; i++) 
    {
       
        if(elements[i].name!='' )
        {
          //  alert(elements[i].name);
            document.getElementsByName(elements[i].name)[0].className="form-control";
        }
        
    }
    elements=document.getElementsByTagName("textarea")
    for (i = 0; i < elements.length; i++) 
    {
        //alert(elements[i].id);
        if(elements[i].name!='' )
        {
          //  alert(elements[i].name);
            document.getElementsByName(elements[i].name)[0].className="form-control";
        }
        
    }
    elements=document.getElementsByTagName("div")
    for (i = 0; i < elements.length; i++) 
    {
        //alert(elements[i].id);
        if(elements[i].getAttribute('class') == "alert alert-block alert-error fade in ")
        {
          
            elements[i].setAttribute('class','callout callout-danger');
        }
        
        
    }
    elements=document.getElementsByTagName("span")
    for (i = 0; i < elements.length; i++) 
    {
        //alert(elements[i].id);
        if(elements[i].getAttribute('class') == "help-inline")
        {
          
            elements[i].setAttribute('class','callout callout-danger');
        }
        
    }
    
}

function    sendCAPTCHA()
{
    
    $.ajax({
        method: "POST",
        url: hostName()+'/index.php/security/print_new_captcha_code'
    })
  .done(function( response ) {
    if ( console && console.log ) {
        
        $( "#ddd" ).val(response);
        $( "#captchaMessage" ).val('See your mobile phone to receive the code.');
        
        $( "#getCaptchaCodeButton" ).val('Resend Authentication Code');
    }
  });
}
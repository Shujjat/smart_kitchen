var myClarifaiApiKey = '5bbc8d3558e84dcb872ae05841839219';
var myWolframAppId = 'L8XY4P-TH5XGPTKUV';

var app = new Clarifai.App({apiKey: myClarifaiApiKey});

/*
  Purpose: Pass information to other helper functions after a user clicks 'Predict'
  Args:
    value - Actual filename or URL
    source - 'url' or 'file'
*/
function predict_click(value, source) 
{
    
    
  var preview = $(".food-photo");
  var file    = document.querySelector("input[type=file]").files[0];
  var loader  = "https://s3.amazonaws.com/static.mlh.io/icons/loading.svg";
  var reader  = new FileReader();

  // load local file picture
  reader.addEventListener("load", function () {
    preview.attr('style', 'background-image: url("' + reader.result + '");');
    
    doPredict({ base64: reader.result.split("base64,")[1] });
  }, false);

  if (file) {
    reader.readAsDataURL(file);
    $('#concepts').html('<img src="' + loader + '" class="loading" />');
  } else {  ("Please select an image of food to proceed!"); }
}

/*
  Purpose: Does a v2 prediction based on user input
  Args:
    value - Either {url : urlValue} or { base64 : base64Value }
*/
function doPredict(value) 
{
  app.models.predict(Clarifai.FOOD_MODEL, value).then(function(response) 
  {
      if(response.rawData.outputs[0].data.hasOwnProperty("concepts")) 
      {
        var url;
        var i,j;
        var key;
        var descriptions;
        dishID=document.getElementById('dishId').value;
        
        for(i=0;i<=response.rawData.outputs[0].data['concepts'].length;i++)
        {
            document.getElementById('loader').style.visibility="visible";
            document.getElementById('loader-text').style.visibility="visible";
            if((response.rawData.outputs[0].data['concepts'][i].value >= 0.70)==true)
            {
               
               description=JSON.stringify(response.rawData.outputs[0].data['concepts'][i].name);
                
               description=description.substr(1);
              
               description=description.substr(0,description.length-1);
               if((typeof description === 'undefined'))
               {
                     
               }
               else
               {
                descriptions=descriptions+','+description;
               }
               if(window.location.hostname=='127.0.0.1')
               {
                    
                    curl='http://'+window.location.hostname+'/smart_kitchen/index.php/admin/content/dishes/edit/'+dishID+'/'+descriptions;
               } 
               else
               {
                    curl='http://'+window.location.hostname+'/index.php/admin/content/dishes/edit/'+dishID+'/'+descriptions; 
               }
              
               document.getElementById('dish').action=curl;
               
                
            }
            else
            {
               
                break;
            }
       
        }   
        
         
        
      }
        
      document.getElementById('dish').submit();    
    }, 
  
  );
}

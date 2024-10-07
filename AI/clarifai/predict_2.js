var myClarifaiApiKey = '5bbc8d3558e84dcb872ae05841839219';
var myWolframAppId = 'L8XY4P-TH5XGPTKUV';

var app = new Clarifai.App({apiKey: myClarifaiApiKey});

/*
  Purpose: Pass information to other helper functions after a user clicks 'Predict'
  Args:
    value - Actual filename or URL
    source - 'url' or 'file'
*/
function predict_click(value, source) {
    
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
  app.models.predict(Clarifai.FOOD_MODEL, value).then(function(response) {
      if(response.rawData.outputs[0].data.hasOwnProperty("concepts")) 
      {
        var url;
        var i,j;
        var key;
        dishID=document.getElementById('dishId').value;
        for(i=1;i<=30;i++)
        {
            if(response.rawData.outputs[0].data['concepts'][i].value>0.85)
            {
               curl='https://api.nal.usda.gov/fdc/v1/foods/search?api_key=GBgxor4DCsCEQIe9B9EMwKyqiCeAFlumenJ0dP13&query='+JSON.stringify(response.rawData.outputs[0].data['concepts'][i].name);
               alert(curl);
               break;
               var xhttp = new XMLHttpRequest();
               xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) 
               {
                   jsonResponse= JSON.parse( this.responseText);
                   //for(j=1;j<=(Object.keys(jsonResponse['foods'])).length;j++)
                  // for(j=1;j<=(65);j++)
                    j=1;
                    {
                        //for(k=0;k<Object.keys(jsonResponse['foods'][j]['foodNutrients']).length;k++)
                        for(k=0;k<=65;k++)
                        {
                            
                            
                            nutrientName=((jsonResponse['foods'][j]['foodNutrients'][k]['nutrientName']));
                            if(true)
                            {
                                nutrientNumber=(jsonResponse['foods'][j]['foodNutrients'][k]['nutrientNumber']);
                                unitName=((jsonResponse['foods'][j]['foodNutrients'][k]['unitName']));
                                nutrientValue=((jsonResponse['foods'][j]['foodNutrients'][k]['value']));
                                
                                curl='http://127.0.0.1/smart_kitchen/index.php/admin/content/dishes/save_ingredient/'+dishID+'/'+nutrientName+'_'+nutrientValue+'__'+unitName+'/'+nutrientNumber;
                                curl=curl.replace(/\s/g, '');
                               
                               var xxhttp = new XMLHttpRequest();
                               xxhttp.onreadystatechange = function() {
                               if (this.readyState == 4 && this.status == 200) 
                               {
                                  
                                    
                                }
                                else
                                {
                                   
                                    document.getElementById('loader').style.visibility="visible";
                                   
                                }
                              }
                              xxhttp.open("GET", curl, true);
                              xxhttp.send(); 
                            }
                            
                          
                        }
                           
                    }
                    location.reload();
                    
                    
                }
                else
                {
                   
                    document.getElementById('loader').style.visibility="visible";
                }
              }
              xhttp.open("GET", curl, true);
              xhttp.send();
               
                
            }
            
        }
        
        var tag = response.rawData.outputs[0].data.concepts[0].name;
        var url = 'http://api.wolframalpha.com/v2/query?input='+tag+'%20nutrition%20facts&appid='+myWolframAppId;

        getNutritionalInfo(url, function (result) {
          $('#concepts').html('<h3>'+ tag + '</h3>' + "<img src='"+result+"'>");
        });
      }
    
    document.getElementById('loader').style.display = "none";    
    }, 
  function(err) { console.log(err); }
  );
}

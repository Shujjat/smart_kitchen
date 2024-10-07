<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://sdk.clarifai.com/js/clarifai-latest.js"></script>
<script type="text/javascript" src="https://s3.amazonaws.com/static.mlh.io/blog-code/2018-02-clarifai-nutrition-app/wolfram.js"></script>
<script type="text/javascript" src="<?php echo HOST.'AI/clarifai/'?>predict.js"></script>

<style>

* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}


body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 5%;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($dishes) ) {
    $dishes = (array)$dishes;
}
$id = isset($dishes['id']) ? $dishes['id'] : '';

?>
   
<?php echo form_open($this->uri->uri_string(), 'id="dish" class="form-horizontal" enctype="multipart/form-data"'); ?>
    <input type="hidden" id="predictions" name="description"  />
    <p id="aa"></p>
    <div class="col-md-12">
              <div class="box box-primary box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $id==''?'New Dish':$dishes['name'];?></h3>
    
                  <div class="box-tools pull-right">
                    
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-body table-responsive no-padding">
                    <input name="dish_id" id="dishId" value="<?php echo $id ;?>" type="hidden" />
                  <table class="table table-hover">
                    <tbody>
                       
                        
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Images</th>
                      <th>Serving Size</th>
                      <th>Cooking Time</th>
                    </tr>
                    <tr>
                      <td>D-<?php echo $id;?></td>
                      <td>
                      <div class="control-group <?php echo form_error('name') ? 'error' : ''; ?>">
                       
                        <div class='controls'>
                            <input id="name" placeholder="Name of Dish" type="text" name="name" maxlength="100" value="<?php echo  $dishes['name'] ; ?>"  />
                            <span class="help-inline"><?php echo form_error('name'); ?></span>
                            <?php
                            if($id!='')
                            { 
                            ?>
                                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=dish_<?php echo $id;?>&choe=UTF-8" height="50" width="50"  /> 
                            <?php
                            }
                            ?>
                        </div>
                    </td>
                    
                      <td>
                      
                      <?php
                      if($this->uri->segment(4)=='edit')
                      {
                      
                      ?>
                      <img src="<?php echo $this->dishes_model->get_images_web_directory($id); ?>"  height="100" width="100"  />
                      <input type="file" name="images[]" id="image" class="btn btn-default btn-sm" onchange="predict_click($('#image').val(), 'file'); return false;" multiple />
                        Upload Image, Only JPG
                        <br />
                        
                        <a class="btn btn-block btn-xs btn-danger" id="removeIngredients"  href="<?php echo HOST.'index.php/admin/content/dishes/empty_ingredients/'.$id;?>"  name="remove_ingredients"  type="button" >Remove Ingredients</a>
                        <!--
                            <input class="btn btn-block btn-default btn-xs btn-success" id="fetchIngredients" onclick="predict_click($('#image').val(), 'file'); return false;"  name="fetch_ingredients" value="Fetch Ingredients" type="button" />
                        
                            <input class="btn btn-block btn-default btn-xs btn-primary" id="submitButton" type="submit" name="submit_button" value="Save" />
                           
                            <span class="btn btn-danger btn-sm"  id="myBtn">Images</span>  
                        -->
                        <p  id="loader" class="spinner-border text-danger" style="visibility: hidden;" > </p>
                        <p  id="loader-text"  style="visibility: hidden;" >Please wait, the page will save your work automatically. </p>
                                            
                        <?php
                        }
                        ?>
                            <div id="myModal" class="modal">
                            
                              <!-- Modal content -->
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">X</span></button>
                                    <h4 class="modal-title">Default Modal</h4>
                                  </div>
                                  <div class="modal-body">
                                    <h2>Images of <?php echo $dishes['name']?> <?php echo $host;?></h2>
                                        <p></p>
                                        
                                        <div class="slideshow-container">
                                        
                                        <?php
                                        $images=$this->dishes_model->list_all_images($id);
                                        
                                        
                                        foreach($images as $image)
                                        {
                                            
                                        
                                        ?>
                                        <div class="mySlides fade">
                                          <div class="numbertext"></div>
                                          <img  src="<?php echo $this->dishes_model->get_images_upload_loaction().'/'.$image;?>" style="width:100%; height: 75%;" />
                                          <div class="text">
                                          </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                       
                                        
                                        </div>
                                        <br />
                                        
                                        <div style="text-align:center">
                                          <?php
                                          for($count=2;$count<=count($images);++$count)
                                          {
                                            ?><span class="dot"></span> <?php  
                                          }
                                          ?>
                                          <span class="dot"></span> 
                                          
                                        </div>
                            
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                            
                            </div>
                            
                      
                      
                      
                      </td>
                      
                      
                      
                      <td>
                          <div class='controls'>
                            <input id="serving_size"  placeholder="No of Servings" type="text" name="serving_size" maxlength="11" value="<?php echo $dishes['serving_size']; ?>"  />
                            <span class="help-inline"><?php echo form_error('serving_size'); ?></span>
                          </div> Persons
                      </td>
                      <td>
                        <input id="cooking_time" placeholder="Time to cook the dish" type="text" name="cooking_time" maxlength="11" value="<?php echo $dishes['cooking_time']; ?>"  />
                        <span class="help-inline"><?php echo form_error('cooking_time'); ?></span> 
                        Min
                      </td>
                    </tr>
                    
                  </tbody>
                  
                  </table>
                  
                  <table class="table table-hover">
                    <caption><strong>Nutritional Facts</strong></caption>
                    <tbody>
                    <tr><td>#</td><td>Name</td><td>Quantity/Unit</td></tr>
                    <?php 
                    if($ingredients!='')
                    {
                        for($i=1;$i<=$ingredients->num_rows();$i++)
                        {
                            if($id!='')
                            {
                                $ingredient=$ingredients->result();
                                $ingredient=$ingredient[$i-1];
                                $ingredient_id=$ingredient->id;
                                $ingredient_name=$ingredient->ingredient;
                                $ingredient_quantity=$ingredient->quantity;
                                $ingredient_unit=$ingredient->unit;
                                $control_identifier=$i.'_'.$ingredient_id;
                            }
                            else
                            {
                                $control_identifier=$i;
                            }
                        ?>
                        <tr>
                          <td><?php echo $i;?></td>  
                          <td>
                          <?php
                          $fq_control_identifier='ingredient_'.$control_identifier;
                          if($this->input->post($fq_control_identifier))
                          {
                                $value=$this->input->post($fq_control_identifier);
                          }
                          else
                          {
                                $value=$ingredient_name;
                          }
                          ?>
                          <input id="<?php echo $fq_control_identifier;?>" name="<?php echo $fq_control_identifier;?>"   type="text"  value="<?php echo set_value($fq_control_identifier, $value); ?>"  />
                          <?php
                          if($this->auth->has_permission('Dishes.Content.RemoveIngredient'))
                          {
                              ?>
                              Remove
                              <span class="fa fa-times" onclick="removeIngredients(<?php echo $ingredient_id; ?>)"></span>
                             <!-- <input type="checkbox" class="form-control" name="remove_[<?php echo $ingredient_id;?>]" /> -->
                              <?php
                          }
                          ?>
                          <!--
                          Approve
                          <span class="fa fa-check" onclick="approve_ingredients(<?php echo $ingredient_id; ?>)"></span>
                          <input type="checkbox" class="form-control" name="approve_[<?php echo $ingredient_id;?>]" />
                          -->
                          </td>
                          <td>
                          
                            <?php
                              $fq_control_identifier='ingredient_quantity_'.$control_identifier;
                              if($this->input->post($fq_control_identifier))
                              {
                                    $value=$this->input->post($fq_control_identifier);
                              }
                              else
                              {
                                    $value=$ingredient_quantity;
                              }
                              ?>
                            <input id="<?php echo $fq_control_identifier;?>" name="<?php echo $fq_control_identifier;?>"   type="text"  value="<?php echo set_value('$fq_control_identifier', $value); ?>"  /> 
                            <?php 
                            $units=$this->dishes_model->get_units();
                            $fq_control_identifier='ingredient_unit_'.$control_identifier;
                            if($this->input->post($fq_control_identifier))
                            {
                                $value=$this->input->post($fq_control_identifier);
                            }
                            else
                            {
                                $value=$ingredient_unit;
                            }
                            
                            
                            echo form_dropdown('ingredient_unit_'.$control_identifier,$units,$value,'','','',FALSE);
                            ?>
                            
                            
                          </td>
                          <td>
                            
                          </td>
                          
                          
                          
                        </tr>
                        <?php
                        }
                    }
                    ?>
                    <tr>
                        <td>Remarks</td>
                        <td colspan="3">
                        <textarea name="remarks" style="width: 70%;" ><?php echo $dishes['remarks'];?></textarea>
                        
                        </td>
                    </tr>
                    <tr>
                        
                        <td colspan="4">
                            <input class="btn btn-block btn-default btn-xs btn-primary" id="submitButton" type="submit" name="submit_button" value="Save" />
                            
                        </td>
                    </tr>
                    
                    
                    
                  </tbody>
                  
                  </table>
                  
                  
                  
                  
                </div>
                </div>
                <!-- /.box-body -->
                
              </div>
          <!-- /.box -->
        </div>
    
    
                    
    <?php echo form_close(); ?>
    
    






<script>
function    empty_ingredients()
{
    dishID=document.getElementById('dishId').value;
    
    if(window.location.hostname=='127.0.0.1')
    {
        curl=window.location.hostname+'/smart_kitchen/index.php/admin/content/dishes/empty_ingredients/'+dishID;
    }
    else
    {
        curl=window.location.hostname+'/index.php/admin/content/dishes/empty_ingredients/'+dishID;    
    }
    alert(curl);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            document.getElementById('aa').innerHTML=this.responseText;
           alert('All ingredients removed');
           
           //location.reload();
            
            
        }
        
    }
    xhttp.open("GET", curl, true);
    xhttp.send();
}

function    removeIngredients(id)
{
   
    curl=hostName()+'index.php/admin/content/dishes/remove_ingredient/'+id;
                     
    var xxhttp = new XMLHttpRequest();
    xxhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
           alert('The selected ingredient is removed.');
           location.reload();

            
        }
    }
    xxhttp.open("GET", curl, true);
    xxhttp.send();
}




</script>

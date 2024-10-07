<?php
if($this->uri->segment(1)=='' and !$this->auth->is_logged_in())
{
    Template::redirect(site_url().'/login');
}
?>

<div class="modal fade" id="dishes" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Manage Dishes</h4>
        </div>
        <div class="modal-body center">
            <?php
            if($this->auth->has_permission('Dishes.Content.Create'))
            {
            ?>
            
                <a class="btn btn-app bg-maroon" href="<?php echo HOST.'index.php/admin/content/dishes/create';?>">
                    <i class="fa fa-plus "></i> New Dish
                </a>
            <?php
            }
           if($this->auth->has_permission('Items.Content.View'))
           {
            ?>
                <a class="btn btn-app bg-maroon" href="<?php echo ''.HOST.'index.php/admin/content/dishes/' ?>">
                    <i class="fa fa-list"></i>  View All
                </a>
            <?php
            }
            
           ?>
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  
</div>
<div class="modal fade" id="users" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Manage Users</h4>
        </div>
        <div class="modal-body center">
            <?php
            if($this->auth->has_permission('Dishes.Content.Create') or 1)
            {
            ?>
            
                <a class="btn btn-app bg-maroon" href="<?php echo HOST.'index.php/admin/settings/users/';?>">
                    <i class="fa fa-plus "></i> Users
                </a>
            <?php
            }
           if($this->auth->has_permission('Items.Content.View') or 1)
           {
            ?>
                <a class="btn btn-app bg-maroon" href="<?php echo ''.HOST.'index.php/admin/settings/roles/' ?>">
                    <i class="fa fa-list"></i>  Roles
                </a>
            <?php
            }
            
           ?>
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  
</div>

    <div class="row">
        <div class="col-md-12">
            
            <div class="box box-solid box-info">
                <div class="box-header">
                    <h3 class="box-title">Today at Smart Kitchen</h3>
                   
                </div>
                
            </div>
        </div>
    </div>
    <div class="row">
         
            <div class="col-md-2">
                
                <div class="box box-solid box-success">
                    <div class="box-header">
                        <h3 class="box-title">Orders</h3>
                        
                        
                    </div>
                    <div class="box-body">
                        
                        <code>New:20</code>
                        <code>Approved:15</code>
                       
                        
                        
                    </div>
                </div>
            </div>
        
    
    </div>


<div class="row">
    <div class="col-md-12">
        
        <div class="box box-solid box-info">
            <div class="box-header">
                <h3 class="box-title">Let's do something awesome</h3>
               
            </div>
            
        </div>
    </div>
</div>


<?php

?>
<div class="row">
    <?php
    
    if($this->auth->has_permission('Dishes.Content.View'))
    {
    ?>
    <div class="col-lg-3 col-xs-6">
        
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                   Dishes
                </h3>
                <p>
                    Food and Nutritional Facts
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <?php echo anchor('#','Dive In <i class="fa fa-arrow-circle-right"></i>','data-toggle="modal" data-target="#dishes" class="small-box-footer"')?>
            
        </div>
    
    
    
    </div>
    <?php
    }
    ?>
    
    
    
    <?php
    
    if($this->auth->has_permission('Dishes.Content.View') or 1)
    {
    ?>
    <div class="col-lg-3 col-xs-6">
        
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                   Users
                </h3>
                <p>
                    Roles, Permissions and Users
                </p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <?php echo anchor(SITE_AREA.'/settings/roles','Dive In <i class="fa fa-arrow-circle-right"></i>','data-toggle="modal" data-target="#users" class="small-box-footer"')?>
            
        </div>
    
    
    
    </div>
    <?php
    }
    ?>

</div>
  </head>
  <body>
    
  </body>
</html>


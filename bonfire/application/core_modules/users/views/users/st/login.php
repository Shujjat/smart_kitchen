<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="<?php echo HOST;?>/bonfire/application/core_modules/users/views/users/st/css/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


	<title>
        <?php echo $this->settings_lib->item('site.title') ?>
    </title>
</head>
<style type="text/css">
	
body {
  background: #f2f2f2;
}
.container {
  padding: 0 20px;
}
.sub-container {
  max-width: 470px;
  width: 100%;
  height: 300px;
  margin: 150px auto 0;
  display: flex;
  background: #fff;
  box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.50);
  border-radius: 12px;
  overflow: hidden;
}
.banner-img{
	height: 300px;
	/*width: 100%;*/

	
}
.banner-img img{
	margin-top: 60px;
	height: 120px;
	width: 120px;

}
.form{
background-color: yellowgreen;
	height:300px; 
}
.title{
	color: white;
	margin-top: 5%;
	margin-left: 5%;
}
.input{
	color: white;
	border-bottom: 2px solid white;
	margin-top: 20px;
	width: 200px;
}
.input input{
	border:none;
	outline: none;
	background: none;
	color: white
}
.Remember{
	color: white;
	margin-top: 20px;
	margin-left: 15px;
}
.submit button{
	width: 150px;
	border-radius: 30px;
	line-height: 15px;
	margin-top: 10px;
	margin-left: 40px;
}
.register{
	color: white;
	font-size: 10px;
	margin-left: 10px;
	margin-top: 5px;
}
.register a{
	text-decoration: none;
	color: black;
}
.register a:hover{
	color: gray;
} 

.btn-submit
{
    background-color: green;
}
@media only screen and (max-width: 992px) {
 .banner-img{
	height: 100%;
	width: 100%;
	
}
.banner-img img{
	margin-top: 60px;
	height: 120px;
	width: 120px;
}
}
@media only screen and (max-width: 768px) {
 .banner-img{
	height: 100%;
	width: 100%;
	
}
.banner-img img{
	margin-top: 10px;
	margin-left: 22%;
	height: 120px;
	width: 120px;
	margin-bottom: 20px;

}
.form{

	width: 100%;
	background-color: yellowgreen;
	height:300px; 
	float: right;
}
.sub-container {
  max-width: 650px;
  width: 100%;
  overflow: hidden;
  height: 430px;
  margin: 150px auto 0;
  display: flex;
  background: #fff;
  box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.50);
  border-radius: 12px;

}

}
@media only screen and (max-width: 1024px) {
 .banner-img{
	height: 100%;
	width: 100%;
	
}
.banner-img img{
	margin-top: 3%;
	margin-left: 30%;
	height: 120px;
	width: 120px;
	margin-bottom: 20px;

}
.form{

	width: 100%;
	background-color: yellowgreen;
	height:530px; 
	
}
.sub-container {
  max-width: 650px;
  width: 100%;
  overflow: hidden;
  height: 530px;
  margin: 150px auto 0;
  display: flex;
  background: #fff;
  box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.50);
  border-radius: 12px;

}
}


</style>
<body>
<div class="container">
    
	<div class="sub-container">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 banner-img">
					<img src="<?php echo HOST;?>/bonfire/application/core_modules/users/views/users/logo.png">
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 form">
					<div class="container ">
					<h4 class="title"> Log in</h4>
    				<?php
                    
                    echo form_open('login', array('class' => "form-horizontal", 'autocomplete' => 'off')); 
                    ?>
					<div class="input">
						<i class="fa fa-user" aria-hidden="true"></i>
						<input class="form-control" type="text" name="login" id="login_value" value="<?php echo set_value('login'); ?>" tabindex="1" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') .'/'. lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>" />
					</div>
					<div class="input">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input class="form-control" type="password" name="password" id="password" value="" tabindex="2" placeholder="<?php echo lang('bf_password'); ?>" />
					</div>
					<div class="Remember">
                       <!--
                        <input type="checkbox" name="remember_me" id="remember_me" value="1" tabindex="3" />
                        -->
					<div class="submit">
						<button class="btn btn-submit btn-block" style="" type="submit" name="submit" id="submit" value="Let Me In" tabindex="5" >Sign me in</button>
					</div>
				</form>
				
				</div>
				</div>
		</div>
		</div>
	</div>
</div>


</body>
</html>
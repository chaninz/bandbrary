<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>

	<?php $this->load->view('header'); ?>  
	<style>
	.col-md-6 {
		margin-top: 100px;
	}
	</style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div id="login-form-full" class="ui form segment">
					<h2 id="login-hea-text">Bandbrary Login</h2>
					<p/>
					<div class="line"></div>
					<p/>
	<form method="post" action="<?php echo base_url().'login'; ?>">
  <div class="field">
    <label>Username</label>
    <div class="ui left labeled icon input">
      <input type="text" placeholder="Username" name="username">
      <i class="user icon"></i>
      <div class="ui corner label">
        <i class="icon asterisk"></i>
      </div>
    </div>
  </div>
  <div class="field">
    <label>Password</label>
    <div class="ui left labeled icon input">
      <input type="password" placeholder="Password" type="password">
      <i class="lock icon"></i>
      <div class="ui corner label">
        <i class="icon asterisk"></i>
      </div>
    </div>
  </div>
  <div class="ui error message">
    <div class="header">We noticed some issues</div>
  </div>
  <div><input type="submit" ckass="ui red submit button" value="Login" /></div>
</div>
</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

	<?php $this->load->view('footer'); ?>
</body>
</html>
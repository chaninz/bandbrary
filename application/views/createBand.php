<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ui form segment">
          <div class="field">
            <label>Band Name</label>
              <input type="text" placeholder="Band Name" name="name" required>
          </div>
          <div class="field">
            <label>Biography</label>
            <textarea></textarea>
          </div>
          <div class="field">
            <label>Style</label>
            <div class="grouped inline fields">
              <div class="field">
                <div class="ui checkbox">
                  <input type="checkbox" value="blues" name="style">
                  <label>Blues</label>
                </div>
              </div>
              <div class="field">
                <div class="ui checkbox">
                  <input type="checkbox" value="country" name="style">
                  <label>Country</label>
                </div>
              </div>
              <div class="field">
                <div class="ui checkbox">
                  <input type="checkbox" value="hiphop" name="style">
                  <label>Hip Hop</label>
                </div>
              </div>
              <div class="field">
                <div class="ui checkbox">
                  <input type="checkbox" value="jazz" name="style">
                  <label>Jazz</label>
                </div>
              </div>
              <div class="field">
                <div class="ui checkbox">
                  <input type="checkbox" value="latin" name="style">
                  <label>Latin</label>
                </div>
              </div>
              <div class="field">
                <div class="ui checkbox">
                  <input type="checkbox" value="pop" name="style">
                  <label>Pop</label>
                </div>
              </div>
              <div class="field">
                <div class="ui checkbox">
                  <input type="checkbox" value="reggae" name="style">
                  <label>Reggae</label>
                </div>
              </div>
              <div class="field">
                <div class="ui checkbox">
                  <input type="checkbox" value="rnb" name="style">
                  <label>R&B</label>
                </div>
              </div>
              <div class="field">
                <div class="ui checkbox">
                  <input type="checkbox" value="rock" name="style">
                  <label>Rock</label>
                </div>
              </div>
            </div>
          </div>
          <div class="field">
            <label>Facebook URL</label>
            <div class="ui left labeled icon input">
              <input type="text" placeholder="Facebook URL" name="fburl">
              <i class="facebook icon"></i>
            </div>
          </div>
          <div class="field">
            <label>Twitter URL</label>
            <div class="ui left labeled icon input">
              <input type="text" placeholder="Twitter URL" name="twurl">
              <i class="twitter icon"></i>
            </div>
          </div>
          <div class="field">
            <label>Youtube URL</label>
            <div class="ui left labeled icon input">
              <input type="text" placeholder="Youtube URL" name="yturl">
              <i class="youtube icon"></i>
            </div>
          </div>
        </div>
      </div>

	<?php $this->load->view('footer'); ?>

</body>
</html>
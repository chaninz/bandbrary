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
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form action="<?php echo base_url().'band/create'; ?>" method="post" > 
        <div class="ui form segment">
          <div class="field">
            <label>Band Name</label>
            <input type="text" placeholder="Band Name" name="name" required>
          </div>
          <div class="field">
            <label>Biography</label>
            <textarea name="biography"></textarea>
          </div>
          <div class="field">
            <label>Province</label>
            <div class="ui labeled icon input">
              <div class="ui fluid selection dropdown">

                <div class="text">Select</div>
                <i class="dropdown icon"></i>
                <input type="hidden" name="province">
                <div class="menu">
                  <div class="item" data-value="10" style="font-size: 14px;">Bangkok</div>
                  <div class="item" data-value="36" style="font-size: 14px;">Chaiyaphum</div>
                  <div class="item" data-value="50" style="font-size: 14px;">Chiang Mai</div>
                </div>
                <div class="ui corner label">
                  <i class="icon asterisk"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="field">
            <label>Style</label>
            <div class="grouped inline fields">
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="1" name="style">
                  <label>Blues</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="2" name="style">
                  <label>Country</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="3" name="style">
                  <label>Electronic</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="4" name="style">
                  <label>Hip Hop</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="5" name="style">
                  <label>Jazz</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="6" name="style">
                  <label>Latin</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="7" name="style">
                  <label>Pop</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="8" name="style">
                  <label>Reggae</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="9" name="style">
                  <label>R&B</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="10" name="style">
                  <label>Rock</label>
                </div>
              </div>
            </div>
          </div>
          <div class="field">
            <label>Your Position</label>
            <div class="grouped inline fields">
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="1" name="position">
                  <label>Vocal</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="2" name="position">
                  <label>Guitar</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="3" name="position">
                  <label>Bass</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="4" name="position">
                  <label>Drum</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="5" name="position">
                  <label>Piano</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="6" name="position">
                  <label>Keyboard</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="7" name="position">
                  <label>Saxophone</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="8" name="position">
                  <label>Trumpets</label>
                </div>
              </div>
              <div class="field">
                <div class="ui radio checkbox">
                  <input type="radio" value="9" name="position">
                  <label>Violin</label>
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
          <input class="ui red submit button" type="submit" value="Submit">
        </div>
      </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  <?php $this->load->view('footer'); ?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bandbrary</title>

  <link href="<?php echo base_url()."assets/bootstrap/dist/css/bootstrap.min.css";?>" rel="stylesheet">
  <link href="../semantic/packaged/css/semantic.min.css" rel="stylesheet">

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
<script type="text/javascript">
</script>
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <!-- Step 1 -->
        <div class="ui form segment">
          <div class="field">
            <label>Username</label>
            <div class="ui left labeled icon input">
              <input type="text" placeholder="Username">
              <i class="user icon"></i>
            </div>
          </div>
          <div class="field">
            <label>Password</label>
            <div class="ui left labeled icon input">
              <input type="password" placeholder="Password">
              <i class="lock icon"></i>
            </div>
          </div>
          <div class="field">
            <label>Confirm Password</label>
            <div class="ui left labeled icon input">
              <input type="password" placeholder="Confirm Password">
              <i class="lock icon"></i>
            </div>
          </div>
          <div class="field">
            <label>Email address</label>
            <div class="ui left labeled icon input">
              <input type="text" placeholder="Email address">
              <i class="mail icon"></i>
            </div>
          </div>
          <div class="ui red submit button">Next</div>
        </div>
        <div class="ui three steps">
          <div class="ui active step">
            Step 1
          </div>
          <div class="ui disabled step">
            Step 2
          </div>
          <div class="ui disabled step">
            Step 3
          </div>
        </div> 
         <!-- End Step 1 -->
      </div>
      <div class="col-md-3"></div>
    </div>
    <p><br>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
           <!-- Step 1 -->
          <div class="ui form segment">
            <div class="two fields">
              <div class="field">
                <label>First Name</label>
                <input placeholder="First Name" type="text">
              </div>
              <div class="field">
                <label>Last Name</label>
                <input placeholder="Last Name" type="text">
              </div>
            </div>
            <div class="field">
              <label>Province</label>
              <div class="ui fluid selection dropdown">
                <div class="text">Select</div>
                <i class="dropdown icon"></i>
                <input type="hidden" name="province">
                <div class="menu">
                  <div class="item" data-value="bangkok" style="font-size: 14px;">Bangkok</div>
                  <div class="item" data-value="changmai" style="font-size: 14px;">Changmai</div>
                </div>
              </div>
            </div>
            <div class="field">
              <label>Biography</label>
              <textarea></textarea>
            </div>
            <div class="field">
              <label>Facebook URL</label>
              <div class="ui left labeled icon input">
                <input type="text" placeholder="Facebook URL">
                <i class="facebook icon"></i>
              </div>
            </div>
            <div class="field">
              <label>Twitter URL</label>
              <div class="ui left labeled icon input">
                <input type="text" placeholder="Twitter URL">
                <i class="twitter icon"></i>
              </div>
            </div>
            <div class="field">
              <label>Youtube URL</label>
              <div class="ui left labeled icon input">
                <input type="text" placeholder="Youtube URL">
                <i class="youtube icon"></i>
              </div>
            </div>
            <div class="ui red submit button">Next</div>
          </div>
          <div class="ui three steps">
            <div class="ui disabled step">
              Step 1
            </div>
            <div class="ui active step">
              Step 2
            </div>
            <div class="ui disabled step">
              Step 3
            </div>
          </div>
           <!-- End Step 2 -->
        </div>
        <div class="col-md-3"></div>
      </div>
      <p><br>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
             <!-- Step 3 -->
            <div class="ui form segment">
              <div class="field">
                <label>Member Type</label>
                <div class="grouped inline fields">
                  <div class="field">
                    <div class="ui slider checkbox">
                      <input type="radio" name="fruit">
                      <label>Audience</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui slider checkbox">
                      <input type="radio" name="fruit">
                      <label>Musician</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field">
                <label>Style</label>
                <div class="grouped inline fields">
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="blues">
                      <label>Blues</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="country">
                      <label>Country</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="hiphop">
                      <label>Hip Hop</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="jazz">
                      <label>Jazz</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="latin">
                      <label>Latin</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="pop">
                      <label>Pop</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="reggae">
                      <label>Reggae</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="rnb">
                      <label>R&B</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="rock">
                      <label>Rock</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field">
                <label>Skill</label>
                <div class="grouped inline fields">
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="vocal">
                      <label>Vocal</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="guitar">
                      <label>Guitar</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="bass">
                      <label>Bass</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="drum">
                      <label>Drum</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="piano">
                      <label>Piano</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="keyboard">
                      <label>Keyboard</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="saxophone">
                      <label>Saxophone</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="trumpets">
                      <label>Trumpets</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" name="violin">
                      <label>Violin</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ui red submit button">Submit</div>
            </div>
            <div class="ui three steps">
              <div class="ui disabled step">
                Step 1
              </div>
              <div class="ui disabled step">
                Step 2
              </div>
              <div class="ui active step">
                Step 3
              </div>
            </div>
             <!-- End Step 3 -->
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </div> 
  </div>
</div>
</div>

<script src="../js/bandbrary.js"></script>
<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../semantic/packaged/javascript/semantic.min.js"></script>
<script>
$('.ui.dropdown')
.dropdown()
;
$('.ui.checkbox')
.checkbox()
;
</script>

</body>
</html>
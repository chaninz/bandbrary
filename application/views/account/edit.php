<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandbrary</title>
    <?php $this->load->view('header'); ?>  

</head>
<style>
.col-md-3 {
    float: left;
    height: 1280px;
    background-color: #f7f7f7;
    border-left: 1px solid #C0C0C0;
    border-right: 1px solid #C0C0C0;
    -webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
    -moz-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
    box-shadow: 0 1px 0px rgba(0,0,0,0.05);
    background-color: #F7F6F6 ;
    padding-left: 0px;
    padding-right: 0px;
}
.col-md-7 {
    padding-left: 0px;
    padding-right: 0px;
    border: 0px solid #FFFFFF;
}
.container {
    background-color: #FFFFFF;
    -webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
    box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
}
.ui.vertical.menu {
    width: 29rem;
    border-radius: 0px;
}
.ui.vertical.menu > .active.item {
    box-shadow: 0em 0 0 inset;
}
.ui.vertical.pointing.menu > .active.item:after {
    border-top: 0px;
    border-right: 0px;
    border-left: 1px solid #C0C0C0;;
    margin-top: -.4em;
    left: 28.9rem;
}
.ui.pointing.menu > .active.item:after {
    background-color: #FFFFFF;
    width: .8em;
    height: .8em;
}
.ui.menu {
    background-color: #F7F6F6;
}
.ui.menu .item {
    font-size: 1.5rem;
    padding: 1em 1em;
}
.ui.menu:first-child {
    margin-top: 3rem;
}
.ui.form.segment{
    -webkit-box-shadow: none;
    box-shadow: none;
}
.line {
    width: 750px;
}
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="ui vertical pointing menu">
                    <a class="active item">
                        Edit profile
                    </a>
                    <form action="<?php echo base_url().'account/edit'; ?>" method="post"/>  
                        <a class="item" href="changePassword.html">
                            <i class="angle right icon"></i> Change password
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="ui form segment">
                        <p/>
                        <h1>Edit Profile</h1>
                        <div class="line"></div>
                        <br/><p/>
                        <div class="field">
                            <label>Username</label>
                            <div class="ui left labeled icon input">
                                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" readonly>
                                <i class="user icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <label>Email address</label>
                            <div class="ui left labeled icon input">
                                <input type="email" placeholder="Email address" name="email" value="<?php echo $email; ?>" readonly>
                                <i class="mail icon"></i>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label>First Name</label>
                                <input placeholder="First Name" type="text" name="name" value="<?php echo $name; ?>" required>
                            </div>
                            <div class="field">
                                <label>Last Name</label>
                                <input placeholder="Last Name" type="text" name="surname" value="<?php echo $surname; ?>" required>
                            </div>
                        </div>
                        <div class="field">
                            <label>Province</label>
                            <div class="ui fluid selection dropdown">
                                <div class="text">Select</div>
                                <i class="dropdown icon"></i>
                                <input type="hidden" name="province" value="<?php echo $province_id; ?>" >

                                <div class="menu">
                                    <div class="item  <?php echo ($province_id ==1)?'active':'';?>" data-value="1" style="font-size: 14px;">Bangkok</div>
                                    <div class="item <?php echo ($province_id ==2)?'active':'';?>" data-value="2" style="font-size: 14px;">Changmai</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>Member Type</label>
                            <div class="grouped inline fields">
                                <div class="field">
                                    <div class="ui slider checkbox">
                                        <input type="radio" name="usertype" value="1">
                                        <label>Audience</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui slider checkbox">
                                        <input type="radio" name="usertype" value="2">
                                        <label>Musician</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="line"></div>
                        <p/>
                        <div class="field">
                            <label>Profile Photo</label>
                            <img src="../images/<?php echo $photo_url; ?>" alt="" id="img-preview"/>
                            <div class="ui selection dropdown" style="margin-left: 10px;">
                              <input type="hidden" name="profile-photo">
                              <div class="default text"><b>Change photo</b></div>
                              <i class="dropdown icon"></i>
                              <div class="menu">
                                <div class="fileUpload item" data-value="1">Upload photo<input id="uploadBtn" type="file" class="upload" name="photo"></div>
                                <div class="item" data-value="0">Remove</div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Cover Photo</label>
                        <img src="../images/Belleandbeast.png" alt="" id="img-preview">
                        <div class="ui selection dropdown" style="margin-left: 10px;">
                          <input type="hidden" name="cover-photo">
                          <div class="default text"><b>Change cover</b></div>
                          <i class="dropdown icon"></i>
                          <div class="menu">
                            <div class="fileUpload item" data-value="1">Upload photo<input id="uploadBtn" type="file" class="upload" name="cover"></div>
                            <div class="item" data-value="0">Remove</div>
                        </div>
                    </div>
                </div>
                <div class="field" >
                    <label>Biography</label>
                    <textarea name="biography" required><?php echo $biography; ?></textarea>
                </div>
                <div class="line"></div>
                <p/>
                <div class="field">
                    <label>Facebook URL</label>
                    <div class="ui left labeled icon input">
                        <input type="text" placeholder="Facebook URL" name="fburl" value="<?php echo $fb_url; ?>">  
                        <i class="facebook icon"></i>
                    </div>
                </div>
                <div class="field">
                    <label>Twitter URL</label>
                    <div class="ui left labeled icon input">
                        <input type="text" placeholder="Twitter URL" name="twurl" value="<?php echo $tw_url; ?>">
                        <i class="twitter icon"></i>
                    </div>
                </div>
                <div class="field">
                    <label>Youtube URL</label>
                    <div class="ui left labeled icon input">
                        <input type="text" placeholder="Youtube URL" name="yturl" value="<?php echo $yt_url; ?>">
                        <i class="youtube icon"></i>
                    </div>
                </div>
                <br/><p/>
                <div class="line"></div>
                <p/>
                <input class="ui red submit button" type="submit" value="Save Change">
            </div> 
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function() {
    $('#entertain').mouseover(function(){
        $('#content').load('entertainment.html').hide(0).fadeIn(1000);
    });
    $('#sports').mouseover(function(){
        $('#content').load('Sport.html').hide(0).fadeIn(1000);
    });
    </script>
<script>
document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>
</body>
</html>

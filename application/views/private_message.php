<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Private Message</title>

  <?php $this->load->view('header'); ?>

  <link rel="stylesheet" type="text/css" href="feed.css">
  <script src="feed.js"></script>

  <style>
  .ui.segment {
    -webkit-box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.0); 
    box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.0); 
    border-radius: 0px 0px 0px 0px;
    margin: 0em; 
  }
  .ui.divided.list > .item {
    padding-left: 1rem;
    padding-right: 1rem;
  }
  .ui.feed .label img {
    height: 3em;
    width: 3em;
    border-radius: 0em; 
  }
  .ui.feed .label + .content {
    padding: 0em 1em 0em;
  }
  footer {
    margin-top: 0px;
  }
  </style>
</head>
<body id="feed">
  <?php $this->load->view('navigation'); ?>
  <div id="pm-container" class="container">
    <div class="row">
      <div class="col-xs-4" style="height: 180px; padding-top: 120px; border-right: 1px solid #D6D6D6; background-color: #FFFFFF;">
        <h3 class="ui header" style="margin-left: 20px;">
          <i class="inbox icon"></i>
          กล่องข้อความ 

        </h3>
      </div>
      <div class="col-xs-8" style="height: 180px; border-bottom: 1px solid #D6D6D6; background-color: #F7F6F6; padding-top: 140px; padding-left: 30px;">
      <h4 class="ui header" id="pm-name"></h4>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-4" style="padding-left: 0px; padding-right: 0px; border-right: 1px solid #D6D6D6; background-color: #FFFFFF;">

        <div class="ui tabular filter menu">
          <a class="active item" style="margin-left: 30px;" data-tab="general">ทั่วไป <span class="noti_all_user"><?php if($count_pm_user != 0){
              echo '('. $count_pm_user .')'; 
            }?></span></a>
          <a class="item" data-tab="band">วงดนตรี  <span class="totalnotiband" ><?php if($countall_msg_band != 0){
              echo '('. $countall_msg_band .')'; 
            }?></span></a>
        </div>

        <!-- แชทของคนทั่วไป -->
        <div id="pm-inbox" class="ui fluid divided inbox selection list active tab" data-tab="general">
          <?php foreach($pm_users as $pm_user): ?>
          <a class="item" data-id="<?= $pm_user->from_user_id ?>" >
           <?php if($pm_user->photo_url): ?><img class="pm-profile-pic" src="<?= base_url().'uploads/profile/user/'.$pm_user->photo_url ?>"><?php else: ?>
           <img class="pm-profile-pic" src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
           <div class="right floated date" style="margin-top: 4px;"> <?= mdate("%d", strtotime($pm_user->timestamp)) ?> <?= mdate("%M", strtotime($pm_user->timestamp)) ?> <?= mdate("%Y", strtotime($pm_user->timestamp)) ?></div>
           <div class="description" style="margin-top: 4px;">
            <b>
              <?= $pm_user->name ?> <?= $pm_user->surname ?> 
            <span class="notiuser" ><?php if($pm_user->total_msg != 0){
              echo '('. $pm_user->total_msg .')'; 
            }?></span>
          </b>
        </div>            
           <?= $pm_user->text ?> 
           </span>   
         </a>
       <?php endforeach; ?>
     </div>

     <!-- แชทของวง -->
     <div id="pmband-inbox" class="ui fluid divided inbox selection list tab" data-tab="band">
      <?php foreach($pm_bands as $pm_band): ?>
      <a class="item in_band" data-id="<?= $pm_band->band_id ?>" >
        <?php if($pm_band->band_photo): ?>
        <img class="pm-profile-pic" src="<?= base_url().'uploads/profile/band/'.$pm_band->band_photo ?>">
      <?php else: ?>
           <img class="pm-profile-pic" src="<?= base_url().'images/no_profile.jpg' ?>">
         <?php endif; ?>
           
       <div class="right floated date" style="margin-top: 4px;"> <?= mdate("%d", strtotime($pm_band->timestamp)) ?> <?= mdate("%M", strtotime($pm_band->timestamp)) ?> <?= mdate("%Y", strtotime($pm_band->timestamp)) ?></div>
       <div class="description" style="margin-top: 4px;">
        <b>
          <?= $pm_band->name ?>
           <span class="notiband" ><?php if($count_pm_band != 0){
              echo '('. $count_pm_band .')'; 
            }?></span>
        </b>
      </div>           
       <?= $pm_band->text ?>

     </a>
   <?php endforeach;  ?>
     <?php foreach($msg_to_band as $msgToBand): 
     ?>
      <a class="item user_and_band" data-id="<?= $msgToBand->pm_group_id?>" >
<?php 
  $current_band = $this->session->userdata("band_id"); 
           if($current_band == $msgToBand->band_id){
              foreach ($owner_group as $og) {
               if($msgToBand->pm_group_id == $og->pm_group_id){
                  if($og->photo_url): ?>
        <img class="pm-profile-pic" src="<?= base_url().'uploads/profile/user/'.$og->photo_url ?>">
      <?php else: ?>
           <img class="pm-profile-pic" src="<?= base_url().'images/no_profile.jpg' ?>">
         <?php endif; 
               }
           }
            }else{
               if($msgToBand->band_photo): ?>
        <img class="pm-profile-pic" src="<?= base_url().'uploads/profile/band/'.$msgToBand->band_photo ?>">
      <?php else: ?>
           <img class="pm-profile-pic" src="<?= base_url().'images/no_profile.jpg' ?>">
         <?php endif; 
            }
?>
       <div class="right floated date" style="margin-top: 4px;"> <?= mdate("%d", strtotime($msgToBand->timestamp)) ?> <?= mdate("%M", strtotime($msgToBand->timestamp)) ?> <?= mdate("%Y", strtotime($msgToBand->timestamp)) ?></div>
       <div class="description" style="margin-top: 4px;">
         <b>
          <?php
          if($current_band == $msgToBand->band_id){
              foreach ($owner_group as $og) {
             if($msgToBand->pm_group_id == $og->pm_group_id){
                echo $og->name.' '.$og->surname;
             }
           }
            }else{
              echo $msgToBand->band_name;
            }
            //print_r($count_msg_to_band);
            foreach ($count_msg_to_band as $group) {
             if($msgToBand->pm_group_id == $group->pm_group_id){
                if($group->total_unseen !=0){
                  echo ' <span class="notiband">('.$group->total_unseen.')</span>'; 
                }
             }
            }
          ?>
          </b>
      </div>           
       <?= $msgToBand->text ?>

     </a>
   <?php endforeach; ?>
 </div>

</div>
<div class="col-xs-8" style="padding: 0px 0px 0px 0px; background-color: #FFFFFF;">
 <div id="pm-msg" class="ui feed segment">
   <!--    <?php foreach($chats as $chat): ?>
      <div class="event">
        <div class="label">
         <?php if($chat->photo_url): ?>
         <img src="<?= base_url().'uploads/profile/user/'.$chat->photo_url ?>"><?php else: ?>
         <img src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
         <div class="content">
          <div class="date">
           <?= mdate("%d", strtotime($chat->timestamp)) ?> 
           <?= mdate("%M", strtotime($chat->timestamp)) ?> 
           <?= mdate("%Y", strtotime($chat->timestamp)) ?>          
         </div>
         <div class="summary">
           <a><?= $chat->from_user_name  ?> <?= $chat->from_user_surname  ?></a> 
         </div>
         <div class="extra text">
          <?= $chat->text  ?>        
        </div>
      </div>
    </div>
  <?php endforeach; ?> -->

</div>
<form method="post" id="message" action="#" >
  <div style="padding: 15px 15px 15px 15px; border-top: 1px solid #D6D6D6; background-color: #F7F6F6;">
    <div class="ui form">
      <div class="field" style="margin: 0px">
        <textarea placeholder="เขียนข้อความตอบกลับ..." id="text" name="text" style="height: 100px;"></textarea>
        <input type="hidden" name="message_type" id="message_type" value="user">
      </div>
    </div>
  </div>
  <div style="background-color: #F7F6F6;">
    <input class="small ui button" style="margin-bottom: 15px; margin-left: 579px;" type="submit" value="ส่ง">
  </div>
</form>
</div>

</div>
</div>

   <!--   <?php foreach($pm_users as $pm_user): ?>
          <?php if($pm_user->photo_url): ?>
          <a class="item">
          <div class="left floated ui star rating"> <img src="<?= base_url().'uploads/profile/'.$pm_user->photo_url ?>"><?php else: ?>
          <img src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
          <a href="<?= base_url().'user/'.$pm_user->username ?>"><?= $pm_user->name.' '.$pm_user->surname ?></a></div>
          <div class="right floated date"><?= $pm_user->timestamp ?></div>
          <div class="description"><?= $pm_user->text ?></div>
        </a>
      <?php endforeach; ?> -->

      <script>
      $(function(){
        var to_user_id = "";
        $("#pm-inbox .item").click(function(){
          to_user_id = $(this).attr("data-id");
          ele = $(this);
           $("#message_type").val("user");
          $.ajax({
            type:'POST',
            url:'<?= base_url('pm/view'); ?>',
            data:{id:to_user_id},
            success:function(data){
              // console.log(data);
              var chat = JSON.parse(data);
                //$("#jobname").text(job.name);
                var html = "";
                $.each(chat, function(key,value){
                  //console.log(value);
                  var image = "";
                  var path = '<?= base_url().'uploads/profile/user/' ?>';
                  if(value.from_photo != 0){
                    image = '<img src=\"'+path+value.from_photo+'\"/>';
                  }else{
                    image = '<img src=\"<?= base_url().'images/no_profile.jpg'?>\"/>';
                  }

                  var date = new Date(Date.parse(value.timestamp));
                  
                  html +=
                  '<div class="event">'+
                  '<div class="label"> <a href="<?= base_url().'user/'?>'+value.source+'">'+image+
                  '</a></div>'+
                  '<div class="content">'+
                  '<div class="date">'+
                  date.toDateString()+
                  '</div>'+
                  '<div class="summary">'+
                  '<a>'+'<b>'+value.from_user_name + " " +value.from_user_surname +'</b>'+'</a>'+
                  '</div>'+
                  '<div class="extra text">'+
                  value.text+        
                  '</div>'+
                  '</div>'+
                  '</div>'+
                  '</div>';

                  $("#pm-msg").html(html);
                  $('#pm-msg').animate({
                    scrollTop: $("#pm-msg").offset().top + $("#pm-msg")[0].scrollHeight
                  }, 0);
                });
       
       var notialltext = ele.parent().parent().find(".noti_all_user").text();
       var notiall;
       //console.log(notialltext == "");
       if (notialltext == ""){
          notiall = 0;
       }else{
          notiall = parseInt(notialltext.substr(1, notialltext.length-2));
       } 

       var notiusertext = ele.find(".notiuser").text();
       var notiuser;
       console.log(notiusertext.length);
       if (notiusertext == ""){
          notiuser = 0;
       }
       else{
          notiuser = parseInt(notiusertext.substr(1, notiusertext.length-2));
      }
      console.log(notiall+"/"+notiuser);
      var recent_noti = notiall - notiuser+'';
        ele.find(".notiuser").text("");

        if (recent_noti != 0) {
          ele.parent().parent().find(".noti_all_user").text('('+recent_noti+')');
        }
        else{
          ele.parent().parent().find(".noti_all_user").text("");
        }
}
});
          $.ajax({
            type:'POST',
            url:'<?= base_url('pm/getTargetUsername'); ?>',
            data:{id:to_user_id},
            success:function(userdata){
                var name = JSON.parse(userdata);
                console.log(name);

                $("#pm-name").text(name.name + " " + name.surname);
          }
        });  
});

$("#pmband-inbox .in_band").click(function(){
          to_user_id = $(this).attr("data-id");
          ele = $(this);
          $("#message_type").val("band");
          $.ajax({
            type:'POST',
            url:'<?= base_url('pm/viewPMBand'); ?>',
            data:{id: to_user_id},
            success:function(data){
               console.log(data);
              var chat = JSON.parse(data);
                //$("#jobname").text(job.name);
                var html = "";
                $.each(chat, function(key,value){
                  //console.log(value);
                  var image = "";
                  var path = '<?= base_url().'uploads/profile/user/' ?>';
                  if(value.from_photo != 0){
                    image = '<img src=\"'+path+value.from_photo+'\"/>';
                  }else{
                    image = '<img src=\"<?= base_url().'images/no_profile.jpg'?>\"/>';
                  }

                  var date = new Date(Date.parse(value.timestamp));
                  
                  html +=
                  '<div class="event">'+
                  '<div class="label">'+image+
                  '</div>'+
                  '<div class="content">'+
                  '<div class="date">'+
                  date.toDateString()+
                  '</div>'+
                  '<div class="summary">'+
                  '<a>'+'<b>'+value.name + " " +value.surname +'</b>'+'</a>'+
                  '</div>'+
                  '<div class="extra text">'+
                  value.text+        
                  '</div>'+
                  '</div>'+
                  '</div>'+
                  '</div>';

                  $("#pm-msg").html(html);
                  $('#pm-msg').animate({
                    scrollTop: $("#pm-msg").offset().top + $("#pm-msg")[0].scrollHeight
                  }, 0);
                });
              
}
});
          $.ajax({
            type:'POST',
            url:'<?= base_url('pm/getBand'); ?>',
            data:{id: to_user_id},
            success:function(userdata){
              console.log("bandname");
              console.log(userdata);

                var name = JSON.parse(userdata);
                console.log(name);
                $("#pm-name").text(name.name);
          }
        });  

       calculateTotalMsgBand(ele);
});

$("#pmband-inbox .user_and_band").click(function(){
          var pm_group_id = $(this).attr("data-id");
          to_user_id = $(this).attr("data-id");
          ele = $(this);
          $("#message_type").val("user_and_band");
          $("#pm_group_id").val(pm_group_id);
          $.ajax({
            type:'POST',
            url:'<?= base_url('pm/viewUserAndBandPM'); ?>',
            data:{pm_group_id: pm_group_id},
            success:function(data){
               console.log(data);
              var chat = JSON.parse(data);
                //$("#jobname").text(job.name);
                var html = "";
                $.each(chat, function(key,value){
                  //console.log(value);
               
                var image = "";
      var path = '<?= base_url().'uploads/profile/user/' ?>';
      if(value.role =="band"){
        path = '<?= base_url().'uploads/profile/band/' ?>';
        if(value.band_photo){
             image = '<img src=\"'+path+value.band_photo+'\"/>';
           }else{
               image = '<img src=\"'+'<?= base_url().'images/no_profile.jpg'?>'+'\"/>';
           }
     
      }else if(value.from_photo){
        image = '<img src=\"'+path+value.from_photo+'\"/>';
      }else{
        image = '<img src=\"'+path+'images/no_profile.jpg\"/>';
      }

      var date = new Date(Date.parse(value.timestamp));

      var name = "";

      if(value.role =="band"){
        name = value.bandname;
      }else{
        name= value.name + " " +value.surname;
      }


                  html +=
                  '<div class="event">'+
                  '<div class="label">'+image+
                  '</div>'+
                  '<div class="content">'+
                  '<div class="date">'+
                  date.toDateString()+
                  '</div>'+
                  '<div class="summary">'+
                  '<a>'+'<b>'+name +'</b>'+'</a>'+
                  '</div>'+
                  '<div class="extra text">'+
                  value.text+        
                  '</div>'+
                  '</div>'+
                  '</div>'+
                  '</div>';

                  $("#pm-msg").html(html);
                  $('#pm-msg').animate({
                    scrollTop: $("#pm-msg").offset().top + $("#pm-msg")[0].scrollHeight
                  }, 0);
                });
calculateTotalMsgBand(ele);
              //ele.find(".notiband").text("");
  }
});
});

$("#message").submit(function(e){
  e.preventDefault();
  $.ajax({
    url:'<?= base_url().'pm/add/' ?>'+to_user_id,
    type:'post',
    data:{text:$("#text").val(),message_type:$("#message_type").val()},
    success:function(value){
      console.log(value);
      data = JSON.parse(value);
      var html = "";
      var image = "";
      var path = '<?= base_url().'uploads/profile/user/' ?>';
      if(data[0].role =="band"){
        path = '<?= base_url().'uploads/profile/band/' ?>';
        image = '<img src=\"'+path+data[0].band_photo+'\"/>';
      }else if(data[0].from_photo){
        image = '<img src=\"'+path+data[0].from_photo+'\"/>';
      }else{
        image = '<img src=\"'+path+'images/no_profile.jpg\"/>';
      }

      var date = new Date(Date.parse(data[0].timestamp));

      var name = "";

      if(data[0].role =="band"){
        name = data[0].bandname;
      }else{
        name= data[0].from_user_name + " " +data[0].from_user_surname;
      }

      html =
      '<div class="event">'+
      '<div class="label">'+image+
      '</div>'+
      '<div class="content">'+
      '<div class="date">'+
      date.toDateString()+
      '</div>'+
      '<div class="summary">'+
      '<a>'+'<b>'+
        name
        +'</b>'+'</a>'+
      '</div>'+
      '<div class="extra text">'+
      $("#text").val()+        
      '</div>'+
      '</div>'+
      '</div>'+
      '</div>';
      $("#pm-msg").append(html);
      $('#pm-msg').animate({
        scrollTop: $("#pm-msg").offset().top + $("#pm-msg")[0].scrollHeight
      }, 500);
      $("#text").val("");

    }
  });
});
});

function calculateTotalMsgBand(ele){
     var notiallband = ele.parent().parent().find(".totalnotiband").text();
       var notiall;
       console.log("noti"+notiallband);
       if (notiallband == ""){
          notiall = 0;
       }else{
          notiall = parseInt(notiallband.substr(1, notiallband.length-2));
       } 

       var thisTotal = ele.find(".notiband").text();
       var notiuser;
       console.log(thisTotal.length);
       if (thisTotal == ""){
          notiuser = 0;
       }
       else{
          notiuser = parseInt(thisTotal.substr(1, thisTotal.length-2));
      }
      console.log(notiall+"/"+notiuser);
      var recent_noti = notiall - notiuser+'';
        ele.find(".notiband").text("");
        if (recent_noti != 0) {
          ele.parent().parent().find(".totalnotiband").text('('+recent_noti+')');
        }else{
          ele.parent().parent().find(".totalnotiband").text("");
        }
}


</script>

<?php $this->load->view('footer'); ?>

</body>
</html>
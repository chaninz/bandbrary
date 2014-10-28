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
  body {
    background: url('<?= base_url().'images/noise-black.png' ?>');
  }
  #pm-container {
    border-left: 2px solid #000000; 
    border-right: 2px solid #000000;  
    -webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
    box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05); 
  }
  #pm-inbox {
    height: 681px;
    overflow-y: scroll; 
    scrollbar-arrow-color:blue; 
    scrollbar-face-color: #e7e7e7; 
    scrollbar-3dlight-color: #a0a0a0; 
    scrollbar-darkshadow-color:#888888
  }
  #pm-msg {
    height: 507px;
    overflow-y: scroll; 
    border-left: 15px solid #F7F6F6;
    border-right: 15px solid #F7F6F6;
    scrollbar-arrow-color:blue; 
    scrollbar-face-color: #e7e7e7; 
    scrollbar-3dlight-color: #a0a0a0; 
    scrollbar-darkshadow-color:#888888
  }
  .pm-profile-pic {
    height: 3em;
    width: 3em;
    margin-right: 10px!important;
  }
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
  </style>
</head>
<body id="feed">
  <?php $this->load->view('navigation'); ?>

  <div id="pm-container" class="container">
    <div class="row">
      <div class="col-xs-4" style="height: 100px; padding-top: 80px; border-right: 1px solid #D6D6D6; background-color: #FFFFFF;">
        <h3 class="ui header" style="margin-left: 20px;">
          <i class="inbox icon"></i>
          กล่องข้อความ
        </h2>
      </div>
      <div class="col-xs-8" style="height: 100px; border-bottom: 1px solid #D6D6D6; background-color: #F7F6F6;"></div>
    </div>
    <div class="row">
      <div class="col-xs-4" style="padding-top: 20px; padding-left: 0px; padding-right: 0px; border-right: 1px solid #D6D6D6; background-color: #FFFFFF;">
        <div id="pm-inbox" class="ui fluid divided inbox selection list active tab" data-tab="unread">
          <?php foreach($pm_users as $pm_user): ?>
          <a class="item" data-id="<?= $pm_user->id ?>" >
           <?php if($pm_user->photo_url): ?><img class="pm-profile-pic" src="<?= base_url().'uploads/images/profile/'.$pm_user->photo_url ?>"><?php else: ?>
           <img class="pm-profile-pic" src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
           <div class="right floated date" style="margin-top: 4px;"> <?= mdate("%d", strtotime($pm_user->timestamp)) ?> <?= mdate("%M", strtotime($pm_user->timestamp)) ?> <?= mdate("%Y", strtotime($pm_user->timestamp)) ?></div>
           <div class="description" style="margin-top: 4px;"><b><?= $pm_user->name ?> <?= $pm_user->surname ?></b></div>           
           <?= $pm_user->text ?>    
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
         <img src="<?= base_url().'uploads/profile/'.$chat->photo_url ?>"><?php else: ?>
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
<form method="post" action="<?= base_url().'pm/add/'.$pm_user->from_user_id ?>" >
  <div style="padding: 15px 15px 15px 15px; border-top: 1px solid #D6D6D6; background-color: #F7F6F6;">
    <div class="ui form">
    <div class="field" style="margin: 0px">
      <textarea placeholder="เขียนข้อความตอบกลับ..." style="height: 100px;"></textarea>
    </div>
  </div>
</div>
<div style="background-color: #F7F6F6;">
  <input class="small ui button" style="margin-bottom: 15px; margin-left: 560px;" type="submit" value="ส่ง">
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
      $("#pm-inbox .item").click(function(){
        var id = $(this).attr("data-id");
        $.ajax({
          type:'POST',
          url:'<?= base_url('pm/view'); ?>',
          data:{id:id},
          success:function(data){
            var chat = JSON.parse(data);
          //$("#jobname").text(job.name);
          var html = "";
          $.each(chat, function(key,value){
            //console.log(value);
            var image = "";
            var path = '<?= base_url().'uploads/images/profile/' ?>';
            if(value.photo_url){
              image = '<img src=\"'+path+value.photo_url+'\"/>';
            }else{
              image = '<img src=\"'+path+'images/no_profile.jpg\"/>';
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
            '<a>'+'<b>'+value.from_user_name + " " +value.from_user_surname +'</b>'+'</a>'+
            '</div>'+
            '<div class="extra text">'+
            value.text+        
            '</div>'+
            '</div>'+
            '</div>'+
            '</div>';
          });

$("#pm-msg").html(html);

}
});

})  

</script>

<?php $this->load->view('footer'); ?>

</body>
</html>
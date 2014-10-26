<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Feed Example - Semantic</title>

  <?php $this->load->view('header'); ?>

  <link rel="stylesheet" type="text/css" href="feed.css">
  <script src="feed.js"></script>

  <style>
  #pm-inbox {
    height: 600px;
    overflow-y: scroll; 
    scrollbar-arrow-color:blue; 
    scrollbar-face-color: #e7e7e7; 
    scrollbar-3dlight-color: #a0a0a0; 
    scrollbar-darkshadow-color:#888888
  }
  #pm-msg {
    height: 370px;
    overflow-y: scroll; 
    scrollbar-arrow-color:blue; 
    scrollbar-face-color: #e7e7e7; 
    scrollbar-3dlight-color: #a0a0a0; 
    scrollbar-darkshadow-color:#888888
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
  </style>
</head>
<body id="feed">
  <?php $this->load->view('navigation'); ?>

  <div class="container" style="border-left: 1px solid #D6D6D6; border-right: 1px solid #D6D6D6;">
    <div class="row">
      <div class="col-xs-12" style="height: 100px; border-bottom: 1px solid #D6D6D6;">
      </div>
    </div>
    <div class="row">
      <div class="col-xs-4" style="padding-top: 20px; padding-left: 0px; padding-right: 0px; border-right: 1px solid #D6D6D6;">
        <h2 class="ui header" style="font-size: 1.3em; margin-left: 20px;">
          <i class="inbox icon"></i>
          กล่องข้อความ
        </h2>
        <div id="pm-inbox" class="ui fluid divided inbox selection list active tab" data-tab="unread">
          <?php foreach($pm_users as $pm_user): ?>
          <a class="item" data-id="<?= $pm_user->id ?>" >
            <div class="left floated ui star rating"><i class="icon"><?php if($pm_user->photo_url): ?><img class="icon" src="<?= base_url().'uploads/profile/'.$pm_user->photo_url ?>"><?php else: ?>
              <img src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?></i></div>
              <div class="right floated date"> <?= mdate("%d", strtotime($pm_user->timestamp)) ?> <?= mdate("%M", strtotime($pm_user->timestamp)) ?> <?= mdate("%Y", strtotime($pm_user->timestamp)) ?></div>           
              <div class="description"><?= $pm_user->name ?> <?= $pm_user->surname ?> <?= $pm_user->text ?></div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-xs-8" style="padding: 0px 0px 0px 0px;">
       <div id="pm-msg" class="ui feed segment">
        <?php foreach($chats as $chat): ?>
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
    <?php endforeach; ?>
    <div class="event">
      <div class="label">
        <img src="/images/demo/avatar.jpg">
      </div>
      <div class="content">
        <div class="date">
          3 days ago
        </div>
        <div class="summary">
         <a>Sally Poodle</a> created a post
       </div>
       <div class="extra text">
        I am a dog and I do not know how to make a post
      </div>
    </div>
  </div>
</div>
<textarea name="description" class="ckeditor" style"border-top: 1px solid #b6b6b6;"></textarea>
<div class="small ui button" style="margin-top: 5px; margin-left: 540px;">
  Send
</div>
</div>

</div>
<div class="row">
  <div class="col-xs-12" style="height: 30px; border-top: 1px solid #D6D6D6;">
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
            var path = '<?= base_url().'uploads/profile/' ?>';
            if(value.photo_url){
              image = '<img src=\"'+path+value.photo_url+'\"/>';
            }else{
              image = '<img src=\"'+path+'images/no_profile.jpg\"/>';
            }

            var date = new Date(Date.parse(value.timestamp));
            
            html +=
            '<div class="event">'+
              '<div class="label">'+image+
                '<div class="content">'+
                  '<div class="date">'+
                    date.toDateString()+
                  '</div>'+
                  '<div class="summary">'+
                    '<a>'+value.from_user_name + " " +value.from_user_surname  +'</a>'+
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
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>การแจ้งเตือน | Bandbrary</title>


  <?php $this->load->view('header'); ?>

  <style> 

  #notice-item {
    padding: 10px;
  }
  #notice-container {
    background-color: #FFFFFF;
    border-left: 1px solid rgba(0, 0, 0, 0.14);
    border-right: 1px solid rgba(0, 0, 0, 0.14);
    -webkit-box-shadow: 0 2px 2px -2px rgba(0, 0, 0, .52);
    box-shadow: 0 1px 1px rgba(0,0,0,.24),0 1px 5px rgba(0,0,0,.05);
  }

  </style>

  <body>

    <?php $this->load->view('navigation'); ?>

    <div id="notice-container" class="container">
      <div class="row">

        <div class="col-xs-12">

          <h3 class="ui block header" style="margin: 120px 0px 20px 0px; background-color: #FFFFFF;">
            <i class="bell icon"></i>
            การแจ้งเตือน
          </h3>

          <!-- <div class="ui red pointing menu" style="border-radius: 0em; margin-top: 0px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.22);">
            <a class="active item">
             แจ้งเตือนทั้งหมด
           </a>
                 <a class="item">
                    แจ้งเตือนของคุณ
                </a>
                <a class="item">
                    แจ้งเตือนของวง
                  </a>
                </div>    -->         
                <div class="ui divided selection list" style="background-color: #FFFFFF; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.22);">
                 <?php foreach ($noti as $value): ?>
                 <div id="notice-item" class="item">
                  <?php if($value->type == "comment_music_user" || $value->type == "comment_music_band" || $value->type == "comment_post"): ?>
                  <i class="comment icon"></i>
                <?php elseif ($value->type == "request_join"): ?>
                <i class="circle blank icon"></i>
              <?php elseif ($value->type == "accept_request_member" || $value->type == "accept_request_user"): ?>
              <i class="circle icon"></i>
            <?php elseif ($value->type == "accept_job_band" || $value->type == "accept_job_user" || $value->type == "request_job_band" ||  $value->type == "request_job"): ?>
            <i class="checkmark sign icon"></i>
          <?php endif; ?>
          <div class="content">
            <a class="header" href="<?=($value->link) ?>"><?=($value->text) ?></a> <span class="date"><?=($value->noti_date) ?></span>
            <div class="description">คอมเม้นโดยย่อ</div>
          </div>
        </div> <?php endforeach; ?>
         <!--  <div id="notice-item" class="item">
            <i class="circle blank icon"></i>
            <div class="content">
              <a class="header">mpp ขอเข้าร่วมวงดนตรีของคุณ</a> <span class="date">2 days ago</span>
              <div class="description">ชื่อวงดนตรี</div>
          </div>
      </div>
      <div id="notice-item" class="item">
        <i class="circle icon"></i>
        <div class="content">
          <a class="header">chanin รับคุณเข้าวง Nin UP แล้ว</a> <span class="date">2 days ago</span>
          <div class="description">ชื่อวงดนตรี</div>
      </div>
  </div>
  <div id="notice-item" class="item">
    <i class="music icon"></i>
    <div class="content">
      <a class="header">mpp ได้เพิ่มเพลงใหม่</a> <span class="date">2 days ago</span>
      <div class="description">ชื่อเพลง</div>
  </div>
</div>
<div id="notice-item" class="item">
    <i class="pencil icon"></i>
    <div class="content">
      <a class="header">mpp ได้เพิ่มโพสต์ใหม่</a> <span class="date">2 days ago</span>
      <div class="description">ชื่อโพสต์</div>
  </div>
</div>
<div id="notice-item" class="item">
    <i class="calendar icon"></i>
    <div class="content">
      <a class="header">mpp ได้เพิ่มกิจกรรมใหม่</a> <span class="date">2 days ago</span>
      <div class="description">ชื่อกิจกรรม</div>
  </div>
</div>
<div id="notice-item" class="item">
    <i class="heart icon"></i>
    <div class="content">
      <a class="header">mpp กรี๊ด เพลง/โพสต์ ของคุณ</a> <span class="date">2 days ago</span>
      <div class="description">ศิลปิน - ชื่อเพลง</div>
  </div>
</div>
<div id="notice-item" class="item">
    <i class="add icon"></i>
    <div class="content">
      <a class="header">mpp เริ่มติดตามคุณ</a> <span class="date">2 days ago</span>
      <div class="description"></div>
  </div>
</div>
<div id="notice-item" class="item">
    <i class="checkmark sign icon"></i>
    <div class="content">
      <a class="header">คุณได้งานของ GMM แล้ว</a> <span class="date">2 days ago</span>
      <div class="description">ชื่องาน</div>
  </div>
</div> -->
</div>

</div>
</div>
</div>

</body>
</html>
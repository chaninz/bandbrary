<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bandbrary</title>
	<?php $this->load->view('header'); ?>
  <?php $this->load->view('navigation'); ?>

  <style>
  .ui.header {
    margin-left: 60px;
    font-weight: bold;
  }
  .col-xs-8 {
    padding-top: 140px;
  }
  .col-xs-6 {
    padding-bottom: 70px;
  }
  footer {
    margin-top: 0px;
  }
  </style>

</head>
<body>
  <div id="bb-container" class="container">
    <div class="row">
      <div class="col-xs-2"></div>
      <div class="col-xs-8">
        <h2 class="ui header">
          สร้างวงดนตรี
        </h2>
        <p/>
        <div class="line"></div>
        <p/><br/>
      </div>
      <div class="col-xs-2"></div>
    </div>
    <div class="row">
      <div class="col-xs-3"></div>
      <div class="col-xs-6">
        <form action="<?php echo base_url().'band/create'; ?>" method="post" > 
          <div class="ui form segment">
            <div class="field">
              <label>ชื่อวงดนตรี</label>
              <input type="text" placeholder="" name="name" required>
            </div>
            <div class="field">
              <label>ประวัติ</label>
              <textarea name="biography"></textarea>
            </div>
            <div class="field">
              <label>จังหวัด</label>
              <div class="ui labeled icon input">
                <div class="ui fluid selection dropdown">
                  <div class="text">เลือก</div>
                  <i class="dropdown icon"></i>
                  <input type="hidden" name="province">
                  <div class="menu"><?php if (! empty($provinces)): foreach ($provinces as $province): ?>
                    <div class="item" data-value="<?= $province->id ?>"><?= $province->province ?></div><?php endforeach; endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label>สไตล์</label>
              <div class="grouped inline fields">
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="1" name="style">
                    <label>บลูส</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="2" name="style">
                    <label>คันทรี</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="4" name="style">
                    <label>ฮิปฮอป</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="5" name="style">
                    <label>แจ๊ส</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="6" name="style">
                    <label>ลาติน</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="7" name="style">
                    <label>ป็อป</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="8" name="style">
                    <label>เร้กเก้</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="9" name="style">
                    <label>อาร์แอนด์บี</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="10" name="style">
                    <label>ร็อก</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label>ตำแหน่งในวงของคุณ</label>
              <div class="grouped inline fields">
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="1" name="position">
                    <label>นักร้อง</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="2" name="position">
                    <label>กีต้าร์</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="3" name="position">
                    <label>เบส</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="4" name="position">
                    <label>กลอง</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="5" name="position">
                    <label>เปียโน</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="6" name="position">
                    <label>คีบอร์ด</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="7" name="position">
                    <label>แซกโซโฟน</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="8" name="position">
                    <label>ทรัมเป็ต</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value="9" name="position">
                    <label>ไวโอลิน</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label>เฟสบุ๊ค</label>
              <div class="ui left labeled icon input">
                <input type="text" placeholder="" name="fburl">
                <i class="facebook icon"></i>
              </div>
            </div>
            <div class="field">
              <label>ทวิตเตอร์</label>
              <div class="ui left labeled icon input">
                <input type="text" placeholder="" name="twurl">
                <i class="twitter icon"></i>
              </div>
            </div>
            <div class="field">
              <label>ยูทูป</label>
              <div class="ui left labeled icon input">
                <input type="text" placeholder="" name="yturl">
                <i class="youtube icon"></i>
              </div>
            </div>
          </div>
          <input class="ui small red submit button" style="float: right;" type="submit" value="บันทึก">
        </form>
      </div>
      <div class="col-xs-3"></div>
    </div>
  </div>

  <?php $this->load->view('footer'); ?>

</body>
</html>

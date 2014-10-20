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
</head>
<body id="feed">
    <?php $this->load->view('navigation'); ?>

  <div class="ui large inverted vertical sidebar menu">
    
    
    <a class="item">
      Joystiq <span class="ui label">113</span>
    </a>
    <div class="item">
      <b>Archived Feeds</b>
      <div class="menu">
        <a class="item">
          Engadget <span class="ui label">11</span>
        </a>
        <a class="item">
          NY Times Tech Blog <span class="ui label">21</span>
        </a>
      </div>
    </div>
    <a class="item">
      <i class="bookmark icon"></i> Favorites
    </a>
    <div class="ui dropdown item">
      <i class="add icon"></i> New
      <div class="menu">
        <a class="item"><i class="rss icon"></i> Feed</a>
        <a class="item"><i class="tag icon"></i> Tag</a>
        <a class="item"><i class="folder icon"></i> Group</a>
      </div>
    </div>
  </div>
  <div class="ui celled grid">
    <div class="seven wide middle column">
      <div class="ui right floated black launch button">
        <i class="list layout icon"></i> Menu
      </div>
      <h2 class="ui header">
        <i class="inbox icon"></i>
        Inbox
      </h2>
      <div class="ui tabular filter menu">
        <a class="active item" data-tab="unread">Unread</a>
        <a class="item" data-tab="saved">Saved</a>
        <a class="item" data-tab="all">All</a>
      </div>


      <div class="ui divided inbox selection list active tab" data-tab="unread">
        <a class="active item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 14, 2013</div>
          <div class="description">Weekly Webcomic Wrapup fought the law, and the law won</div>
        </a>
          
          <?php foreach($pm_users as $pm_user): ?>
          <?php if($pm_user->photo_url): ?>
          <a class="item">
          <div class="left floated ui star rating"> <img src="<?= base_url().'uploads/profile/'.$pm_user->photo_url ?>"><?php else: ?>
          <img src="<?= base_url().'images/no_profile.jpg' ?>"><?php endif; ?>
          <a href="<?= base_url().'user/'.$pm_user->username ?>"><?= $pm_user->name.' '.$pm_user->surname ?></a></div>
          <div class="right floated date"><?= $pm_user->timestamp ?></div>
          <div class="description"><?= $pm_user->text ?></div>
        </a>
              <?php endforeach; ?>

        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 10, 2013</div>
          <div class="description">Dogs colony in Antarctica</div>
        </a>
        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 09, 2013</div>
          <div class="description">Famous dog whisperer Chakotay dies today at 104</div>
        </a>
        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 07, 2013</div>
          <div class="description">Top 10 Things to Know about Labradoodles</div>
        </a>
        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 05, 2013</div>
          <div class="description">Study shows children enjoy the company of animals</div>
        </a>
      </div>
      <div class="ui divided inbox selection list tab" data-tab="saved">
        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 14, 2013</div>
          <div class="description">Your favorite saved article</div>
        </a>
        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 14, 2013</div>
          <div class="description">Your favorite saved article</div>
        </a>
        <a class="item">
          <div class="left floated ui star rating"><i class="icon"></i></div>
          <div class="right floated date">Sep 14, 2013</div>
          <div class="description">Your favorite saved article</div>
        </a>
      </div>
      <div class="ui divided inbox selection list tab" data-tab="all">
        <a class="item">
          <div class="left floated ui star rating"><i class="link icon"></i></div>
          <div class="right floated date">Sep 14, 2013</div>
          <div class="description">There turns out there is only one article under all.</div>
        </a>
      </div>

      <div class="ui divider"></div>

      <div class="page">Showing <b>6</b> of 213</div>
      <div class="ui pagination menu">
        <a class="icon item"><i class="icon left arrow"></i></a>
        <a class="active item">1</a>
        <div class="disabled item">...</div>
        <a class="item">10</a>
        <a class="item">11</a>
        <a class="item">12</a>
        <a class="icon item"><i class="icon right arrow"></i></a>
      </div>
    </div>

  </div>
  <script src="../../assets/js/bandbrary.js"></script>
</body>

</html>
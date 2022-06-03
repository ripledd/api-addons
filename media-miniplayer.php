<?php include("../database_connection.php") ?>
<?php
$parts = parse_url($url);
parse_str($parts['query'], $query);
$post_id = $_GET['p'];

    $sql = "SELECT * FROM --- WHERE id = '$post_id'";
      $rs = mysqli_query($dbconn, $sql);
        $fetchRow = mysqli_fetch_assoc($rs);
          $file = $fetchRow['---'];
          $file_type_raw = pathinfo($file, PATHINFO_EXTENSION);
          $file_type = strtolower($file_type_raw);
          $prev = $fetchRow['---'];
          $u_id = $fetchRow['---'];

          $c_sql = "SELECT * FROM --- WHERE --- = '$u_id'";
          $c_rs = mysqli_query($dbconn, $c_sql);
            $c_row = mysqli_fetch_assoc($c_rs);
              $c_name = $c_row['---'];
              $c_alt = $c_row['---'];
              $c_avatar = $c_row['---'];
              $c_url = $c_row['---'];

              if ($c_alt == ""){$c_alt = "@$c_url";}

              if ($file_type == "mp3" || $file_type == "wav" || $file_type == "flac" || $file_type == 'm4a' || $file_type == 'aac'){
                $post_link_first_word = "Listen";
              }else {
                $post_link_first_word = "Watch";
              }

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Speecher embed > <?=$post_id?></title>
    <link rel="stylesheet" href="css/e_post.css">
    <link rel="stylesheet" href="../css/videoplayer.css">
  </head>
  <body style="background: black;" >
      <script src="../js/video.min.js"></script>

      <div class="channel_holder">
        <img class="channel_avatar" src="../profile/<?=$c_avatar?>" alt="channel_avatar"></img>
        <p class="c_name" ><?=$c_name?></p>
        <p class="c_alt"><?=$c_alt?></p>
        <a onclick="window.open(this.href,'_blank');return false;" href='https://speecher.me/c/<?=$c_url?>'><button class="view_channel_btn">Follow +</button></a>
      </div>

      <a onclick="window.open(this.href,'_blank');return false;" href='https://speecher.me/content/<?=$post_id?>'>
      <div class="link_holder">
        <h3 class="watch_on_txt"><?=$post_link_first_word?> on: <img class="link_spchr_logo" src="https://speecher.me/img/speecher_logo_light.png" alt="speecher_logo_link"> </h3>
      </div>
      </a>

      <video playsinline class="video-js vjs-theme-default vjs-big-play-centered-video" poster="../<?=$prev?>" controls preload="metadata" width="100%" height="100%" data-setup="{}" >
        <source src="../<?=$file?>"/>
      </video>

    <style media="screen">

      /* Videoplayer */
      .video-js {position: static;}
      .video-js .vjs-control-bar {
        bottom: -1px;
        background-color: rgba(43, 51, 63, 0.90);
      }
      .video_player_spchr{
        height: 100%;
        width: 100%;
        background: red;
      }

    </style>
  </body>
</html>

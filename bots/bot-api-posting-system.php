<?php
if (($_POST['send_data']!="")) {

// Auth user
$auth_email = mysqli_real_escape_string($dbconn, $_POST['spchr_auth_email']);
$auth_pw = mysqli_real_escape_string($dbconn, $_POST['spchr_auth_pw_hash']);
$query = "SELECT * FROM users WHERE email='$auth_email' AND password='$auth_pw'";
$results = mysqli_query($dbconn, $query);

if (mysqli_num_rows($results) == 1) {

$sql = "SELECT * FROM users WHERE email = '$auth_email'";
  $rs = mysqli_query($dbconn, $sql);
    $owner_data_row = mysqli_fetch_assoc($rs);
      $s_id = $owner_data_row['secure_id'];
        $data = mysqli_real_escape_string($dbconn, $_POST['send_data']);
          $post_content_x1 = preg_replace("/[']/","‘",$data);
            $post_content_x2 = preg_replace("/[<]/","&lt",$post_content_x1);
              $post_content = str_replace('"',"&quot",$post_content_x2);

    if ($target_file == "$target_dir") {
      $target_file = "null";
    }
    $get_date = gmdate("Y-m-d");
    $get_date_two = date("Y-m-d H:i:s");
    $id_gener1 = bin2hex(random_bytes(4));
    $id_gener2 = bin2hex(random_bytes(1));
    $id_gener = "$id_gener1$id_gener2";
    $query = "INSERT INTO post_data (id, content, post_date, post_date_two, user_id)
      VALUES('$id_gener', '$post_content', '$get_date', '$get_date_two', '$s_id' )";
      mysqli_query($dbconn, $query);

}
}

?>

  <?php

  include ("connection.php");
  if (isset($_POST['submit'])) {

    $fname = $_FILES['file']['name'];
    $basename = substr($fname,0, strripos($fname, '.'));
    $ext = substr($fname, strripos($fname, '.'));
    $tmpname = $_FILES['file']['tmp_name'];
    $altype = array('.png','.txt','.jpg');
    $fsize = $_FILES['file']['size'];
echo $ext;
echo $basename;


    if(in_array($ext,$altype) && $fsize < 2097152) {
      echo "<script>alert('yes to')</script>";

      $nwef = md5($basename).rand(10, 1000).time().$ext;

      if (file_exists('img/'. $nwef)) {
        echo "<script> alert('file is exists') </script>";
      } else {
        move_uploaded_file($tmpname, 'img/'.$nwef);
        echo "<script> alert('file uploaded successfully') </script>";
      }
    } 
    else if($fsize>2097152) 
    {
      echo "<script> alert('file is to large') </script>";
    }
    else 
    {
      echo "<script> alert('allowed types are:" . implode(",", $altype)."')</script>";
    }
  }
  ?>
  
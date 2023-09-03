<?php
 require_once '../../functions/helpers.php';
 require_once '../../functions/pdo_connection.php';
 require_once '../../functions/check-login.php';


 global $pdo;

 if(
    isset($_POST['title']) && $_POST['title'] !== '' 
&& isset($_POST['cat_id']) && $_POST['cat_id'] !== '' 
&&  isset($_POST['body']) && $_POST['body'] !== ''
&&  isset($_FILES['image']) && $_FILES['image']['name'] !== '' )
{

       $allowedMimes = ['png', 'jpeg', 'jpg', 'gif'];
       $imageMime = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
       $basePath = dirname(dirname(__DIR__));
       $image = '/assets/images/posts/' . date("Y_m_d_H_i_s") . '.' . $imageMime;
       $image_upload = move_uploaded_file($_FILES['image']['tmp_name'], $basePath . $image);  
       
       if($image_upload == true)
       {
           $servername = "localhost";
           $database = "php_project";
           $username = "root";
           $password = "";

           $conn = mysqli_connect($servername, $username, $password, $database);

           if (!$conn) {
                 die("Connection failed: " . mysqli_connect_error());
           }
           echo "Connected successfully";
       $sql = "INSERT INTO posts (title, cat_id, body,status,image) VALUES ('".$_POST['title']."', '".$_POST['cat_id']."', '".$_POST['body']."', '1','".$image."')";
       if (mysqli_query($conn, $sql)) {
             echo "New record created successfully";
       } else {
             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
       mysqli_close($conn);

       }     
       
       redirect('panel/post');}

?>

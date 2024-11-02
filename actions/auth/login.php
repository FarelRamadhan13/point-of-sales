<?php 

require '../../system/action.php';
$url = url('/login');

if($_SERVER['REQUEST_METHOD']=='POST'){
     useQuery("admin.php");


     $admin = findByEmail($_POST['email']);

     if (!$admin) 
     echo "
        <script>
            alert('Password / Username Salah!')
            window.location = '$url'
        </script>
    ";
     

     $password = md5($_POST['password']);

     if ($password != $admin['password']) 
     echo "
        <script>
            alert('Password / Username Salah!')
            window.location = '$url'
        </script>
     ";

     if ($password == $admin['password']) {

         session_start();
         $_SESSION['point_admin_id'] = $admin['name'];
         return redirect('/dashboard');
     }
        

}

echo "
    <script>
        alert('Password / Username Salah!')
        window.location = '$url'
    </script>
";

<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">

      <h1>Update Admin</h1>
     <br><br>
     <?php
      $id=$_GET['id'];
      $sql="SELECT * FROM tbl_admin WHERE id=$id";

      $res=mysqli_query($conn,$sql);

      if($res==true){
          $count=mysqli_num_rows($res);

          if($count==1){
            // echo "Admin available";

            $row=mysqli_fetch_assoc($res);
            $full_name=$row['fullname'];
            $username=$row['username'];
          }
          else{
              header('location:'.SITEURL.'admin/manage-admin.php');
          }
      }

     ?>
    <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="name" value=<?php echo $full_name; ?>></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" value=<?php echo $username; ?>></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value=<?php echo $id;?>>
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
     $id=$_POST['id'];
     $full_name=$_POST['name'];
     $username=$_POST['username'];

     $sql="UPDATE tbl_admin SET
     fullname='$full_name',
    username='$username'
    WHERE id=$id";

    $res=mysqli_query($conn,$sql);


    if($res==TRUE){
        $_SESSION['update']="<div class='success'>Admin Updated Successfully</div>";

      header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['update']="<div class='error'>could not  update the admin</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }

?>


<?php include('partials/footer.php');?>
<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>
            Add Admin
        </h1>
        <br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="name" placeholder="enter your name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="your username"></td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="your password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>








<?php include('partials/footer.php');?>
<?php
if(isset($_POST['submit'])){
    $full_name=$_POST['name'];
    echo $username=$_POST['username'];
    $password=md5($_POST['password']);



    //to insert to sql table

    $sql="INSERT into tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
    ";

    // $res=mysqli_query($conn,$sql) or die(mysqli_error());
}
?>
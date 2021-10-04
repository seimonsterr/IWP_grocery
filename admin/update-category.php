<?php

include('partials/menu.php');

?>

<div class="main-content ">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>
        <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $sql="SELECT * from tbl_category WHERE id=$id";


            $res=mysqli_query($conn,$sql);

            $count=mysqli_num_rows($res);

            if($count==1){
                //for getting all data from our db and storing it in array format
               $row=mysqli_fetch_assoc($res);
               $title=$row['title'];
               $current_image=$row['image_name'];
               $featured=$row['featured'];
               $active=$row['active'];
            }
            else{
                $_SESSION['no-category-found']="<div class='success'>Category not found </div>";
                header('location:'.SITEURL.'admin/manage-category.php');

            }
        }
        else{
            header('location:'.SITEURL.'admin/manage-category.php');
        }


        ?>
           <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>
                    Title:
                </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title;?>">
                </td>
            </tr>
            <tr>
                <td>
                    Current Image:
                </td>
                <td>
                    <?php
                    if($current_image !="")
                    {
                      ?>
                      <img src="<?php echo SITEURL?>images/category/<?php echo $current_image?>" width="100px">
                      <?php
                    }
                    else{
                        echo "<div class='error'>Image  not added </div>";
                    }

                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    New Image:
                </td>
                <td>
                  <input type="file" name="image">
            </td>
            </tr>
            <tr>
                <td>Featured</td>
                <td>
                    <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                    <input <?php if($featured=="No"){echo "checked";}?>type="radio" name="featured" value="No">No
                </td>
            </tr>
            <tr>
                <td>Active</td>
                <td>
                    <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes
                    <input <?php if($active=="No"){echo "checked";}?>type="radio" name="active" value="No">No
                </td>
            </tr>

            <tr>
                <td >
                    <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                </td>
        </table>
        </form>
        <?php

        if(isset($_POST['submit']))
        {
          $id=$_POST['id'];
          $title=$_POST['title'];
          $current_image=$_POST['current_image'];
          $featured=$_POST['featured'];
          $active=$_POST['active'];



          //to check whether the image is selected or not
          if(isset($_FILES['image']['name'])){
            $image_name=$_FILES['image']['name'];
            //to check whether img is available or not
            if(image_name!=""){
                //we will upload new image and remove the current image

            }
            else{
                $image_name=$current_image;//because sometimes we open the image upload to choose a file but just do ok and leave it
            }
          }
          else{
              $image_name=$current_image;
          }


        //updating the database
          $sql2="UPDATE tbl_category SET
          title='$title',
          featured='$featured',
          active='$active'
          WHERE id=$id
          ";

          $res2=mysqli_query($conn,$sql2);

          if($res2==true){

            $_SESSION['update']="<div class='success'>Category updated successfully</div>";

            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else{

            $_SESSION['update']="<div class='error'>Failed to update Category</div> ";

            header('location:'.SITEURL.'admin/manage-category.php');
        }

        }


        ?>
    </div>
</div>





<?php include('partials/footer.php');?>
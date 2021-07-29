<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ajax";
$conn = new mysqli($servername, $username, $password, $dbname);
$oper = $_POST['op'];
echo $oper;
if($oper == "save")
{
$name =  $_POST['email'];
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO ajax.test (email)
VALUES ('$name')";
echo $sql;
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "saved";
}
if($oper == "show")
{
   $sql = "SELECT * FROM ajax.test";
   echo $sql;
   $result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
?>
  <table class="table table-bordered" width="100%">
  <tr>
      <td><center>First name</center></td>
      <td><center>Edit</center></td>
      <td><center>Delete</center></td>
    </tr>
<?php
    while($row = mysqli_fetch_assoc($result))
    {
      ?>
      <tr>
        <td><?php echo $row["email"] ?></td>
        <td><input type="button" value="Edit" onclick="fn_edit(<?php echo $row["id"] ?>)"></td>
        <td><input type="button" value="Delete"  onclick="fn_delete(<?php echo $row["id"] ?>)"/></td>
      </tr>
      <?php
    }
    ?>
</table>
<?php
  }
  else
  {
    echo "No data available";
  }
}

if($oper=="edit")
{
  //echo "TEST";
    $editid =$_POST['id'];
    $sql="SELECT * FROM ajax.test where fld_id='$editid'";
    $result = mysqli_query($conn,$sql);
    //$result=mysqli_query($db,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      extract($row);
    //  echo "Name:".$fld_lname;
      ?>
      <div id="tagformedit">
       <label for="email"><b>Email</b></label>
       <input type="text" placeholder="Enter Email" value="<?php echo $name; ?>" name="email" id="email" required>
       <hr>
       <!-- <button type="submit" class="registerbtn" onclick="fn_update(<?php// echo $fld_id; ?>)">Update</button> -->
     </div>

      <?php
    }
}
if($oper=="update")
{
  $editid =$_POST['id'];
  $name =  $_POST['email'];
  $sql="UPDATE ajax.test SET email = '$name' where id ='$editid'";
  echo $sql;
  $result = mysqli_query($conn,$sql);
  echo "sucess";
}

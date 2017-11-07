<html>
    <body bgcolor="#A52A2A">
        <title>Cosmetic</title>
        <h1>Parfumes Limited Edition</h1>
 

<?php
include('db.php');
$error=""; 
$prod_id="";
$prod_name="";
$description="";
$status="";
$price="";

        
if(isset($_POST['btnsave']))
{

    $prod_name=$_POST['txtprod_name'];
    $description=$_POST['txtdescription'];
    $status=$_POST['slostatus'];
    $price=$_POST['txtprice'];
    
    if(strlen($prod_name)<5)
    {
        $error="Product Name at least character!";
    }else
    {
        if($_POST['id']=="")
        {
           $sql="insert into products(PROD_NAME,DESCRIPTION,STATUS,PRICE) values('$prod_name','$description','$status','$price')";
           $query=mysql_query($sql) or die(mysql_error());
           //die($sql);
           if($query)
            {
              header ('Refresh:0; index.php'); 
            }
        }else{
            $sql="update products set PROD_NAME='$prod_name', DESCRIPTION='$description', STATUS='$status', PRICE='$price' where PROD_ID='{$_POST['id']}' ";
            $query=mysql_query($sql) or die(mysql_error());
            if($query)
            {
               header ('Refresh:0; index.php');  
            }
        }
    }
}
if(isset($_POST['edited'])) 
{
    $sql="select * from products where PROD_ID='{$_POST['id']}' ";
    $query=mysql_query($sql);
    $row=mysql_fetch_object($query);
    $prod_id=$row->prod_id;
    $prod_name=$row->PROD_NAME;
    $description=$row->DESCRIPTION;
    $status=$row->STATUS;
    $price=$row->PRICE;
}

if(isset ($_GET['deleted']))
{
    $sql="delete from products where PROD_ID='{$_GET['id']}' ";
    $query=mysql_query($sql);
    if($query)
    {
        header('Refresh:0; index.php');
    }
}
?>
<form action="" method="post">
    <table>
        <tr>
            <td colspan="2"><span style="color:grey;"><?php echo $error;?></span></td>
        </tr>
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="txtprod_name" value="<?php echo $prod_name; ?>"> <input type="hidden" name="txtid" value="<?php $prod_id; ?>"> </td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="txtdescription"><?php echo $description;  ?></textarea></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="slostatus">
                    <option value="1">Availability</option>
                    <option value="0">Exhausted</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="txtprice"></td>
        </tr
        <tr>
            <td>
            <td><input type="submit" value="Save" name="btnsave"</td>
            </td>
        </tr>    
            
        </tr>
    </table>
</form>
    </body>
</html>
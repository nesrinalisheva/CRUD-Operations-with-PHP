<html>
    <body bgcolor="#A52A2A">
        <title>Cosmetic</title>
        <h1>Parfumes Limited Edition</h1>
    </body>
</html>
<?php
include('db.php');

?>
<a href="product.php">Add New</a>
<table cellpadding="5" cellspacing="0" border="1">
    <tr>
        <th>No</th>
        <th>Product</th>
        <th>Description</th>
        <th>Status</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php
    $sql="select * from products";
    $query=mysql_query($sql);
    if(mysql_num_rows($query)>0)
    {
        $i=1;
        while($row=mysql_fetch_object($query))
        {
            $status=($row->STATUS=1)?'Availability':'Exhausted';
    ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row->PROD_NAME; ?></td>
        <td><?php echo $row->DESCRIPTION; ?></td>
        <td><?php echo $row->STATUS; ?></td>
        <td><?php echo $row->PRICE; ?></td>
        <td>
            <a href="product.php?edited=1&id=<?php echo $row->PROD_ID; ?>">Edit</a>
            <a href="product.php?deleted=1&id=<?php echo $row->PROD_ID; ?>">Delete</a>
        </td>
    </tr>
   <?php
        }
    }
     ?>
</table>
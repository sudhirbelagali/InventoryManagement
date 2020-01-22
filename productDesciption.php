<html>
<head>
<title>Add Product Description</title>
</head>
<body>
    <form action="php_action/productAddDescriptionAction.php" method="POST">
    <fieldset>
        <legend>Add Product Description</legend>
        <p>
        <label for="">Product Name</label>
        <?php
        require_once 'php_action/db_connect.php'; 
        echo "<select name='productid'>";
        $sql = "SELECT * FROM product";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {  
            echo "<option value='" . $row['productid'] . "'>" . $row['productName'] . "</option>";
        }   
        }
        echo "</select>";
        ?>
        </p>
        <p>
        <label for="">Description</label>
        <input type="text" name="productDescription" placeholder="Product Description">
        </p>
        <p><input type="submit" name="btn_submit" id=""></p>
    </fieldset>
    </form>
</body></html>
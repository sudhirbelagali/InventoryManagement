<?php
require_once('php_action/db_connect.php'); 
?>
<html>
<head><title>Product Transfer</title></head>
<body>
<form action="php_action/transferAction.php" method="post">
<fieldset>
<legend>Product Transfer</legend>
<p><label>Select Product</label>
<?php
echo "<select name='product'>";
$sql = "SELECT * FROM product";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['productid'] . "'>" .$row['productName'] . "</option>";
}
}
echo "</select>";
?>

</p>
<p><label>Product Description</label>
<?php
echo "<select name='productDescription'>";
$sql = "SELECT * FROM productDescription";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['productDescription'] . "'>" .$row['productDescription'] . "</option>";
}
}
echo "</select>";
?>
</p>

<p>
<label>Transfer to<label>
<?php
echo "<select name='department'>";
$sql = "SELECT * FROM department";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['departmentId'] . "'>" . $row['departmentName'] . "</option>";
}
}
echo "</select>";
?>
</p>
<p>
<label for="">Quantity</label>
<input type="number" name="quantity" placeholder="Enter Quantity" class="form-controls" id="quantity">
</p>
<p>
<label for="">Date</label>
<input type="text" name="date" id="date" class="form-controls">
</p>
<p>
<label for="">Remarks</label>
<input type="text" name="remarks" id="remarks" class="form-controls">
</p>

<p><input type="submit" value="submit" name="submit" /></p>
</fieldset>
</form>
</body>
</html>
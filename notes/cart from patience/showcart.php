<?php
 session_start();
   if(isset($_POST['Modify'])){
	   foreach($_SESSION['Quantity'] as $i => $val){
		   $_SESSION['Quantity'][$i]=$_POST['Modify'][$i];
		   }
		   }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<h2 align="center">購物車</h2>
<hr>
<div align="center">
  <table width="500" border="0" align="center">
    <tr align="center">
      <td><a href="index.php">瀏覽商品</a></td>
      <td>檢視購物車</td>
      <td>清空購物車</td>
 
    </tr>
  </table>
</div>
<br>
<form id="form1" name="form1" method="post" action="showcart.php">
  <table width="700" border="1" align="center">
    <tr align="center">
      <td bgcolor="#FFCC99">商品編號</td>
      <td bgcolor="#FFCC99">商品名稱</td>
      <td bgcolor="#FFCC99">單價</td>
      <td bgcolor="#FFCC99">數量</td>
      <td bgcolor="#FFCC99">小計</td>
    </tr>
    <tr>
    <?php 
	$_SESSION['Total'] = 0;
	foreach($_SESSION['Cart'] as $i => $val){ ?>
      <td><?php echo $_SESSION['Cart'][$i]; ?></td>
      <td><?php echo $_SESSION['Name'][$i]; ?></td>
      <td><?php echo $_SESSION['Price'][$i]; ?></td>
      <td>
      <input name="Modify[]" type="text" id="textfield2" value="<?php echo $_SESSION['Quantity'][$i]; ?>" size="5" /></td>
      <td> 
      <?php //小計與總價格
	  echo $_SESSION['itemTotal'][$i]= $_SESSION['Price'][$i]*$_SESSION['Quantity'][$i];
	  $_SESSION['Total'] += $_SESSION['itemTotal'][$i];
	  ?>
      </td>
    </tr>
     <?php } ?>
    <tr>
      <td colspan="5" align="right">Total：<?php echo $_SESSION['Total'];?></td>
    </tr>
    <tr>
      <td colspan="5" align="right"><input type="image" name="imageField" id="imageField" src="img/update.png" />
        &nbsp;&nbsp;<a href="checkout.php"><img src="img/pay.png" width="61" height="24" /></a></td>
    </tr>
   
  </table>
</form>

</body>
</html>
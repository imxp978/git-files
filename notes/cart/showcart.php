<?php session_start();
if(isset($_POST['Modify'])) {
	foreach($_SESSION['Quantity'] as $i => $val) {
		$_SESSION['Quantity'][$i] = $_POST['Modify'][$i];
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
<h1>購物車</h1>
<table><tr><td><a href="index.php">瀏覽商品</a> 檢視購物車 清空購物車</td></tr></table>

<form name="form1" id="form1" method="post" action="showcart.php">
<table border="1">
    <tr>
        <td>商品編號</td>
        <td>商品名稱</td>
        <td>單價</td>
        <td>數量</td>
        <td>小計</td>
    </tr>
	<?php 
    $_SESSION['Total'] = 0;
    foreach($_SESSION['Cart'] as $i => $val) { ?>
    <tr>
        <td><?php echo $_SESSION['Cart'][$i]; ?></td>
        <td><?php echo $_SESSION['Name'][$i]; ?></td>
        <td><?php echo $_SESSION['Price'][$i]; ?></td>
        <td><input name="Modify[]" type="text" value="<?php echo $_SESSION['Quantity'][$i]; ?>" size="5"/></td>
        <td>
          <?php //小計與總價格
            echo $_SESSION['itemTotal'][$i] = $_SESSION['Price'][$i] * $_SESSION['Quantity'][$i];
            $_SESSION['Total'] += $_SESSION['itemTotal'][$i];
          ?>
        </td>
    </tr>
  <?php } ?>

    
    <tr>
    	<td colspan="5" align="right">Total:<?php echo $_SESSION['Total']; ?></td>
    </tr>
    <tr>
        <td colspan="5" align="right">
            <button type="submit">更新</button>
            <a href="checkout.php">結帳</a>
        </td>
    </tr>
</table>
</form>
</body>
</html>
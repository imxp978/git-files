<?php require_once('Connections/members_conn.php'); ?>
<?php require_once('Connections/members_conn.php'); ?>
<?php 
require_once('Connections/members_conn.php'); 
include("PHPMailerAutoload.php");
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="reg.php";
  $loginUsername = $_POST['Username'];
  $LoginRS__query = sprintf("SELECT Username FROM member WHERE Username=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_members_conn, $members_conn);
  $LoginRS=mysql_query($LoginRS__query, $members_conn) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO member (Username, Password, Email, Authcode) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['Username'], "text"),
                       GetSQLValueString(md5($_POST['Password']), "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Authcode'], "text"));

  mysql_select_db($database_members_conn, $members_conn);
  $Result1 = mysql_query($insertSQL, $members_conn) or die(mysql_error());

  
  //寄出認證信
$Url="http://localhost/Members/auth.php?Username=" . $_POST['Username']
       . "&Authcode=" . $_POST['Authcode'];

$mail= new PHPMailer(); //建立新物件
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->IsSMTP(); //設定使用SMTP方式寄信
$mail->SMTPAuth = true; //設定SMTP需要驗證
$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機
$mail->Port = 465;  //Gamil的SMTP主機的埠號(Gmail為465)。
$mail->CharSet = "utf-8"; //郵件編碼

$mail->Username = "quelquefoi@gmail.com"; //Gamil帳號
$mail->Password = "fmhh rcwa wnus bysj"; //Gmail密碼


$mail->From = "XXX@gmail.com"; //寄件者信箱
$mail->FromName = "XXX購物網客服"; //寄件者姓名
$mail->Subject = " XXX購物網歡迎您";  //郵件標題
$mail->Body =$_POST['Username'] . "你好!<br>"
        ."歡迎你在XXX購物網註冊<br>"
		."若你沒有註冊請忽略這封認證信件<br>"
		."<a href=" . $Url . ">"
		."點一下這裡認證你的帳號 </a>";

$mail->IsHTML(true); //郵件內容為html ( true || false)
$mail->AddAddress($_POST['Email']);
if(!$mail->Send()) {
	echo "發送錯誤: " . $mail->ErrorInfo;
}

  
  

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_members_conn, $members_conn);
$query_Recordset1 = "SELECT * FROM member";
$Recordset1 = mysql_query($query_Recordset1, $members_conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
<h1>reg</h1>
	<div>
    	<form action="<?php echo $editFormAction; ?>" name="form" method="POST" >
        	<table align="center" width="25%" class="table-sm table-striped table-bordered border-primary">
            	<tr>
                	<th>使用者註冊</th>
                </tr>            	
                <tr>
                	<td>
                    	<label>使用者名稱: </label>
                        <input name="Username" type="text" class="form-control"/>
                    </td>
                </tr>            	
                <tr>
                	<td>
                    	<label>密碼: </label>
                        <input name="Password" type="password" class="form-control" />
                    </td>
                </tr>            	
                <tr>
                	<td>
                    	<label>信箱: </label>
                        <input name="Email" type="email" class="form-control"/>
                    </td>
                </tr>
                <tr>
                	<td>
                    	<input name="Authcode" type="hidden" id="Authcode" value=<?php echo $authcode=substr(md5(uniqid(rand())),0,8); ?> />
                    	<a href="index.php">登入</a>
                        <input type="submit" value="註冊">
                        
                  </td>
              </tr>
                
            </table>
        	<input type="hidden" name="MM_insert" value="form" />
    	</form>
    </div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<div>
	<h1 align="center">郵件系統 撰寫新郵件</h1>
	<form name="form1" method="post" action="sendmail.php">
    	<table border="1" align="center">
        	<tr>
            	<td>
                	<label for="to">收件人: </label>
                    <input type="text" name="to" id="to" placeholder:"請輸入收件人"/>
                </td>
            </tr>
            <tr>
            	<td>
                	<label for="subject">主 旨: </label>
                    <input type="text" name="subject" id="subject" placeholder:"請輸入主旨"/>
                </td>
            </tr>
            <tr>
            	<td>
                	<label for="body">內容: </label>
                    <textarea name="body" id="body" rows="10" cols="50"></textarea>
                </td>
            </tr>
            <tr>
            	<td>
                	<input name="send" type="submit" value="立即寄出" />
                    <input name="reset" type="reset" value="清除重寫" />
                </td>
            </tr>
        </table>
    </form>
</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.20/autosize.min.js" integrity="sha512-EAEoidLzhKrfVg7qX8xZFEAebhmBMsXrIcI0h7VPx2CyAyFHuDvOAUs9CEATB2Ou2/kuWEDtluEVrQcjXBy9yw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
	autosize(document.querySelector('#body'));
	</script>
    
<!--	<script src="tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#body'
      });
    </script> -->
    

    
</body>
</html>

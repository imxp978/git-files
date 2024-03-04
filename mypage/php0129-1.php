<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
	<form method="POST" action="php0129-2.php">
		<p>
			<label for="name">姓名: </label>
			<input name="name" type="text" id="name" required><br>
		</p>
		<p>
			<label for="gender">性別: </label>
			<input name="gender" type="radio" id="gender" value="male">男生
			<input name="gender" type="radio" id="gender" value="female">女生
		</p>
		<p>
			<label for="birth">生日: </label>
			<select name="year" required>
				<?php
					for($i = 1900; $i <=2024; $i++){
						echo '<option name="year" value="'.$i.'">'.$i."年</option>";
					}
				?>
			</select>
			<select name="month" required>
				<?php
					for($j = 1; $j <=12; $j++){
						echo '<option name="month" value="'.$j.'">'.$j.'月</option>';
					}
				?>
			</select>
			<select name="day" required>
				<?php
					for($k = 1; $k <=31; $k++){
						echo '<option name="day" value="'.$k.'">'.$k."日</option>";
					}
				?>
			</select>
		</p>
		<p>
			<label for="hobby">興趣: </label>
			<input name="hobby1" id="hobby" type="checkbox" value="打球">打球
			<input name="hobby2" id="hobby" type="checkbox" value="聽音樂">聽音樂
			<input name="hobby3" id="hobby" type="checkbox" value="游泳">游泳
			<input name="hobby4" id="hobby" type="checkbox" value="閱讀">閱讀
			<br>
			<label for="hobby02">興趣 <b>(foreach): </b></label>
			<?php
				$hobby = array("打球", "聽音樂", "游泳", "閱讀", "看電影", "打躲避球");
				foreach ($hobby as $i) {
					echo '<input name="hobby02[]" id="hobby02" type="checkbox" value="'.$i.'" >'.$i;
				}
			?>
		</p>
		<p>
			<input type="submit" value="送出">
		</p>
	</form>
</body>
</html>
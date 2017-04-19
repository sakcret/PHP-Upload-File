<!DOCTYPE html>
<html>
<head>
	<title>Upload file</title>
</head>
<body>
<form enctype="multipart/form-data" action="uploadFile.php" method="POST">
    Send this file: <input name="file_upload" type="file" />
    <br>
    <input type="submit" value="Upload file" />
</form>
</body>
</html>
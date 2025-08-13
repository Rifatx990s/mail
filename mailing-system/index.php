<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Mailing System Test</title>
</head>
<body>
<h2>Send Test Email</h2>
<form method="post" action="send_mail.php">
    <label>To: <input type="email" name="to" required></label><br><br>
    <label>Subject: <input type="text" name="subject" required></label><br><br>
    <label>Body: <textarea name="body" required></textarea></label><br><br>
    <button type="submit">Send Email</button>
</form>
</body>
</html>

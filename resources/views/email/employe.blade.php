<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome to our company, {{ $employe->FullName }}!</h1>
    <p>We're excited to have you on board.</p>
    <p>Below are your details:</p>
    <ul>
        <li><strong>Name:</strong> {{ $employe->FullName }}</li>
        <li><strong>Email:</strong> {{ $employe->email }}</li>
        <li><strong>Password:</strong> {{ $employe->password }}</li>
        <!-- Add more details as needed -->
    </ul>
    <p>Log in to your account <a href="http://127.0.0.1:8000">here</a>.</p>
    <br>
    <p>Please change your password for enhanced security.</p>
    <!-- You can also add more personalized content here -->
</body>
</html>

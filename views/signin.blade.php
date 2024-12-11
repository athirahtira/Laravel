<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
</head>
<body>
    <h1>Sign In</h1>
    <form method="POST" action="/signin">
        @csrf
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Sign In</button>
    </form>
</body>
</html>
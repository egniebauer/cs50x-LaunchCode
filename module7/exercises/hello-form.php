<!DOCTYPE html>
<html>
    <head>
        <title>Hello 0</title>
    </head>
    <body>
        <form action="hello-response.php" method="GET">
            <label>Say </label>
            <select name="greeting">
                <option value="Hello">Hello</option>
                <option value="Hi">Hi</option>
                <option value="How ya doin'" selected>How ya doin'</option>
                <option value="Hola">Hola</option>
                <option value="Top o'the mornin'">Top o'the mornin'</option>
            </select>
            <label>to </label>
            <input type="text" name="username"/>
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>
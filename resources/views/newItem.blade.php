<!DOCTYPE html>
<html>
<head>
    <title>Add New</title>
</head>
<body>
    <form method="post" action="saveThisItem">
        <input type="text" name="title">
        <input type="text" name="price">
        <input type="text" name="author">
        <input type="text" name="editor">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="ok">
    </form>
</body>
</html>
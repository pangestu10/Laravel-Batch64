<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>REGISTRASI</h1>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <h2>Sign Up Form</h2>

    <form action="/welcome" methode="POST">
        @csrf
        <label for="text" >First Name :</label>
        <br>
        <input type="text" name="firstname">
        <br><br>
        <Label>Last Name :</Label>
        <br>
        <input type="text" name="lastname">
        <br><br>
        <label for="">Gender :</label><br><br>
        <input type="radio">Male <br>
        <input type="radio">Female <br><br>
        <label for="">Nationalty :</label><br><br>
        <select name="" id="">
            <option value="">Indonesia</option>
            <option value="">Germany</option>
            <option value="">Japan</option>
        </select>
        <br><br>
        <label for="">Language Spoken</label>
        <br><br>
        <input type="checkbox">Bahasa Indonesia <br>
        <input type="checkbox">Dutch <br>
        <input type="checkbox">Japanese <br>
        <br><br>
        <label for="">Bio :</label><br><br>
        <textarea name="" id="" rows="10" cols="30"></textarea> <br><br>
        <input type="submit" value="SignUp">

    </form>
</body>
</html>
</body>
</html>
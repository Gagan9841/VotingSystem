<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>
<style>
    .container {
        display: flex;
        height: 25em;
        align-items: center;
        justify-content: center;
    }

    .form-div {
        padding: 3em;
        background: linear-gradient(90deg, white, gray);
    }

    input[type="text"] {
        padding: 5px;
    }

    input[type="number"] {
        padding: 5px;
    }

    input[type="password"] {
        padding: 5px;
    }

    input[type="submit"] {
        padding: 5px;
        border: none;
        background-color: black;
        color: white;
    }

    input[type="submit"]:hover {

        background-color: white;
        color: black;
    }

    input[type="reset"] {
        padding: 5px;
        border: none;
        background-color: black;
        color: white;
    }

    input[type="reset"]:hover {
        background-color: white;
        color: black;
    }

    body {
        background: linear-gradient(90deg, brown, gray);
        font-size: 14px;
    }
</style>

<body>
    <div class="container">
        <div class="form-div">
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <h1> Upload your file</h1>
                <input type="file" name="file"><br>
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>
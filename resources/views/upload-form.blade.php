<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        form {
            width: 400px; /* Adjust width as needed */
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            text-align: center;
            color: #333;
        }
        
        label {
            font-weight: bold;
            color: #555;
        }
        
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 15px; /* Adjust padding to increase input height */
            margin: 10px 0 20px 0; /* Adjust margins as needed */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px; /* Adjust padding to increase button height */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="/upload" method="post" enctype="multipart/form-data">
        <h2>Upload Image</h2>
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="image">Choose Image:</label><br>
        <input type="file" id="image" name="image"><br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>

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
        
        button[type="submit"]{
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px; /* Adjust padding to increase button height */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        button[type="reset"]{
            background-color: #db1727;
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

        /* Popup style */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .popup h3 {
            text-align: center;
            color: #333;
        }

        .popup p {
            text-align: center;
            margin: 10px 0;
        }

        .popup .close {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 18px;
            cursor: pointer;
            color: #aaa;
        }
    </style>
</head>
<body>
    <form id="uploadForm" action="/upload" method="post" enctype="multipart/form-data">
        <h2>Upload Image</h2>
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="image">Choose Image:</label><br>
        <input type="file" id="image" name="image"><br><br>
        <button type="reset" onclick="window.location.href = '/'">Back</button>
        <button type="submit">Upload</button>
    </form>

    <div id="popupSuccess" class="popup" style="display: none;">
        <span class="close" onclick="closePopupSuccess()">&times;</span>
        <h3>Success!</h3>
        <p>Image uploaded successfully!</p>
    </div>

    <div id="popupError" class="popup" style="display: none;">
        <span class="close" onclick="closePopupError()">&times;</span>
        <h3>Error!</h3>
        <p>An error occurred while uploading the image.</p>
    </div>

    <script>
        function closePopupSuccess() {
            document.getElementById('popupSuccess').style.display = 'none';
        }

        function closePopupError() {
            document.getElementById('popupError').style.display = 'none';
        }

        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            
            var form = this;
            var formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Display success or fail message in popup
                if (data.image) {
                    document.getElementById('popupSuccess').style.display = 'block';
                    // Clear the form if the upload was successful
                    form.reset();
                } else {
                    document.getElementById('popupError').style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Display error message in popup
                document.getElementById('popupError').style.display = 'block';
            });
        });
    </script>
</body>
</html>

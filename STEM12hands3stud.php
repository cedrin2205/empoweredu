<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php"); 
    exit();
}

if ($_SESSION['user']['role'] !== 'STEM12') {
    header("Location: index.php");  
    exit();
}

?> 
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>User Dashboard</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="upload.css">
      <link rel="stylesheet" href="students.css">

      <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            position: absolute;
            margin-top: -515px;
            position: fixed;
            width: 1500px;
        }
        .contain {
            background-color: transparent;
            position: absolute;
            right: 0;
            padding-left: 100px;
            top: 100px;

        }
        .gallery {
            margin-bottom: 100px;
            margin-left:400px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .alb {
            position: relative;
            width: 200px;
            height: 200px;
            padding: 5px;
            margin-top: 200px;
        }
        .alb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            color: white;
        }
        a {
            text-decoration: none;
            color: black;
        }
        .image-modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            overflow: auto;
        }
        .modal-content {
            z-index: 1;
            margin: auto;
            display: block;
            width: 80%;
            max-width: 30%;
            max-height: 80%;
        }
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        .panel{
            height: 100vh;
            width: 400px;
            background-color:#2a52be;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            z-index:1;
        }
        .bar{
            position: fixed;
            margin-top:-495px;
            height: 200px;
            width: 1800px;
            padding: 50px;
            background-color: skyblue;
        }
        .delete-btn {
            width: 20px;
            height: 20px;
        }
        .download-btn img {
            width: 20px; 
            height: 20px; 
            margin-left: 5px; 
        }
        .btn {
  width: 100%;
  height: 45px;
  background: #162938;
  border: none;
  outline: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 1em;
  color: white;
  font-weight: 500;
  

}
    </style>
  </head>
  <body>
    
        <header>
            <h2 class="logo"> 
                EmpowerEDU
            </h2>
            <a href="STEM12home.php"><button class="btn">Back</button></a>
        </header>

        <section>
            <div class="left-sidebar">
                <div class="profile">
                    <img class="profile-picture" src="img/blob.jpg">
                    <div class="student-info">
                        <p>STEM 12 Student</p>
                        <p class="strand">STEM12</p>
                        <div class="students-STEM">
                            <?php
                                include "database.php";
                            
                                $role = 'STEM12'; 
                            
                                $sql = "SELECT id, full_name FROM users WHERE role = '$role'";
                                $users_result = mysqli_query($conn, $sql) or die("Error in SQL query");

                                if (mysqli_num_rows($users_result) > 0) {
                                    while ($user = mysqli_fetch_assoc($users_result)) {
                                        $full_name = $user['full_name'];
                                        echo " $full_name</p>";

                                    
                                    }
                                } else {
                                    echo "No STEM students found.";
                                }
                                ?>
                        </div>
                </div>
                   
                </div>
                
            </div>

            <div class="modules-wrap">
                <div class="image-modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="expandedImg">
                </div>
            </div>
            <div class="gallery">
                <?php 
                include "stemdb12.php";
                $limit = 5; 
                $sql = "SELECT * FROM stem12hands3 ORDER BY id DESC LIMIT $limit";
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) > 0) {
                    while ($stem12hands3 = mysqli_fetch_assoc($res)) { ?>
                        <div class="alb">
                            <?php 
                            $fileExtension = pathinfo($stem12hands3['image_url'], PATHINFO_EXTENSION);
                            if ($fileExtension === 'pdf') {
                                echo '<img src="img/pdficon.png" alt="PDF File">';
                            } elseif ($fileExtension === 'doc' || $fileExtension === 'docx') {
                                echo '<img src="img/wordicon.png" alt="Word File">';
                            } else {
                                echo '<img src="uploads/'.$stem12hands3['image_url'].'" alt="Uploaded Image">';
                            }
                            ?>
                            <p><?php echo $stem12hands3['filename']; ?></p>
                            <a class="download-btn" href="uploads/<?=$stem12hands3['image_url']?>" download="<?=$stem12hands3['image_url']?>">
                                <img src="img/download.png" alt="Download" width="20" height="20">
                            </a>
                    </div>
                <?php }
            }
            ?>
</div>
         </section>

         <script src="script.js"></script>
         <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
         <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
             
  </body>
</html>
<script>
                document.getElementById('expandedImg').src = imageUrl;
                document.querySelector('.image-modal').style.display = 'block';

        document.querySelector('.close').addEventListener('click', function() {
            document.querySelector('.image-modal').style.display = 'none';
        });

    </script>
</body>
</html>

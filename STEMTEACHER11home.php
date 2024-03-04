<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>User Dashboard</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="upload.css">
      <link rel="stylesheet" href="studentshome.css">
  </head>
  <body>
    
        <header>
            <h2 class="logo"> 
                EmpowerEDU
                <a href="homepage.php"><button class="btn">Logout</button></a>
            </h2>
        </header>

        <section>
            <div class="left-sidebar">
                <div class="profile">
                    <img class="profile-picture" src="img/blob.jpg">
                    <div class="student-info">
                        <p>STEM11 Adviser</p>
                        <p class="strand">STEM 11</p>
                    </div>
                   
                </div>
                
            </div>

            <a href="stemteacher.php"><div class="folders">
                <div class="folder-module1-2">
                   <img class="folder" src="img/folderblue.png">
                   <p>Handouts 1-2</p>
                </div>

                <div class="folder-module3-4">
                    <img class="folder" src="img/folderblue.png">
                    <p>Handouts 3-4</p>
                </div>

               <div class="folder-module5-6">
                    <img class="folder" src="img/folderblue.png">
                    <p>Handouts 5-6</p>
                 </div>
            </div></a>

            <div class="modules-wrap">
                
            </div>
         </section>

         <script src="script.js"></script>
         <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
         <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
             
  </body>
</html>
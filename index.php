<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&family=Shadows+Into+Light&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>

  <!--[if lt IE 9]>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->

</head>
<body>
    <header class="header-fix">
        <div class="header-container">
            <h1><i class="fas fa-table"></i> Form</h1>
        </div>
    </header>

    <div class="container">
        <br>
        <section>
            <aside>
                <h2><i class="fas fa-question"></i>Info</h2>
                <ul>
                    <li><strong>method: POST</strong></li>
                    <li><strong>Mandatory fields</strong></li>
                    <li><strong>Standard field: text and password</strong></li>
                    <li><strong>Checkbox: Checkbox</strong></li>
                    <li><strong>Standard button: submit</strong></li>
            </aside>
            
            <article>
                <h2>Login Form</h2>
                <p>Standard form to enter these <strong>login credentials:</strong></p><br><br>

                <form action="/index.php" method="POST" name="loginForm">

                    <label for="username">Enter your username:</label>
                    <input type="text" name="Username" id="username"></input><br>
                    
                    <label for="password">Enter your password:</label>
                    <input type="password" name="password" id="password"></input><br>

                    <input type="checkbox" name="Remember_me" id="checkbox" class="Remember"></input>
                    <label for= "checkbox"> Remember me </label><br>

                    <input type="submit" name="login" value="Login" class="login"></input> <br><br>

                    <?php
                            if (!empty($_POST) && isset($_POST['login'])) {
                                echo "<div class='result'><b>Values returned by the form:</b><br><ul>";
                                foreach ($_POST as $key => $value) {
                                    
                                    if ($key !== 'dept') {
                                        echo '<li>' . $key . ' =>' . $value . '</li>';
                                    }
                                }
                                echo "</ul></div>";
                            }
                        ?>
                </form>
            </article>
        </section><br>

        <section id="Registrationform">    
                    <aside>
                        <h2><i class="fas fa-question"></i>Info</h2>
                        <ul>
                            <li><b>method: POST</b></li>
                            <li><b>Mandatory fields</b></li>
                            <li><b>Standard field: text, email, data, file and password</b></li>
                            <li><b>Checkbox: checkbox</b></li>
                            <li><b>Radio button: submit</b></li>
                            <li><b>Standard button: submit</b></li>
                        </ul>
                    </aside>
                    
                <article> 
                    <h2>Registration Form</h2>
                    <p>Standard form to <b>online registration</b> on a website:</p><br>
                    <br/>
                    <form action="/index.php" method="POST" enctype="multipart/form-data" class="Form-element" name="registration">

                        <div>
                            <label>Enter your <b>Gender:</b><span class="mandatory">*</span> </label>
                            <div>
                               <label><input type="radio"  name="gender" value="female" />Female</label>
                                <label><input type="radio" name="gender" value="male" />Male</label> 
                            </div>    
                        </div>

                        <div>
                            <label>Enter your <b>Lastname:</b><span class="mandatory">*</span> </label>
                            <input type="text" name="lastname" required/>
                        </div>
                            
                        <div>
                            <label>Enter your <b>Firstname:</b><span class="mandatory">*</span> </label>
                            <input type="text" name="firstname" required/>
                        </div>
                        
                        <div>
                            <label>Enter your <b>Date of Birth:</b><span class="mandatory">*</span> </label>
                            <input type="date" name="birthdate" required/>
                        </div>
                            
                        <div>
                            <label>Enter your <b>Photo:</b><span class="mandatory">*</span> </label>
                            <input type="file" name="imageFile" required/>
                        </div>
                            
                        <div>
                            <label>Enter your <b>Email Address:</b><span class="mandatory">*</span> </label>
                            <input type="email" name="email" required/>
                        </div>
                           
                        <div>
                            <label>Enter your <b>Password:</b><span class="mandatory">*</span> </label>
                            <input type="password" name="password" required/>
                        </div>
                            
                        <div>
                            <label><b>Confirm</b> your Password:<span class="mandatory">*</span> </label>
                            <input type="password" name="confirm-password" required/>
                        </div>
                            
                            <label class="mandatory"><span>*</span> mandatory fields </label>
                            <br/>
                        <div>
                            <label></label>
                            <label><input type="checkbox" id="checkbox" name="TOS" value="checkbox" required/>Accept TOS</label>
                        </div>
                        
                        <div class="align-right">
                            <label></label>
                            <input type="submit" value="registration" name="registration" id="register"/>
                        </div>
                    
                    </form>
                    
                    <?php if (!empty($_POST) && isset($_POST['registration'])) { ?>
                    <div class="result">
                        <b>Values returned by the form:</b><br>
                        <ul>
                            <?php foreach ($_POST as $key => $value) {
                                echo '<li>' . $key . ' => ' . $value . '</li>';
                            } ?>
                        </ul>

                    <?php } ?>
        <?php
        if (!empty($_POST) && isset($_POST['registration']) && $_POST['registration'] === "registration") {

            $imageTmpName = $_FILES['imageFile']['tmp_name'];
            $imageName = $_FILES['imageFile']['name'];
            $imageType = $_FILES['imageFile']['type'];
            $imageSize = $_FILES['imageFile']['size'];

            // Check if file is an actual image
            if (getimagesize($imageTmpName) !== false) {
                // Create directory if not exists
                $uploadDirectory = 'uploads/';
                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }
                
                if (move_uploaded_file($imageTmpName, $uploadDirectory . $imageName)) {
                    
                    echo '<div id="imageView">';
                    echo '<p><b>Image preview:</b></p>';
                    echo '<img src="' . $uploadDirectory . $imageName . '" alt="' . $imageName . '" style="max-width: 250px;">';
                    echo '</div>';
                } else {
                    echo 'Failed to move the uploaded file.';
                }
            } else {
                echo 'File is not an image.';
            }
        } elseif (!empty($_FILES['imageFile'])) {
            echo 'Error uploading file. Error code: ' . $_FILES['imageFile']['error'];
        }
        ?>
                </article>
       </section>

        <section>
            <aside>
                <h2><i class="fas fa-question"></i>Info</h2>
                <ul>
                    <li><strong>method: POST</strong></li>
                    <li><strong>Mandatory fields</strong></li>
                    <li><strong>Placeholder attribute</strong></li>
                    <li><strong>Maxlength and minlength attributes</strong></li>
                    <li><strong>Textarea</strong></li>
                    <li><strong>Standard button: submit</strong></li>
            </aside>
            
            <article>
                <h2>Contact Form</h2>
                    <p>Standard form for making an <b>information request</b> on a website:</p><br>
            
                        <form action="/index.php" method="POST" class="Form-element" name="form">
                            <div>
                                <label>Department you wish to contact: </label>
                                <select name="option" required>
                                    <option value="none">Select...</option>
                                    <option value="Sales Department">Sales Department</option>
                                    <option value="Communication Department">Communication Department</option>
                                    <option value="Technical Department">Technical Department</option>
                                </select>
                            </div>
                            
                            <div>
                                <label>Enter a <strong>Title</strong>: </label>
                                <input name="Title" type="text" placeholder="More than 20 characters"/>
                            </div>

                            <div>
                                <label>Enter your <strong>Question</strong>: </label>
                                <textarea name="Question" placeholder="Maximum of 1000 characters..."></textarea>
                            </div>

                            <div>
                                <label>Enter your <strong>Email address</strong>: </label>
                                <input type="email" name="Email"/>
                            </div>
                                
                                    <div class="align-right">
                                        <label></label>
                                        <input type="submit" value="Contact" name="contact" id="contact"/>
                                    </div>
                            
                        </form>

                    
                        <?php
                            if (!empty($_POST) && isset($_POST['contact'])) {
                                echo "<div class='result'><b>Values returned by the form:</b><br><ul>";
                                foreach ($_POST as $key => $value) {
                                    
                                    if ($key !== 'dept') {
                                        echo '<li>' . $key . ' =>' . $value . '</li>';
                                    }
                                }
                                echo "</ul></div>";
                            }
                        ?>

                    </article>
        </section>
    </div>
</body>                
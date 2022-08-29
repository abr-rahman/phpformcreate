            <?php
            $errname = $erremail = $errwebsite = $errgender = "";
            $name = $email = $website = $comment = $gender = "";
           
  
            if($_SERVER["REQUEST_METHOD"] == "POST"){
              
                if(empty($_POST["name"])){  //name section
                    $errname = "<span style='color: red;'> Name is required. </span>";
                }else{
                    $name = validate($_POST["name"]);
                }
                if(empty($_POST["email"])){  //email section
                    $erremail = "<span style='color: red;'> E-mail is required. </span>";
                 }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){   //email section validation
                    $erremail = "<span style='color: red;'>Invalid E-mail format.</span>";
                 }else{
                    $email = validate($_POST["email"]);
                 }
                 if(empty($_POST["website"])){  //website section
                    $errwebsite = "<span style='color: red;'> Website is required. </span>";
                 }elseif(!filter_var($_POST["website"], FILTER_VALIDATE_URL)){  //website section validation
                    $errwebsite = "<span style='color: red;'>Invalid Website format.</span>";
                 }else{
                    $website = validate($_POST["website"]);
                 }
                 if(empty($_POST["gender"])){   //gender section
                    $errgender = "<span style='color: red;'> Gender is required. </span>";
                 }else{
                    $gender = validate($_POST["gender"]);
                 }

                 $comment    = validate($_POST["comment"]);     //  website section
                

                echo "Name : ". $name . "<br/>";
                echo "E-mail : ". $email . "<br/>";
                echo "Website : ". $website . "<br/>";
                echo "Comment : ". $comment . "<br/>";
                echo "Gender : ". $gender;
    
            }

            function validate($data){
                $data = trim($data);
                $data = htmlspecialchars($data);
                $data = stripcslashes($data);

                return $data;
            }

        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <table>
            <p style="color: red; font-size: 18px">* Required field</p>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" > *<?php echo $errname ?></td>
            </tr>
            <tr>
                <td>E-mail : </td>
                <td><input type="text" name="email"> *<?php echo $erremail ?></td>
            </tr>
            <tr>
                <td>Website : </td>
                <td><input type="text" name="website"> *<?php echo $errwebsite ?></td>
            </tr>
            <tr>
                <td>Comment : </td>
                <td><textarea name="comment" id="" cols="20" rows="3"></textarea></td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td>
                <input type="radio" name="gender" id="" value="male" >Male
                <input type="radio" name="gender" id="" value="female" >Female *<?php echo $errgender ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
            
            </table>
        </form> 

        


</body>
</html>
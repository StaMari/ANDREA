<?php

include('dbConnect.php');

if(isset($_POST['submit'])) {

    $Name = $_POST['Name'];
    $Age= $_POST['Age'];
    $Birth_year = $_POST['Birth_year'];

    $insertNewUser = mysqli_query($con,"INSERT INTO informations (Name, Age, Birth_year) VALUES('$Name', '$Age', '$Birth_year')");

    if($insertNewUser){
        echo "New record created successfully";
    }
    else {
        echo "Error: ".mysqli_error($con);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body {
        margin: 0;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        background-color: pink;
    }
    table {
        border: 1px solid black;
        border-collapse: collapse;
        width: 95%;
    }
    th, td {
        border: 1px solid black;
        text-align: center;
        height: 2rem;
    }
    th {
        background-color: #FF69B4;
    }
    .box {
        width:100%;
        background-color: ;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    input {
        margin-left:;
    }
    .div {
        width:95%;
        margin-top: 20px;
    }
    #btn {
        height: 2rem;
        width: 4rem;
        background-color: #FAA0A0;
        border-radius: 10px;
        
    }
</style>

<body>

<div class= "box">
    <h1>INSERT DATA</h1>
    <form action="index.php" method= "POST">

        <label for="Name"> Name: </label> 
        <input style="margin-left:37px;" type="text" id="Name" Name="Name" required> <br>
        <br>
        <label for="Age"> Age: </label>
        <input style="margin-left:49px;" type="text" id="Age" Name="Age" required> <br>
        <br>
        <label for="Birth_year"> Birth Year: </label> 
        <input style="margin-left:10px;" type="text" id="Birth_year" Name="Birth_year" required> <br>
        <br>
        <input id="btn" style="margin-left:6rem;" type="submit" name="submit" value="Submit">
    </form>
</div>

<div class="div">
<hr>
</div>

<h1>DISPLAY INFORMATION</h1>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Age</th>
            <th>Birth Year</th>
        </tr>
    </thead>

    <tbody>
        <?php

        $result = mysqli_query($con, "SELECT * From informations");
        if(mysqli_num_rows($result) !=0) {
            $count = 0;

            while($users = mysqli_fetch_array($result)){
                $count++;
                echo "<tr>
                         <td>".$count."</td>
                         <td>".$users['Name']."</td>
                         <td>".$users['Age']."</td>
                         <td>".$users['Birth_year']."</td>                
                </tr>";
            }
        }
        else {
            echo "<tr>
            <td colspan = '6' > No Records Found </td>
            </tr>";
        }

        ?>
    </tbody>

</table>
    
</body>
</html>
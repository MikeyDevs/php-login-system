<?php
    include_once "header.php";

    //INCLUDES OUR CLIENT INFO DATABASE CONNECTION
    include_once './database-files/client_database-connection.php';

?>
        <div class="container"> 
            <div class="row justify-content-center">        
                <?php      
                    //QUERY THE DATABASE FOR OUR CLIENT DB DATA AND DISPLAY IT
                    $sqlQuery = "SELECT * FROM clients;";
                    $resultQuery = mysqli_query($conn, $sqlQuery);
                    

                    //DATA WILL ONLY SHOW UP WHEN SESSION ID IS TRUE/USER LOGGED IN
                    if (isset($_SESSION['u_id'])) {
                        echo '<h2 id="your-clients">Your Clients</h2>';

                        //FORM FOR NEW CLIENT ENTRY
                        echo '<div id="new-client-form" class="container">
                            <p class="new-client-info">Enter New Client Info Below!</p>
                            <br>
                            <form action="addclient-api.php" method="POST">
                            <div class="form-group">
                            <input class="form-control" type="text" name="client_name" placeholder="New Client Name">
                            </div>
                            <div class="form-group">
                            <input class="form-control" type="text" name="client_uid" placeholder="New Client ID">
                            </div>
                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </form> 
                            </div>';

                        //WHILE THERE IS DATA IN OUR DATA ARRAY, IT WILL ECHO TO THE SCREEN
                        while ($data = mysqli_fetch_assoc($resultQuery)) {
                            echo 'Client Name: ' . $data['client_name'] . "<br>";
                            echo 'Client ID: ' . $data['client_uid'] . "<br>";
                            echo '<br>';
                        }
                    } else {
                        echo '<h2 class="please-log-in">Please log in or sign up above!</h2>';
                    }
                ?>
            </div>
        </div>

<?php
    include_once "footer.php";
?>

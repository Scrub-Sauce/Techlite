<?php
include_once "../.env.php";
include_once 'phpFunctions.php';
# Connect to DB
$con = connectDB(PRODUCT_DB);

if(isset($_POST['admin'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $admin_sql = "INSERT INTO registrar.admins (user_id) VALUES ($user_id)";
    $results = mysqli_query($con,$admin_sql) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);
    echo "Successfully added user admin: <br />NAME: $name<br />ID: $user_id";
}
if(isset($_POST['update'])) {
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $name = explode(" ", $name);
    $fname = $name[0];
    $lname = $name[1];

    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Shipping variables
    $sadd = $_POST["sadd"];
    $scity = $_POST["scity"];
    $sstate = $_POST["sstate"];
    $szip = $_POST["szip"];

    // Billing variables
    $badd = $_POST["badd"];
    $bcity = $_POST["bcity"];
    $bstate = $_POST["bstate"];
    $bzip = $_POST["bzip"];
    $shipping_sql = "UPDATE registrar.contact_info SET first_name = '$fname',
                   last_name = '$lname', phone_number = '$phone',
                   street_address = '$sadd', city = '$scity',
                   state = '$sstate', zip = '$szip'
                   WHERE user_id = '$user_id'";
    $billing_sql = "UPDATE registrar.payment_info
                    SET billing_address = '$badd', billing_state = '$bstate', billing_city = '$bcity', billing_zip = '$bzip'
                    WHERE user_id = '$user_id'";
    $results = mysqli_query($con,$shipping_sql) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);
    $results2 = mysqli_query($con,$billing_sql) or trigger_error("Query Failed! SQL: $search_sql - Error: ".mysqli_error($con), E_USER_ERROR);
    echo "Successfully updated user: <br />ID: $user_id<br />NAME: $fname $lname<br />EMAIL:
    $email<br />PHONE: $phone<br />Shipping Address: $sadd, $scity $sstate, $szip<br />Billing Address: $badd, $bcity $bstate, $bzip";
}

# Check if user selects delete on a product and removes it from the SQL database
if(isset($_POST['delete'])) {
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];

        $email = $_POST["email"];
        $phone = $_POST["phone"];

        // Shipping variables
        $sadd = $_POST["sadd"];
        $scity = $_POST["scity"];
        $sstate = $_POST["sstate"];
        $szip = $_POST["szip"];

        // Billing variables
        $badd = $_POST["badd"];
        $bcity = $_POST["bcity"];
        $bstate = $_POST["bstate"];
        $bzip = $_POST["bzip"];
    $delete_sql = "DELETE from registrar.user_info where user_id = '$user_id'";
    $results = mysqli_query($con,$delete_sql) or trigger_error("Query Failed! SQL: $delete_sql - Error: ".mysqli_error($con), E_USER_ERROR);
    $delete_sql2 = "DELETE from registrar.contact_info where user_id = '$user_id'";
    $results = mysqli_query($con,$delete_sql2) or trigger_error("Query Failed! SQL: $delete_sql2 - Error: ".mysqli_error($con), E_USER_ERROR);
    $delete_sql3 = "DELETE from registrar.payment_info where user_id = '$user_id'";
    $results = mysqli_query($con,$delete_sql3) or trigger_error("Query Failed! SQL: $delete_sql3 - Error: ".mysqli_error($con), E_USER_ERROR);
    echo "Successfully deleted user: <br />ID: $user_id<br />NAME: $name<br />EMAIL:
    $email<br />PHONE: $phone<br />Shipping Address: $sadd, $scity $sstate, $szip<br />Billing Address: $badd, $bcity $bstate, $bzip";
}

?>
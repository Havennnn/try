<?php

class FormInfoClass {
    private $username, $password;
    private $fname, $lname, $mi, $age, $contact, $email, $address;

    public function setUsername($username){
        $this->username = $username;
    }
    public function getUsername(){
        return $this->username;
    }

    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    
    public function setFName($fname){
        $this->fname = $fname;
    }

    public function getFName(){
        return $this->fname;
    }

    public function setLName($lname){
        $this->lname = $lname;
    }

    public function getLName(){
        return $this->lname;
    }

    public function setMI($mi){
        $this->mi = $mi;
    }

    public function getMI(){
        return $this->mi;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function getAge(){
        return $this->age;
    }

    public function setContact($contact){
        $this->contact = $contact;
    }

    public function getContact(){
        return $this->contact;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }
}

if(isset($_POST['reg_user'])){
    $info = new FormInfoClass();
    $info->setUsername($_POST['reg_username']);
    $user = $info->getUsername();
    $info->setPassword($_POST['reg_password']);
    $plainPassword = $info->getPassword();
    $info->setFName($_POST['fname']);
    $fn = $info->getFName();
    $info->setLName($_POST['lname']);
    $ln = $info->getLName();
    $info->setMI($_POST['mi']);
    $m = $info->getMI();
    $info->setAge($_POST['age']);
    $a = $info->getAge();
    $info->setContact($_POST['contact']);
    $cn = $info->getContact();
    $info->setEmail($_POST['email']);
    $em = $info->getEmail();

    $servername = "localhost";
    $username = "root";
    $dbname = "mysql";

    $conn = mysqli_connect($servername, $username, "", $dbname);
    if(!$conn){
        die("Connection Failed: " . mysqli_connect_error());
    }

    $checkQuery = "SELECT Username FROM b WHERE Username = '$user'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>
            alert('Username already exists. Please choose a different username')
            window.history.back(); 
            </script>";

        echo "<br><br><button onclick='logout()' class='logout-btn buttons'>BACK</button><br><Br>";
        exit();
    }

    $table = "CREATE TABLE IF NOT EXISTS b (
        Username VARCHAR(20) NOT NULL,
        Password VARCHAR(20) NOT NULL,
        FirstName VARCHAR(20),
        LastName VARCHAR(20) NOT NULL,
        MiddleInitial VARCHAR(1),
        Age int(3) NOT NULL,
        ContactNo int(11) NOT NULL,
        Email VARCHAR(25) NOT NULL)";
    

    if (mysqli_query($conn, $table)) {
        echo "Table successfully created";
    } else {
        echo "ERROR";
    }

    echo "<br><br><button onclick='logout()' class='logout-btn buttons'>BACK</button><br><Br>";


    $insert = "INSERT INTO b (Username, Password, FirstName, LastName, MiddleInitial, Age, ContactNo, Email) VALUES ('$user','$plainPassword','$fn','$ln','$m','$a','$cn','$em')";

    if (mysqli_query($conn, $insert)) {
        echo "<h3> * New Account created successfully * </h3>";
    } else {
        echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }

    header("Location: success.php");
    exit();

}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_user'])){
    session_start();
    $info = new FormInfoClass();
    $info->setUsername($_POST['login_username']);
    $login_user = $info->getUsername();
    $info->setPassword($_POST['login_password']);
    $login_pass = $info->getPassword();
    $username = $_POST['login_username'];

    $conn = mysqli_connect("localhost", "root", "", "mysql");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT Username, Password FROM b WHERE Username='$login_user'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['Password'];

            if ($login_pass === $stored_password) {
                $_SESSION['username'] = $username;
                header("Location: portfolio.php");
                exit();
            } else {
                echo "<script>
                    alert('Invalid Password');
                    window.history.back();
                </script>";
            }
        } else {
            echo "<script>
                alert('Invalid Username');
                window.history.back();  
            </script>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

echo "<script> function logout() {
    window.location.href = 'index.php';
    }
    </script>";
?>
<?php

class connect_db
{
    public function connect_db()
    {
        $connect = new mysqli('localhost', 'admin', 'A123321a', 'matrix_base');
        return $connect;
    }
}

class user001 extends connect_db
{
    public function showUser001()
    {
        $mysqli = $this->connect_db();
        $stmt = $mysqli->prepare("SELECT login, password, email, full_name, age, city FROM users");
        $stmt->execute();
        $stmt->bind_result($login, $password, $email, $full_name, $age, $city);

        while ($stmt->fetch()) {
            print_r
            (
                "login: " . $login . "<br>" .
                "Password: " . $password . "<br>" .
                "email: " . $email . "<br>" .
                "Full name: " . $full_name . "<br>" .
                "Age: " . $age . "<br>" .
                "City: " . $city . "<br><br>"
            );
        }
    }

    public function addUser001($login, $password, $email, $full_name, $age, $city)
    {
        $mysqli = $this->connect_db();
        $stmt = $mysqli->prepare("INSERT INTO users (login, password, email, full_name, age, city) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssis', $login, $password, $email, $full_name, $age, $city);
        $stmt->execute();
        $stmt->close();
    }

    public function updateUser($newPassword, $userLogin)
    {
        $mysqli = $this->connect_db();
        $stmt = $mysqli->prepare("UPDATE users SET password=? WHERE login=?");
        $stmt->bind_param('ss', $newPassword, $userLogin);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteUser($userLogin)
    {
        $mysqli = $this->connect_db();
        $stmt = $mysqli->prepare("DELETE FROM users WHERE login=?");
        $stmt->bind_param('s', $userLogin);
        $stmt->execute();
        $stmt->close();
    }

    public function sortPoVozrastu ($sort_age)
    {
        $mysqli = $this->connect_db();
        $stmt = $mysqli->prepare("SELECT full_name, age FROM users WHERE age LIKE ?");
        $stmt->bind_param('s', $sort_age);
        $stmt->execute();
        $stmt->bind_result($full_name, $sort_age);
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();

        do
        {
            echo "Full name: ".$row['full_name']."<br>";
            echo "Age: ".$row['age']."<br><br>";
        }
        while($row = $res->fetch_assoc());
    }
}

$object001 = new user001();
//$object001->showUser001();
//$object001->addUser001('ZvenG2', 'Zven1998', 'zven.g2@gmail.com', 'Imya Zvena', '18', 'Berlin');
//$object001->updateUser('ZvenPWD1998', 'ZvenG2');
//$object001->deleteUser('ZvenG2');
//$object001->sortPoVozrastu('22');

?>

<div>
<form  method="post">
    Login: <input type="text" name="login"><br><br>
    Password: <input type="password" name="password"><br><br>
    email: <input type="email" name="email"><br><br>
    Full name: <input type="text" name="full_name"><br><br>
    Age: <input type="text" name="age"><br><br>
    City: <input type="text" name="city"><br><br>
    <input type="submit" name="button_add_user"><br><br>
</form>
</div>

<?php
/*
echo "<br><br>";
echo "Login: ".$_POST['login']."<br>";
echo "Password:".$_POST['password']."<br>";
echo "email: ".$_POST['email']."<br>";
echo "Full name :".$_POST['full_name']."<br>";
echo "Age: ".$_POST['age']."<br>";
echo "City: ".$_POST['city']."<br>";
*/
?>

<?php



?>

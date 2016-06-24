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

    public function addUser002 ()
    {
        if (isset($_POST['button_add_user'])) {
            if (!empty($_POST['login']) &&
                !empty($_POST['password']) &&
                !empty($_POST['passwordRepeat']) &&
                !empty($_POST['email']) &&
                !empty($_POST['full_name']) &&
                !empty($_POST['age']) &&
                !empty($_POST['city'])
            ) {
                if (($login = $_POST['login']) &&
                    ($password = $_POST['password']) &&
                    ($passwordRepeat = $_POST['passwordRepeat']) &&
                    ($email = $_POST['email']) &&
                    ($full_name = $_POST['full_name']) &&
                    ($age = $_POST['age']) &&
                    ($city = $_POST['city'])
                ) {
                    if ($_POST['password'] == $_POST['passwordRepeat']) {
                        $this->addUser001("$login", "$password", "$email", "$full_name", "$age", "$city");
                        echo 'Вы зарегистрировались';
                    } else {
                        echo 'Ошибка! Пароли не совпадают.';
                    }
                }
            } else {
                echo "Заполните пожалуйста все поля";
            }
        }
    }

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
$object001->addUser002();
//$object001->updateUser('ZvenPWD1998', 'ZvenG2');
//$object001->deleteUser('ZvenG2');
//$object001->sortPoVozrastu('22');

?>

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

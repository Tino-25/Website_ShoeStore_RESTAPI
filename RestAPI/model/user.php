<?php
require_once("model.php");
class Users extends Model
{
    var $table = "user";
    var $contens = "idUser";

    public function login($email, $password){
        $query = "SELECT * FROM user
                    INNER JOIN account ON user.idUser = account.idUser
                    WHERE account.email = '$email' AND account.password = '$password'";
        return $this->conn->query($query)->fetch_assoc();

    }

    public function findUserFull($idUser){
        $query = "SELECT * FROM user INNER JOIN account ON user.idUser = account.idUser WHERE user.idUser = ".$idUser;
        // return $this->conn->query($query)->fetch_assoc();
        $result = $this->conn->query($query);
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;

    }

// Full nghĩa là kết hợp user và account
    public function userFull(){
        $query = "SELECT * FROM $this->table INNER JOIN account ON $this->table.$this->contens = account.idUser";
        $result = $this->conn->query($query);
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function updateFull($data_user, $data_account){
        $v_user = "";
        foreach($data_user as $key => $value){
            $v_user .= $key." = '".$value."',";
        }
        $v_user = trim($v_user, ",");

        $v_account = "";
        foreach($data_account as $key => $value){
            $v_account .= $key." = '".$value."',";
        }
        $v_account = trim($v_account, ",");

        $query_1 = "UPDATE user SET $v_user WHERE idUser = ".$data_user['idUser'];
        if($this->conn->query($query_1)){
            //$v_account .= ', idUser = '.;
            $query_2 = "UPDATE account SET $v_account WHERE idUser = ".$data_account['idUser'];
            $status = $this->conn->query($query_2);
            return $status;
        }

        return false;
    }

    public function insertFull($data_user, $data_account){
        $f_user = "";
        $v_user = "";
        foreach($data_user as $key => $value){
            $f_user .= $key . ",";
            $v_user .= "'" . $value . "',";
        }
        $f_user = trim($f_user, ",");
        $v_user = trim($v_user, ",");

        $f_account = "";
        $v_account = "";
        foreach($data_account as $key => $value){
            $f_account .= $key . ",";
            $v_account .= "'" . $value . "',";
        }
        $f_account = trim($f_account, ",");
        $v_account = trim($v_account, ",");

        $query_1 = "INSERT INTO user($f_user) VALUES ($v_user);";
        if($this->conn->query($query_1)){
            //$v_account .= ', idUser = '.;
            $query_2 = "insert into account(idUser, $f_account) VALUES ( (SELECT max(idUser) FROM user), $v_account );";
            $status = $this->conn->query($query_2);
        }

        if(isset($status) && $status == true){
            setcookie('msg', 'Thêm thành công', time()+2);
            //header('Location: ?mod='.$this->table);
        } else{
            setcookie('msg', 'Thêm không thành công', time() + 2);
            //header('Location: google.com);
        }
    }
}
<?php

class Operations
{
    private $conn;
    private $admin_details;
    private $parent_details;
    private $teacher_details;

    function __construct()
    {
        require_once "dbconfig.php";
        $this->conn = new DBConfig();
        $this->admin_details = "admin_details";
        $this->parent_details = "parent_details";
        $this->teacher_details = "teacher_details";
    }

    function getAdminsDetails()
    {
        try {
            $getData = "select * from $this->admin_details ad";
            $stmt = $this->conn->prepare($getData);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getParentsDetails()
    {
        try {
            $getData = "select * from $this->parent_details pd";
            $stmt = $this->conn->prepare($getData);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getTeachersDetails()
    {
        try {
            $getData = "select * from $this->teacher_details td";
            $stmt = $this->conn->prepare($getData);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getAdminDetailsById($id)
    {
        try {
            $getData = "select * from $this->admin_details td where id=:id";
            $stmt = $this->conn->prepare($getData);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getParentDetailsById($id)
    {
        try {
            $getData = "select * from $this->parent_details td where id=:id";
            $stmt = $this->conn->prepare($getData);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getTeacherDetailsById($id)
    {
        try {
            $getData = "select * from $this->teacher_details td where id=:id";
            $stmt = $this->conn->prepare($getData);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function checkEmailAndPassword($email, $password, $tableName)
    {
        try {
            $checkEmail = "select id,name,email,password from $tableName where email=:email ";
            $stmt = $this->conn->prepare($checkEmail);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $val = $stmt->fetch();
            if (empty($val)) {
                return $val;
            } else {
                if (isset($password) && isset($val['password'])) {
                    if (password_verify($password, $val['password'])) {
                        return $val;
                    }
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insertAdminDetails($name, $mobile, $address, $city, $date_of_birth, $image_path, $email, $password)
    {
        try {
            $dataQuery = "INSERT INTO $this->admin_details (name, mobile,address,city,date_of_birth,image_path,email,password) VALUES (:name,:mobile,:address,:city,date_of_birth,image_path,:email,:password,:phone)";
            $stmt = $this->conn->prepare($dataQuery);
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":date_of_birth", $date_of_birth);
            $stmt->bindParam(":image_path", $image_path);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $pass);
            $stmt->execute();
            if (isset($stmt))
                return "Insert Admin Details Successfully";
            else {
                return "Something is Wrong!";
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function insertParentDetails($name, $mobile, $address, $city, $date_of_birth, $image_path, $cpr, $syndrome_details, $email, $password)
    {
        try {
            $dataQuery = "INSERT INTO $this->admin_details (name, mobile,address,city,date_of_birth,image_path,cpr,syndrome_details,email,password) VALUES (:name,:mobile,:address,:city,date_of_birth,image_path,:cpr,:syndrome_details,:email,:password,:phone)";
            $stmt = $this->conn->prepare($dataQuery);
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":date_of_birth", $date_of_birth);
            $stmt->bindParam(":image_path", $image_path);
            $stmt->bindParam(":cpr", $cpr);
            $stmt->bindParam(":syndrome_details", $syndrome_details);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $pass);
            $stmt->execute();
            if (isset($stmt))
                return "Insert Parent Details Successfully";
            else {
                return "Something is Wrong!";
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function insertTeacherDetails($name, $mobile, $address, $city, $date_of_birth, $image_path, $cpr, $email, $password)
    {
        try {
            $dataQuery = "INSERT INTO $this->admin_details (name, mobile,address,city,date_of_birth,image_path,cpr,email,password) VALUES (:name,:mobile,:address,:city,date_of_birth,image_path,:cpr,:syndrome_details,:email,:password,:phone)";
            $stmt = $this->conn->prepare($dataQuery);
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":date_of_birth", $date_of_birth);
            $stmt->bindParam(":image_path", $image_path);
            $stmt->bindParam(":cpr", $cpr);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $pass);
            $stmt->execute();
            if (isset($stmt))
                return "Insert Teacher Details Successfully";
            else {
                return "Something is Wrong!";
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function deleteAdminDetails($admin_id)
    {
        $getData = "delete from $this->admin_details where id=:uid";
        $stmt = $this->conn->prepare($getData);
        $stmt->bindParam(":uid", $admin_id);
        return $stmt->execute();
    }

    function deleteParentDetails($parent_id)
    {
        $getData = "delete from $this->parent_details where id=:uid";
        $stmt = $this->conn->prepare($getData);
        $stmt->bindParam(":uid", $parent_id);
        return $stmt->execute();
    }

    function deleteTeacherDetails($teacher_id)
    {
        $getData = "delete from $this->teacher_details where id=:uid";
        $stmt = $this->conn->prepare($getData);
        $stmt->bindParam(":uid", $teacher_id);
        return $stmt->execute();
    }

    function updateAdminDetails($admin_id, $name, $mobile, $address, $city, $date_of_birth, $image_path, $password)
    {
        try {
            $dataQuery = "update $this->admin_details set `name`= :name,`mobile`= :mobile,`address`= :address,`city`= :city,`date_of_birth`= :date_of_birth,`image_path`= :image_path,`password` = :password WHERE id=:uid";
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->conn->prepare($dataQuery);
            $stmt->bindParam(":uid", $admin_id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":date_of_birth", $date_of_birth);
            $stmt->bindParam(":image_path", $image_path);
            $stmt->bindParam(":password", $pass);

            $stmt->execute();
            if (isset($stmt))
                return "Update Admin Details Successfully";
            else {
                return "Something is wrong!";
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function updateParentDetails($parent_id, $name, $mobile, $address, $city, $date_of_birth, $image_path,$cpr,$syndrome_details, $password)
    {
        try {
            $dataQuery = "update $this->admin_details set `name`= :name,`mobile`= :mobile,`address`= :address,`city`= :city,`date_of_birth`= :date_of_birth,`image_path`= :image_path,`cpr`=:cpr,`syndrome_details`=:syndrome_details,`password` = :password WHERE id=:uid";
            $stmt = $this->conn->prepare($dataQuery);
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(":uid", $parent_id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":date_of_birth", $date_of_birth);
            $stmt->bindParam(":image_path", $image_path);
            $stmt->bindParam(":cpr", $cpr);
            $stmt->bindParam(":syndrome_details", $syndrome_details);
            $stmt->bindParam(":password", $pass);

            $stmt->execute();
            if (isset($stmt))
                return "Update Parent Details Successfully";
            else {
                return "Something is wrong!";
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function updateTeacherDetails($teacher_id, $name, $mobile, $address, $city, $date_of_birth, $image_path,$cpr, $password)
    {
        try {
            $dataQuery = "update $this->admin_details set `name`= :name,`mobile`= :mobile,`address`= :address,`city`= :city,`date_of_birth`= :date_of_birth,`image_path`= :image_path,`cpr`=:cpr,`password` = :password WHERE id=:uid";
            $stmt = $this->conn->prepare($dataQuery);
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(":uid", $teacher_id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":date_of_birth", $date_of_birth);
            $stmt->bindParam(":image_path", $image_path);
            $stmt->bindParam(":cpr", $cpr);
            $stmt->bindParam(":password", $pass);

            $stmt->execute();
            if (isset($stmt))
                return "Update Teacher Details Successfully";
            else {
                return "Something is wrong!";
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

}


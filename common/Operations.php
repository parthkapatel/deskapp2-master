<?php

class Operations
{
    private $conn;
    private $admin_details;
    private $parent_details;
    private $teacher_details;
    private $kids_details;
    private $lessons;

    function __construct()
    {
        require_once "dbconfig.php";
        $db = new DBConfig();
        $this->conn = $db->DBConnect();
        $this->admin_details = "admin_details";
        $this->parent_details = "parents_details";
        $this->teacher_details = "teacher_details";
        $this->kids_details = "kids_details";
        $this->lessons = "lessons";
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
            $getData = "select * from $this->parent_details";
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
            $getData = "select * from $this->teacher_details";
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
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getChildDetailsByParentId($id)
    {
        try {
            $getData = "select kd.id,kd.name,kd.email,kd.date_of_birth from $this->kids_details kd inner join $this->parent_details pd on kd.parent_id = pd.id where pd.id=:id";
            $stmt = $this->conn->prepare($getData);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    function getTeacherDetailsById($id): array
    {
        try {
            $getData = "select * from $this->teacher_details td where id=:id";
            $stmt = $this->conn->prepare($getData);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function checkEmailAndPassword($email, $password, $tableName)
    {
        try {
            $checkEmail = "select * from $tableName where email=:email ";
            $stmt = $this->conn->prepare($checkEmail);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $val = $stmt->fetch();
            if (empty($val)) {
                return json_encode(["status" => "success", "message" => "Email id is not registered!"]);
            } else {
                if (isset($password) && isset($val['password'])) {
                    if (password_verify($password, $val['password'])) {
                        return json_encode(["status" => "success", "message" => "Login Successfully", "data" => $val]);
                    } else {
                        return json_encode(["status" => "error", "message" => "Password not matched"]);
                    }
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insertAdminDetails($name, $mobile, $address, $city, $date_of_birth, $email, $password)
    {
        try {
            $target_file = $_SERVER["DOCUMENT_ROOT"] . "/Darshan_Sir/deskapp2-master/src/images/profile/" . basename($_FILES["image_path"]["name"]);
            $path = "/src/images/profile/" . basename($_FILES["image_path"]["name"]);
            if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
                $dataQuery = "INSERT INTO $this->admin_details (name, mobile,address,city,date_of_birth,image_path,email,password) VALUES (:name,:mobile,:address,:city,:date_of_birth,:image_path,:email,:password)";
                $stmt = $this->conn->prepare($dataQuery);
                $pass = password_hash($password, PASSWORD_BCRYPT);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":mobile", $mobile);
                $stmt->bindParam(":address", $address);
                $stmt->bindParam(":city", $city);
                $stmt->bindParam(":date_of_birth", $date_of_birth);
                $stmt->bindParam(":image_path", $path);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $pass);
                $stmt->execute();
                if (isset($stmt))
                    return json_encode(["status" => "success", "message" => "Insert Admin Details Successfully"]);
                else {
                    return json_encode(["status" => "error", "message" => "Something is Wrong!"]);
                }
            } else {
                return json_encode(["status" => "error", "message" => "Sorry, there was an error uploading your file."]);
            }

        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function insertLessons()
    {
        try {
            $target_file = $_SERVER["DOCUMENT_ROOT"] . "/Darshan_Sir/deskapp2-master/src/images/profile/" . basename($_FILES["image_path"]["name"]);
            $path = "/src/images/profile/" . basename($_FILES["image_path"]["name"]);
            if (move_uploaded_file($_FILES["lessons"]["tmp_name"], $target_file)) {
                $dataQuery = "INSERT INTO $this->lessons (path) VALUES (:path)";
                $stmt = $this->conn->prepare($dataQuery);
                $stmt->bindParam(":path", $path);
                $stmt->execute();
                if (isset($stmt))
                    return json_encode(["status" => "success", "message" => "Insert Lessons Successfully"]);
                else {
                    return json_encode(["status" => "error", "message" => "Something is Wrong!"]);
                }
            } else {
                return json_encode(["status" => "error", "message" => "Sorry, there was an error uploading your file."]);
            }

        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function insertParentDetails($name, $mobile, $address, $city, $date_of_birth, $email, $password)
    {
        try {
            $target_file = $_SERVER["DOCUMENT_ROOT"] . "/Darshan_Sir/deskapp2-master/src/images/profile/" . basename($_FILES["image_path"]["name"]);
            $path = "/src/images/profile/" . basename($_FILES["image_path"]["name"]);
            if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
                $dataQuery = "INSERT INTO $this->parent_details (name, mobile,address,city,date_of_birth,image_path,email,password) VALUES (:name,:mobile,:address,:city,:date_of_birth,:image_path,:email,:password)";
                $stmt = $this->conn->prepare($dataQuery);
                $pass = password_hash($password, PASSWORD_BCRYPT);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":mobile", $mobile);
                $stmt->bindParam(":address", $address);
                $stmt->bindParam(":city", $city);
                $stmt->bindParam(":date_of_birth", $date_of_birth);
                $stmt->bindParam(":image_path", $path);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $pass);
                $stmt->execute();
                if (isset($stmt))
                    return json_encode(["status" => "success", "message" => "Registration Successfully"]);
                else {
                    return json_encode(["status" => "error", "message" => "Something is Wrong!"]);
                }
            } else {
                return json_encode(["status" => "error", "message" => "Sorry, there was an error uploading your file."]);
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }

    }

    function insertTeacherDetails($name, $mobile, $address, $city, $date_of_birth, $cpr, $email, $password)
    {
        try {
            $target_file = $_SERVER["DOCUMENT_ROOT"] . "/Darshan_Sir/deskapp2-master/src/images/profile/" . basename($_FILES["image_path"]["name"]);
            $path = "/src/images/profile/" . basename($_FILES["image_path"]["name"]);
            if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
                $dataQuery = "INSERT INTO $this->teacher_details (name, mobile,address,city,date_of_birth,image_path,cpr,email,password) VALUES (:name,:mobile,:address,:city,:date_of_birth,:image_path,:cpr,:email,:password)";
                $stmt = $this->conn->prepare($dataQuery);
                $pass = password_hash($password, PASSWORD_BCRYPT);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":mobile", $mobile);
                $stmt->bindParam(":address", $address);
                $stmt->bindParam(":city", $city);
                $stmt->bindParam(":date_of_birth", $date_of_birth);
                $stmt->bindParam(":image_path", $path);
                $stmt->bindParam(":cpr", $cpr);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $pass);
                $stmt->execute();
                if (isset($stmt))
                    return json_encode(["status" => "success", "message" => "Insert Teacher Details Successfully"]);
                else {
                    return json_encode(["status" => "error", "message" => "Something is Wrong!"]);
                }
            } else {
                return json_encode(["status" => "error", "message" => "Sorry, there was an error uploading your file."]);
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function deleteAdminDetails($admin_id): bool
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

    function updateAdminDetails($admin_id, $name, $mobile, $address, $city, $date_of_birth, $password)
    {
        try {
            if (isset($image_path)) {
                $target_file = $_SERVER["DOCUMENT_ROOT"] . "/Darshan_Sir/deskapp2-master/src/images/profile/" . basename($_FILES["image_path"]["name"]);
                $path = "/src/images/profile/" . basename($_FILES["image_path"]["name"]);
                if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
                    $dataQuery = "update $this->admin_details set `name`= :name,`mobile`= :mobile,`address`= :address,`city`= :city,`date_of_birth`= :date_of_birth,`image_path`=:image_path,`password` = :password WHERE id=:uid";
                }
            } else {
                $dataQuery = "update $this->admin_details set `name`= :name,`mobile`= :mobile,`address`= :address,`city`= :city,`date_of_birth`= :date_of_birth,`password` = :password WHERE id=:uid";
            }
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->conn->prepare($dataQuery);
            $stmt->bindParam(":uid", $admin_id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":date_of_birth", $date_of_birth);
            if (isset($image_path)) {
                $stmt->bindParam(":image_path", $path);
            }
            $stmt->bindParam(":password", $pass);

            $stmt->execute();
            if (isset($stmt))
                return json_encode(["status" => "success", "message" => "Update Admin Details Successfully"]);
            else {
                return json_encode(["status" => "error", "message" => "Something is Wrong!"]);
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function updateParentDetails($parent_id, $name, $mobile, $address, $city, $date_of_birth, $password)
    {
        try {
            if (isset($image_path)) {
                $target_file = $_SERVER["DOCUMENT_ROOT"] . "/Darshan_Sir/deskapp2-master/src/images/profile/" . basename($_FILES["image_path"]["name"]);
                $path = "/src/images/profile/" . basename($_FILES["image_path"]["name"]);
                if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
                    $dataQuery = "update $this->admin_details set `name`= :name,`mobile`= :mobile,`address`= :address,`city`= :city,`date_of_birth`= :date_of_birth,`image_path`=:image_path,`password` = :password WHERE id=:uid";
                }
            } else {
                $dataQuery = "update $this->admin_details set `name`= :name,`mobile`= :mobile,`address`= :address,`city`= :city,`date_of_birth`= :date_of_birth,`password` = :password WHERE id=:uid";
            }
            $stmt = $this->conn->prepare($dataQuery);
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(":uid", $parent_id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":date_of_birth", $date_of_birth);
            $stmt->bindParam(":image_path", $path);
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

    function updateTeacherDetails($teacher_id, $name, $mobile, $address, $city, $date_of_birth, $image_path, $cpr, $password)
    {
        try {
            if (isset($image_path)) {
                $target_file = $_SERVER["DOCUMENT_ROOT"] . "/Darshan_Sir/deskapp2-master/src/images/profile/" . basename($_FILES["image_path"]["name"]);
                $path = "/src/images/profile/" . basename($_FILES["image_path"]["name"]);
                if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
                    $dataQuery = "update $this->admin_details set `name`= :name,`mobile`= :mobile,`address`= :address,`city`= :city,`date_of_birth`= :date_of_birth,`image_path`=:image_path,`cpr`=:cpr,`password` = :password WHERE id=:uid";
                }
            } else {
                $dataQuery = "update $this->admin_details set `name`= :name,`mobile`= :mobile,`address`= :address,`city`= :city,`date_of_birth`= :date_of_birth,`cpr`=:cpr,`password` = :password WHERE id=:uid";
            }
            $stmt = $this->conn->prepare($dataQuery);
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(":uid", $teacher_id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":date_of_birth", $date_of_birth);
            if (isset($image_path)) {
                $stmt->bindParam(":image_path", $path);
            }
            $stmt->bindParam(":cpr", $cpr);
            $stmt->bindParam(":password", $pass);

            $stmt->execute();
            if (isset($stmt))
                return json_encode(["status" => "success", "message" => "Update Teacher Details Successfully"]);
            else {
                return json_encode(["status" => "error", "message" => "Something is Wrong!"]);
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

    function updateParentStatus($id, $status)
    {
        try {
            $dataQuery = "update $this->parent_details set `status`= :status WHERE id=:uid";
            $stmt = $this->conn->prepare($dataQuery);
            $stmt->bindParam(":uid", $id);
            $stmt->bindParam(":status", $status);
            $stmt->execute();
            if (isset($stmt))
                return json_encode(["status" => "success", "message" => "Update Parent Status Successfully"]);
            else {
                return json_encode(["status" => "error", "message" => "Something is Wrong!"]);
            }
        } catch (PDOException  $e) {
            echo $e->getMessage();
        }
    }

}


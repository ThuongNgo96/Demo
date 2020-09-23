<?php

/**
 * 
 */
class Database
{
    /**
     * Khai báo biến kết nối
     * @var [type]
     */
    public $link;

    public function __construct()
    {
        $this->link = mysqli_connect("localhost", "root", "", "shopmypham") or die();
        mysqli_set_charset($this->link, "utf8");
    }



    /**
     * [insert description] hàm insert 
     * @param  $table
     * @param  array  $data  
     * @return integer
     */
    public function insert($table, array $data)
    {
        //code
        $sql = "INSERT INTO {$table} ";
        $columns = implode(',', array_keys($data));
        $values  = "";
        $sql .= '(' . $columns . ')';
        foreach ($data as $field => $value) {
            if (is_string($value)) {
                $values .= "'" . mysqli_real_escape_string($this->link, $value) . "',";
            } else {
                $values .= mysqli_real_escape_string($this->link, $value) . ',';
            }
        }
        $values = substr($values, 0, -1);
        $sql .= " VALUES (" . $values . ')';
        // _debug($sql);die;
        mysqli_query($this->link, $sql) or die("Lỗi  query  insert ----" . mysqli_error($this->link));
        return mysqli_insert_id($this->link);
    }


    public function update($table, array $data, array $conditions)
    {
        $sql = "UPDATE {$table}";

        $set = " SET ";

        $where = " WHERE ";

        foreach ($data as $field => $value) {
            if (is_string($value)) {
                $set .= $field . '=' . '\'' . mysqli_real_escape_string($this->link, xss_clean($value)) . '\',';
            } else {
                $set .= $field . '=' . mysqli_real_escape_string($this->link, xss_clean($value)) . ',';
            }
        }

        $set = substr($set, 0, -1);


        foreach ($conditions as $field => $value) {
            if (is_string($value)) {
                $where .= $field . '=' . '\'' . mysqli_real_escape_string($this->link, xss_clean($value)) . '\' AND ';
            } else {
                $where .= $field . '=' . mysqli_real_escape_string($this->link, xss_clean($value)) . ' AND ';
            }
        }

        $where = substr($where, 0, -5);

        $sql .= $set . $where;
        // _debug($sql);die;

        mysqli_query($this->link, $sql) or die("Lỗi truy vấn Update  " . mysqli_error($this->link));

        return mysqli_affected_rows($this->link);
    }
    public function updateview($sql)
    {
        $result = mysqli_query($this->link, $sql)  or die("Lỗi update view " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }
    public function countTable($table)
    {
        $sql = "SELECT id FROM  {$table}";
        $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn countTable----" . mysqli_error($this->link));
        $num = mysqli_num_rows($result);
        return $num;
    }


    /**
     * [delete description] hàm delete
     * @param  $table      [description]
     * @param  array  $conditions [description]
     * @return integer             [description]
     */
    public function delete($table,  $id)
    {
        $sql = "DELETE FROM {$table} WHERE id = $id ";

        mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }
    public function deleteDH($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE MaDH = $id ";

        mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }
    public function deleteCTDH($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE id = $id ";

        mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }
    public function deleteDM($table,  $id)
    {
        $sql = "DELETE FROM {$table} WHERE MaDM = $id ";

        mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }


    public function deleteSP($table,  $id)
    {
        $sql = "DELETE FROM {$table} WHERE MaSP = $id ";

        mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }


    public function deleteTK($table,  $id)
    {
        $sql = "DELETE FROM {$table} WHERE MaNV = $id ";

        mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }

    /**
     * delete array 
     */

    public function deletewhere($table, $data = array())
    {
        foreach ($data as $id) {
            $id = intval($id);
            $sql = "DELETE FROM {$table} WHERE id = $id ";
            mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        }
        return true;
    }
    public function query($sql)
    {
        return mysqli_query($this->link, $sql);
    }
    public function fetchsql($sql)
    {
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn sql " . mysqli_error($this->link));
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function fetchID($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE MaSP = '$id' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function fetchDM($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE MaDM = '$id' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }

    public function fetchSP($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE MaSP = '$id' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function fetchTK($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE ID = '$id' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function fetchTKNNK($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE IDNguoiNhanKhac = '$id' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function fetchTKNV($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE MaNV = '$id' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function fetchTKNVbyUsername($table, $username)
    {
        $sql = "SELECT * FROM {$table} WHERE UserName = '$username' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function fetchidByUsername($table, $username)
    {
        $sql = "SELECT * FROM {$table} WHERE UserName = '$username' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function fetchBillByUsername($table, $idusername)
    {
        $sql = "SELECT * FROM {$table} WHERE ID = '$idusername'";
        $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn fetchAll " . mysqli_error($this->link));
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    
    public function fetchIDdonhang($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE MaDH = '$id' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function fetchIDchitietdonhang($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE MaDH = '$id' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function fetchCTDHByID($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE id = '$id' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    public function fetchUser($table, $user)
    {
        $sql = "SELECT * FROM {$table} WHERE username = '$user' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }
    // public function fetchCTDHbyIdDH($table, $user)
    // {
    //     $sql = "SELECT * FROM {$table} WHERE  = '$user' ";
    //     $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
    //     return mysqli_fetch_assoc($result);
    // }
    public function fetchCommentById($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE id = '$id' ";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchID " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }

    public function fetchOne($table, $query)
    {
        $sql  = "SELECT * FROM {$table} WHERE ";
        $sql .= $query;
        $sql .= "LIMIT 1";
        $result = mysqli_query($this->link, $sql) or die("Lỗi  truy vấn fetchOne " . mysqli_error($this->link));
        return mysqli_fetch_assoc($result);
    }

    public function deletesql($table,  $sql)
    {
        $sql = "DELETE FROM {$table} WHERE " . $sql;
        // _debug($sql);die;
        mysqli_query($this->link, $sql) or die(" Lỗi Truy Vấn delete   --- " . mysqli_error($this->link));
        return mysqli_affected_rows($this->link);
    }
    public function fetchCommentByIdSP($table,$idSP)
    {
        $sql = "SELECT * FROM {$table} WHERE MaSP=$idSP and status='1'";
        $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn fetchAll " . mysqli_error($this->link));
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }


    public function fetchAll($table)
    {
        $sql = "SELECT * FROM {$table} WHERE 1";
        $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn fetchAll " . mysqli_error($this->link));
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }
    public function fetchAllCTHDbyMaHD($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE MaDH ='$id'";
        $result = mysqli_query($this->link, $sql) or die("Lỗi Truy Vấn fetchAll " . mysqli_error($this->link));
        $data = [];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }


    public  function fetchJones($table, $sql, $total = 1, $page, $row, $pagi = true)
    {

        $data = [];

        if ($pagi == true) {
            $sotrang = ceil($total / $row);
            $start = ($page - 1) * $row;
            $sql .= " LIMIT $start,$row ";
            $data = ["page" => $sotrang];


            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        } else {
            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        }

        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }

        return $data;
    }
    public  function fetchJone($table, $sql, $page = 0, $row, $pagi = false)
    {

        $data = [];
        // _debug($sql);die;
        if ($pagi == true) {
            $total = $this->countTable($table);
            $sotrang = ceil($total / $row);
            $start = ($page - 1) * $row;
            $sql .= " LIMIT $start,$row";
            $data = ["page" => $sotrang];

            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        } else {
            $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));
        }

        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        // _debug($data);
        return $data;
    }


    public  function fetchJoneDetail($table, $sql, $page = 0, $total, $pagi)
    {
        $result = mysqli_query($this->link, $sql) or die("Lỗi truy vấn fetchJone ---- " . mysqli_error($this->link));

        $sotrang = ceil($total / $pagi);
        $start = ($page - 1) * $pagi;
        $sql .= " LIMIT $start,$pagi";

        $result = mysqli_query($this->link, $sql);
        $data = [];
        $data = ["page" => $sotrang];
        if ($result) {
            while ($num = mysqli_fetch_assoc($result)) {
                $data[] = $num;
            }
        }
        return $data;
    }

    public function total($sql)
    {
        $result = mysqli_query($this->link, $sql);
        $tien = mysqli_fetch_assoc($result);
        return $tien;
    }
}

<?php

class Product
{

    protected $table = 'products';

    private $_connect;

    public function __construct($connect)
    {
        $this->_connect = $connect;
    }

    /**
     * Đây là phương thức lấy hết tất cả dữ liệu
     */
    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $sth = $this->_connect->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Đây là phương thức lấy 1 dữ liệu
     * @param int $id
     * 
     * @return array
     * */
    public function getOne(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE id=:khoachinh";
        $sth = $this->_connect->prepare($sql);
        $sth->execute(['khoachinh' => $id]);
        return $sth->fetch(PDO::FETCH_ASSOC);
    }


    /**
     * Hàm này dùng để thêm dữ liệu cho bảng sản phẩm
     * @param string $name Đây là tên sản phẩm
     * @param string  $description Đây là mô tả sản phẩm
     * @param string  $image Đây là đường dẫn hình ảnh
     * @param int|float $price Đây là giá có thể truyền 2 kiểu int hoặc float
     * @param bool $status Đây là trạng thái, truyền bool (true/false)
     * 
     * @return bool
     */
    public function insert(string $name, string $description, string $image, int|float $price, bool $status)
    {
        $sql = "INSERT INTO $this->table ( `name`, `description`, `image`, `price`, `status`) 
        VALUES (?,?,?,?,?);";
        $stmt = $this->_connect->prepare($sql);
        return $stmt->execute([$name, $description, $image, $price, $status]);
    }

    /**
     * Hàm này dùng để cập nhật dữ liệu cho bảng sản phẩm
     * @param string $name Đây là tên sản phẩm
     * @param string  $description Đây là mô tả sản phẩm
     * @param string  $image Đây là đường dẫn hình ảnh
     * @param int|float $price Đây là giá có thể truyền 2 kiểu int hoặc float
     * @param bool $status Đây là trạng thái, truyền bool (true/false)
     * @param int $id khoá chính
     * @return bool
     */
    public function update(string $name, string $description, string $image, int|float $price, bool $status, int $id)
    {
        $sql = "UPDATE $this->table SET `name` = ?, `description` = ?, `image` = ?, `price` = ?, `status` = ? WHERE $this->table.`id` = ?;";
        $stmt = $this->_connect->prepare($sql);
        return $stmt->execute([$name, $description, $image, $price, $status, $id]);
    }

    /**
     * Hàm này dùng để Xoá dữ liệu cho bảng sản phẩm
     * @param int $id khoá chính của dữ liệu
     * @return bool
     */
    public function delete(int $id) {
        $sql = "DELETE FROM products WHERE $this->table.`id` = ?";
        $stmt = $this->_connect->prepare($sql);
        return $stmt->execute([$id]);
    }
}

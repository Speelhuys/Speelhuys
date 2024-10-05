<?php
class brand
{
    public $id;
    public $name;
    public $logo;
    // Alle merken ophalen
    public function getBrands()
    {
        $conn = database::start();

        $sql = "SELECT * FROM brands";
        $result = $conn->query($sql);

        $brands = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $brand = new brand();
                $brand->id = $row['brand_id'];
                $brand->name = $row['brand_name'];
                $brand->logo = $row['brand_logo'];
                $brands[] = $brand;
            }
        }
        $conn->close();
        return $brands;
    }
    // Bepaald merk ophalen
    public static function getBrand($id)
    {
        $conn = database::start();
        $brand = null;
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "SELECT * FROM brands WHERE brand_id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $brand = new brand();
                $brand->id = $row['brand_id'];
                $brand->name = $row['brand_name'];
                $brand->logo = $row['brand_logo'];
            }
        }
        $conn->close();
        return $brand;
    }
}
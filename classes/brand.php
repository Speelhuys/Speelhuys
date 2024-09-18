<?php
class brand
{
    public $id;
    public $name;
    public $logo;
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
}
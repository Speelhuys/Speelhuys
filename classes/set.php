<?php
class set
{

    public $id;
    public $name;
    public $description;
    public $brandId;
    public $themeId;
    public $image;
    public $price;
    public $age;
    public $pieces;
    public $stock;

    // Alle sets ophalen
    public function getSets()
    {
        $conn = database::start();

        $sql = "SELECT * FROM sets";
        $result = $conn->query($sql);

        $sets = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $set = new set();
                $set->id = $row['set_id'];
                $set->name = $row['set_name'];
                $set->description = $row['set_description'];
                $set->brandId = $row['set_brand_id'];
                $set->themeId = $row['set_theme_id'];
                $set->image = $row['set_image'];
                $set->price = $row['set_price'];
                $set->age = $row['set_age'];
                $set->pieces = $row['set_pieces'];
                $set->stock = $row['set_stock'];

                $sets[] = $set;
            }
        }
        $conn->close();
        return $sets;
    }
    // Set ophalen met param
    public static function getSet($id)
    {
        $conn = database::start();
        $set = null;
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "SELECT * FROM sets WHERE set_id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $set = new set();
                $set->id = $row['set_id'];
                $set->name = $row['set_name'];
                $set->description = $row['set_description'];
                $set->brandId = $row['set_brand_id'];
                $set->themeId = $row['set_theme_id'];
                $set->image = $row['set_image'];
                $set->price = $row['set_price'];
                $set->age = $row['set_age'];
                $set->pieces = $row['set_pieces'];
                $set->stock = $row['set_stock'];
            }
        }
        $conn->close();
        return $set;
    }
    //Set toevoegen
    public function insert()
    {
        $conn = database::start();
        $name = mysqli_real_escape_string($conn, $this->name);
        $description = mysqli_real_escape_string($conn, $this->description);
        $brandId = mysqli_real_escape_string($conn, $this->brandId);
        $themeId = mysqli_real_escape_string($conn, $this->themeId);
        $image = mysqli_real_escape_string($conn, $this->image);
        $price = mysqli_real_escape_string($conn, $this->price);
        $age = mysqli_real_escape_string($conn, $this->age);
        $pieces = mysqli_real_escape_string($conn, $this->pieces);
        $stock = mysqli_real_escape_string($conn, $this->stock);

        $sql = "INSERT INTO sets ( 
        set_name, 
        set_description,
        set_brand_id,
        set_theme_id,
        set_image,
        set_price,
        set_age,
        set_pieces,
        set_stock
        ) VALUES (
        '" . $name . "',
        '" . $description . "',
        '" . $brandId . "',
        '" . $themeId . "',
        '" . $image . "',
        '" . $price . "',
        '" . $age . "',
        '" . $pieces . "',
        '" . $stock . "'

        )";
        $conn->query($sql);
        $conn->close();
    }
    //Set bewerken
    public function update()
    {
        $conn = database::start();

        $sql = "
        UPDATE
           sets
        SET
           set_name = '" . $conn->real_escape_string($this->name) . "', 
           set_description = '" . $conn->real_escape_string($this->description) . "', 
           set_brand_id = '" . $conn->real_escape_string($this->brandId) . "',
           set_theme_id = '" . $conn->real_escape_string($this->themeId) . "',
           set_image = '" . $conn->real_escape_string($this->image) . "',
           set_price = '" . $conn->real_escape_string($this->price) . "',
           set_age = '" . $conn->real_escape_string($this->age) . "',
           set_pieces = '" . $conn->real_escape_string($this->pieces) . "',
           set_stock = '" . $conn->real_escape_string($this->stock) . "'
        WHERE
           set_id = '" . $conn->real_escape_string($this->id) . "'         
        ";
        $conn->query($sql);
        $conn->close();
    }
    //Set verwijderen met param
    public static function delete($id)
    {
        $conn = database::start();
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "DELETE FROM sets WHERE set_id = $id";
        $conn->query($sql);
        $conn->close();
    }
    //sets filteren
    public static function filterSets($id, $name, $brandid, $themeid, $age, $price)
    {

        $conn = database::start();


        $id = $conn->real_escape_string($id);
        $name = $conn->real_escape_string($name);
        $brandid = $conn->real_escape_string($brandid);
        $themeid = $conn->real_escape_string($themeid);
        $age = $conn->real_escape_string($age);
        $price = $conn->real_escape_string($price);

        $sql = "SELECT * FROM sets WHERE 1=1";

        if (!empty($id)) {
            $sql .= " AND set_id = '$id'";
        }
        if (!empty($name)) {
            $sql .= " AND set_name LIKE '%$name%'";
        }
        if (!empty($brandid)) {
            $sql .= " AND set_brand_id = '$brandid'";
        }
        if (!empty($themeid)) {
            $sql .= " AND set_theme_id = '$themeid'";
        }
        if (!empty($age)) {
            $sql .= " AND set_age >= '$age'";
        }
        if (!empty($price)) {
            $sql .= " AND set_price <= '$price'";
        }


        $result = $conn->query($sql);

        $sets = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $set = new set();
                $set->id = $row['set_id'];
                $set->name = $row['set_name'];
                $set->description = $row['set_description'];
                $set->brandId = $row['set_brand_id'];
                $set->themeId = $row['set_theme_id'];
                $set->image = $row['set_image'];
                $set->price = $row['set_price'];
                $set->age = $row['set_age'];
                $set->pieces = $row['set_pieces'];
                $set->stock = $row['set_stock'];
                $sets[] = $set;
            }
        }

        $conn->close();

        return $sets;
    }
}

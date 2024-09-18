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
    //similair aan de vorige functie, maar haalt (aan de hand van de blog_id) in de plaats van de gegevens van alle blogs alleen gegevens van één blog
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
                $set->brandId = $row['set_price'];
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
    //deze functie zorgt ervoor dat de ingevoerde gegevens in de database komen
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
    //deze functie zorgt ervoor dat de gegevens in de database bewerkt worden
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
    //deze functie zorgt ervoor dat je wat wist uit de database (aan de hand van de blog_id)
    public static function delete($id)
    {
        $conn = database::start();
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "DELETE FROM sets WHERE set_id = $id";
        $conn->query($sql);
        $conn->close();
    }
    public static function filterSets($id, $name, $brandid, $age, $price)
    {
        $conn = database::start();

        $sql = "SELECT * FROM sets WHERE 1=1";

        if ($set_id) {
            $sql .= " AND set_id = '" . $conn->real_escape_string($set_id) . "'";
        }
        if ($set_name) {
            $sql .= " AND set_name LIKE '%" . $conn->real_escape_string($set_name) . "%'";
        }
        if ($set_brand_id) {
            $sql .= " AND set_brand_id = '" . $conn->real_escape_string($set_brand_id) . "'";
        }
        if ($set_age) {
            $sql .= " AND set_age = '" . $conn->real_escape_string($set_age) . "'";
        }
        if ($set_price) {
            $sql .= " AND set_price <= '" . $conn->real_escape_string($set_price) . "'";
        }

        // Execute the query
        $result = $conn->query($sql);

        $sets = [];

        // Fetch results and populate the array
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

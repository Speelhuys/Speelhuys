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

    //deze functie haalt de gegevens van alle sets op
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
                $set->description = $row['set_category'];
                $set->brandId = $row['set_price'];
                $set->themeId = $row['set_themeId'];
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
                $set->description = $row['set_category'];
                $set->brandId = $row['set_price'];
                $set->themeId = $row['set_themeId'];
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
        set_descrition,
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
    public function update($editID, $blogTitle, $blogContent, $image)
    {
        $conn = database::start();
        $editID = mysqli_real_escape_string($conn, $editID);
        $blogTitle = mysqli_real_escape_string($conn, $blogTitle);
        $blogContent = mysqli_real_escape_string($conn, $blogContent);
        $image = mysqli_real_escape_string($conn, $image);
        $sql = "
        UPDATE
           blogs
        SET
           blog_title = '" . $blogTitle . "', 
           blog_content = '" . $blogContent . "', 
           blog_image = '" . $image . "' 
        WHERE
           blog_id = '" . $editID . "'         
        ";
        $conn->query($sql);
    }
    //deze functie zorgt ervoor dat je wat wist uit de database (aan de hand van de blog_id)
    public static function delete($id)
    {
        $conn = database::start();
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "DELETE FROM blogs WHERE blog_id = $id";
        $conn->query($sql);
        $conn->close();
    }
    //deze functie haalt de gegevens van alle blogs in de database op
    public static function allBlogs()
    {
        $conn = database::start();

        $sql = "SELECT * FROM blogs";
        $result = $conn->query($sql);

        $blogs = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $blog = new blog();
                $blog->blogID = $row['blog_id'];
                $blog->blogTitle = $row['blog_title'];
                $blog->blogContent = $row['blog_content'];
                $blog->blogImage = $row['blog_image'];
                $blog->blogAuthor = $row['blog_author'];
                $blogs[] = $blog;
            }
        }
        $conn->close();
        return $blogs;
    }
}

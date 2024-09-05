<?php
class set
{

    public $id;
    public $name;
    public $description;
    public $brandId;
    public $themeId;
    
    //deze functie haalt de gegevens van alle blogs van een bepaalde schrijver uit de database op
    public static function getBlogs($blogAuthor)
    {
        $conn = database::start();

        $blogAuthor = mysqli_real_escape_string($conn, $blogAuthor);

        $sql = "SELECT * FROM blogs WHERE blog_author = '$blogAuthor'";
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
    //similair aan de vorige functie, maar haalt (aan de hand van de blog_id) in de plaats van de gegevens van alle blogs alleen gegevens van één blog
    public static function getBlog($id)
    {
        $conn = database::start();
        $blog = null;
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "SELECT * FROM blogs WHERE blog_id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $blog = new blog();
                $blog->blogID = $row['blog_id'];
                $blog->blogTitle = $row['blog_title'];
                $blog->blogContent = $row['blog_content'];
                $blog->blogImage = $row['blog_image'];
                $blog->blogAuthor = $row['blog_author'];
            }
        }
        $conn->close();
        return $blog;
    }
    //deze functie zorgt ervoor dat de ingevoerde gegevens in de database komen
    public function insert($blogTitle, $blogContent, $blogImage, $blogAuthor)
    {
        $conn = database::start();
        $blogTitle = mysqli_real_escape_string($conn, $blogTitle);
        $blogContent = mysqli_real_escape_string($conn, $blogContent);
        $blogImage = mysqli_real_escape_string($conn, $blogImage);
        $blogAuthor = mysqli_real_escape_string($conn, $blogAuthor);

        $sql = "INSERT INTO blogs ( 
        blog_title, 
        blog_image,
        blog_content,
        blog_author
        ) VALUES (
        '" . $blogTitle . "',
        '" . $blogImage . "',
        '" . $blogContent . "',
        '" . $blogAuthor . "'
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

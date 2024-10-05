<?php
class theme
{
    public $id;
    public $name;
    // Alle themas ophalen
    public function getThemes()
    {
        $conn = database::start();

        $sql = "SELECT * FROM themes";
        $result = $conn->query($sql);

        $themes = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $theme = new theme();
                $theme->id = $row['theme_id'];
                $theme->name = $row['theme_name'];
                $themes[] = $theme;
            }
        }
        $conn->close();
        return $themes;
    }
    // Bepaald thema ophalen
    public static function getTheme($id)
    {
        $conn = database::start();
        $theme = null;
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "SELECT * FROM themes WHERE theme_id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $theme = new theme();
                $theme->id = $row['theme_id'];
                $theme->name = $row['theme_name'];
            }
        }
        $conn->close();
        return $theme;
    }
}
<?php
// this file contains the php objects that will be used for create html objects

function aMake() {
    return func_get_args();
}

// Table object
class Table {
    // args is the needed data keys from the database
    public $args;
    // is the retreived data from the database
    public $json_data;
    public function __construct($args, $json_data) {
        $this->args = $args;
        $this->json_data = $json_data;
    }
    // headers -> the header of the table as a json object
    function CreateTable($rows, $headers, $table) {
        echo "<table dir='rtl'>";
        echo "<thead>";
        echo "<tr>";
        foreach ($headers as $header) {
            echo "<td>";
            echo $header;
            echo "</td>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        for ($i = 0; $i < $rows; $i++) {
            echo "<tr>";
            foreach ($this->args as $key) {
                echo "<td>";
                if ($key == 'gender') {
                    if ($this->json_data[$key][$i] == 1) {
                        print('أنثى');
                    } else if ($this->json_data[$key][$i] == 0){
                        print('ذكر');
                    }
                } elseif ($key == 'delete') {
                    echo "<form action='/nabta/Nabta/php/delete.php?table=$table' method='post'>";
                    echo "<input name='id' type='hidden' value='";
                    print_r($this->json_data['ID'][$i]);
                    echo "'>";
                    echo "<button type='submit' name='delete' class='delete'> حذف</button>";
                    echo "</form>";
                } else {
                    print_r($this->json_data[$key][$i]);
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody";
        echo "</table>";
    }
}

class Navbar {
    // routes of the navbar
    public $routes;
    public function __construct($routes) {
        $this->routes = $routes;
    }
    // active is for the active selection in the navbar
    function CreateNavbar($active = '') {
        echo "<ul class='links'>";
        // route is a list of the { route, name }
        // {route} is the path for this specific element
        // {name} is the name which will be shown in the html
        foreach ($this->routes as $name => $route) {
            echo "<li class='$name'";
            if ($name == $active) {
                echo "id = '$active'";
            }
            echo "><a href='";
            print $route['route'];
            echo "'>";
            print $route['name'];
            echo "</a></li>";
        }
        echo "</ul>";
    }
}
?>

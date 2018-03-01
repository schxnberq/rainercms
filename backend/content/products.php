<?php
if (!isset($page[1]) || $page[1] == "list") {
    include "content/products/list.php";
} elseif ($page[1] == "delete") {
    include "includes/product_delete.php";
} elseif ($page[1] == "new") {
    include "content/products/new.php";
} elseif ($page[1] == "edit") {
    include "content/products/$page[1].php";
}


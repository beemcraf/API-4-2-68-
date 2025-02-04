<?php
header("Access-Control-Allow-Origin: *"); // แก้ไขการสะกด
header("Content-Type: application/json; charset=UTF-8");
include '../db.php';
try {
    $attractions = array(); // เริ่มต้นอาเรย์
    foreach($dbh->query('SELECT * from attractions') as $row) {
        $attraction = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'coverimage' => $row['coverimage'],
            'detail' => $row['detail'],
        );
        array_push($attractions, $attraction); // เพิ่มข้อมูลเข้าไปในอาเรย์
    }
    echo json_encode($attractions);
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
}
die();
?>

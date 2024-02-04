<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = file_get_contents('php://input');
    $data = json_decode($content, true);

    if (!empty($data)) {
        $parkingSpot = $conn->real_escape_string($data['parkingSpot']);
        $status = $conn->real_escape_string($data['status']);
        $timeIn = $conn->real_escape_string($data['timeIn']);
        $checkStatus = 0;

        $select_sql = "SELECT * FROM Parking WHERE park_id = '$parkingSpot'";
        $result = $conn->query($select_sql);
        if (!$result) {
            die('MySQL Error: ' . mysqli_error($conn));
        }
        while ($row = $result->fetch_assoc()) {
            $checkStatus = $row['status'];
        }

        // Use prepared statements to prevent SQL injection
        if ($checkStatus == 1) {
            $getDetailId = "SELECT p_detail_id FROM parking_detail WHERE parking_id = '$parkingSpot' ORDER BY p_detail_id DESC LIMIT 1";
            $rs = $conn->query($getDetailId);
            $row = $rs->fetch_assoc();
            $last_p_id = $row['p_detail_id'];

            $updateCheckOut = $conn->prepare("UPDATE parking_detail SET check_out = ? WHERE p_detail_id = ?");
            $updateCheckOut->bind_param("si", $timeIn, $last_p_id);
            $updateCheckOut->execute();

            $updateDuration = $conn->prepare("UPDATE parking_detail SET duration = TIMESTAMPDIFF(MINUTE, check_in, check_out) WHERE p_detail_id = ?");
            $updateDuration->bind_param("i", $last_p_id);
            $updateDuration->execute();

            $updateStatus = $conn->prepare("UPDATE Parking SET status = 0 WHERE park_id = ?");
            $updateStatus->bind_param("s", $parkingSpot);
            $updateStatus->execute();

            echo json_encode(["message" => "success Update"]);
        } else {
            $updateStatus = $conn->prepare("UPDATE Parking SET status = ? WHERE park_id = ?");
            $updateStatus->bind_param("ss", $status, $parkingSpot);
            $updateStatus->execute();
            if (!$updateStatus) {
                die('MySQL Error: ' . $updateStatus->error);
            }
            $insertDetail = $conn->prepare("INSERT INTO parking_detail (check_in, parking_id) VALUES (?, ?)");
            $insertDetail->bind_param("ss", $timeIn, $parkingSpot);
            $insertDetail->execute();
if (!$insertDetail) {
    die('MySQL Error: ' . $insertDetail->error);
}
            echo json_encode(["message" => "success Insert"]);
        }

        // Close prepared statements
        $updateCheckOut->close();
        $updateDuration->close();
        $updateStatus->close();
        $insertDetail->close();
    } else {
        echo json_encode(["message" => "No data received"]);
    }

    // Close database connection
    $conn->close();
} else {
    // In case it's not a POST method
    http_response_code(412); // HTTP 412 Precondition Failed
    echo json_encode(["message" => "Precondition Failed"]);
    die();
}
?>

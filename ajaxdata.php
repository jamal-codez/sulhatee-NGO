<?php
session_start();
require_once ("_include/connection.php");

if (isset($_POST['action'])) {
    $action = $conn->real_escape_string($_POST['action']);

    switch ($action) {
        case 'fetchLGAS':
            $state = $conn->real_escape_string($_POST['state']);
            $get_lga_sql = "SELECT * FROM `lga` WHERE `stateid` = ? ORDER BY `lga`";
            $stmt = $conn->prepare($get_lga_sql);
            $stmt->bind_param('s', $state);
            $stmt->execute();
            $get_lga_r = $stmt->get_result();
            $lgas = '<option value="-">--Select Local Government--</option>';

            if ($get_lga_r->num_rows > 0) {
                while ($lga = $get_lga_r->fetch_assoc()) {
                    $id = $lga['id'];
                    $name = $lga['lga'];
                    $lgas .= "<option value='$id'" . selLGA($id) . ">$name</option>";
                }
            } else {
                $lgas = '<option>No Local Government Found!</option>';
            }

            echo $lgas;
            break;

        case 'fetchWards':
            $lga = $conn->real_escape_string($_POST['lga']);
            $get_ward_sql = "SELECT * FROM `ward` WHERE `lga_id` = ? ORDER BY `ward`";
            $stmt = $conn->prepare($get_ward_sql);
            $stmt->bind_param('s', $lga);
            $stmt->execute();
            $get_ward_r = $stmt->get_result();
            $wards = '<option value="-">--Select Ward--</option>';

            if ($get_ward_r->num_rows > 0) {
                while ($ward = $get_ward_r->fetch_assoc()) {
                    $id = $ward['id'];
                    $name = $ward['ward'];
                    $wards .= "<option value='$id'" . selWard($id) . ">$name</option>";
                }
            } else {
                $wards = '<option>No ward Found!</option>';
            }

            echo $wards;
            break;
    }
}
?>

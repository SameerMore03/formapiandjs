<?php
// session_start();
// $dbConn ='';
require('../../assets/connection.php');
// $dbConn = getDB();

date_default_timezone_set('Asia/Kolkata');
$added_on =  date('d-m-Y h:i:s');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// print_r($_POST);
$response["response"] = array();
$data = array();

if (isset($_POST['request'])) {
    $request = $_POST['request'];
    // print_r($_POST);
    if ($request == 'insert_basic_data_1') {
        $material_group = $_POST['material_group'];
        $plant = $_POST['plant'];
        $stg_loc = $_POST['stg_loc'];
        $uom = $_POST['uom'];
        $storage_type = $_POST['storage_type'];
        $distribution_channel = $_POST['distribution_channel'];
        // $material_long_text = $_POST['material_long_text'];
        $warehouse_number = $_POST['warehouse_number'];
        $request_number = $_POST['request_number'];
        // $division = $_POST['division'];
        $material_desc = $_POST['material_desc'];
        $external_material_group = $_POST['external_material_group'] ?? '';
        $customer = $_POST['customer'];
        $form_id = $_POST['form_id'];
        $encoded_form_id = base64_encode($form_id); //added
        $UrlType = $_POST['UrlType']; //added
        $sql_insert = $dbConn->prepare("UPDATE `form` SET `material_group` = :material_group,`plant` = :plant,`stg_loc` = :stg_loc,`uom` = :uom,`storage_type` = :storage_type,`distribution_channel`= :distribution_channel,`warehouse_number`= :warehouse_number, `request_number` = :request_number,`material_desc` = :material_desc,`external_material_group` = :external_material_group,`customer`= :customer, `status` = 'A', `added_on` = :added_on,`added_by` = 'Self' WHERE form_id = :form_id"); //check if copycode exist
        $sql_insert->bindParam(":material_group", $material_group, PDO::PARAM_STR);
        // $sql_insert->bindParam(":division", $division, PDO::PARAM_STR);
        $sql_insert->bindParam(":material_desc", $material_desc, PDO::PARAM_STR);
        $sql_insert->bindParam(":plant", $plant, PDO::PARAM_STR);
        $sql_insert->bindParam(":stg_loc", $stg_loc, PDO::PARAM_STR);
        $sql_insert->bindParam(":uom", $uom, PDO::PARAM_STR);
        $sql_insert->bindParam(":storage_type", $storage_type, PDO::PARAM_STR);
        $sql_insert->bindParam(":distribution_channel", $distribution_channel, PDO::PARAM_STR);
        // $sql_insert->bindParam(":material_long_text", $material_long_text, PDO::PARAM_STR);
        $sql_insert->bindParam(":warehouse_number", $warehouse_number, PDO::PARAM_STR);
        $sql_insert->bindParam(":request_number", $request_number, PDO::PARAM_STR);
        $sql_insert->bindParam(":external_material_group", $external_material_group, PDO::PARAM_STR);
        $sql_insert->bindParam(":customer", $customer, PDO::PARAM_STR);
        $sql_insert->bindParam(":added_on", $added_on, PDO::PARAM_STR);
        $sql_insert->bindParam(":form_id", $form_id, PDO::PARAM_STR);
        $sql_insert->execute();
        $count_insert = $sql_insert->rowCount();
        if ($count_insert >= 0) {
            $data["status"] = "success";
            $data["reason"] = "basic_data_1_inserted_successfully";
            $data["encoded_form_id"] = $encoded_form_id;
            $data["UrlType"] = $UrlType;
            array_push($response["response"], $data);
        } else {
            $data["status"] = "failed";
            $data["reason"] = "basic_data_1_inserted_failed";
            array_push($response["response"], $data);
        }
    }

    if ($request == 'update_basic_data_1') {
        $material_group = $_POST['material_group'];
        // $division = $_POST['division'];
        $plant = $_POST['plant'];
        $stg_loc = $_POST['stg_loc'];
        $uom = $_POST['uom'];
        $storage_type = $_POST['storage_type'];
        $distribution_channel = $_POST['distribution_channel'];
        // $material_long_text = $_POST['material_long_text'];
        $warehouse_number = $_POST['warehouse_number'];
        $request_number = $_POST['request_number'];
        $material_desc = $_POST['material_desc'];
        $external_material_group = $_POST['external_material_group'];
        $customer = $_POST['customer'];
        $form_id = $_POST['form_id'];
        $encoded_form_id = base64_encode($form_id); //added
        $UrlType = $_POST['UrlType']; //added
        $sql_insert = $dbConn->prepare("UPDATE `form` SET `material_group` = :material_group,`plant` = :plant,`stg_loc` = :stg_loc,`uom` = :uom,`storage_type` = :storage_type,`distribution_channel`= :distribution_channel,`warehouse_number`= :warehouse_number, `request_number` = :request_number,`material_desc` = :material_desc,`external_material_group` = :external_material_group, `customer`= :customer,`status` = 'A', `modified_on` = :modified_on,`modified_by` = 'Self' WHERE form_id = :form_id"); //check if copycode exist
        $sql_insert->bindParam(":material_group", $material_group, PDO::PARAM_STR);
        // $sql_insert->bindParam(":division", $division, PDO::PARAM_STR);
        $sql_insert->bindParam(":plant", $plant, PDO::PARAM_STR);
        $sql_insert->bindParam(":stg_loc", $stg_loc, PDO::PARAM_STR);
        $sql_insert->bindParam(":uom", $uom, PDO::PARAM_STR);
        $sql_insert->bindParam(":storage_type", $storage_type, PDO::PARAM_STR);
        $sql_insert->bindParam(":distribution_channel", $distribution_channel, PDO::PARAM_STR);
        // $sql_insert->bindParam(":material_long_text", $material_long_text, PDO::PARAM_STR);
        $sql_insert->bindParam(":warehouse_number", $warehouse_number, PDO::PARAM_STR);
        $sql_insert->bindParam(":request_number", $request_number, PDO::PARAM_STR);
        $sql_insert->bindParam(":material_desc", $material_desc, PDO::PARAM_STR);
        $sql_insert->bindParam(":external_material_group", $external_material_group, PDO::PARAM_STR);
        $sql_insert->bindParam(":customer", $customer, PDO::PARAM_STR);
        $sql_insert->bindParam(":modified_on", $added_on, PDO::PARAM_STR);
        $sql_insert->bindParam(":form_id", $form_id, PDO::PARAM_STR);
        $sql_insert->execute();
        $count_insert = $sql_insert->rowCount();
        if ($count_insert >= 0) {
            $data["status"] = "success";
            $data["reason"] = "basic_data_1_updated_successfully";
            $data["encoded_form_id"] = $encoded_form_id;
            $data["UrlType"] = $UrlType;
            array_push($response["response"], $data);
        } else {
            $data["status"] = "failed";
            $data["reason"] = "basic_data_1_update_failed";
            array_push($response["response"], $data);
        }
    }
    echo json_encode($response);
}

<?php
/**
 * Created by PhpStorm.
 * @author: Kate
 * @date: 2023/4/8 6:32 PM
 */


require_once 'db.php';

class Controller
{
    private $db;

    public function __construct()
    {
        $this->db = (new DB())->connect();
    }
    // 1、平台运营指标
    public function getOperationData()
    {
        $result = $this->db->query("SELECT * FROM operation where `date` = '202304'");

        $operations = [];
        while ($row = $result->fetch_assoc()) {
            $area = $row['area'];
            if (!isset($operations[$area])) {
                $operations[$area] = [];
            }
            $operations[$area][] = $row;
        }

        return $operations;
    }
    // 4、客服管理
    public function getCustomer_service()
    {
        $result = $this->db->query("SELECT * FROM customer_service where `date` = '202304'");

        $customer_service = [];
        while ($row = $result->fetch_assoc()) {
            $area = $row['area'];
            if (!isset($customer_service[$area])) {
                $customer_service[$area] = [];
            }
            $customer_service[$area][] = $row;
        }

        return $customer_service;
    }
    // 5、智慧工单
    public function getWisdom_ticket()
    {
        $result = $this->db->query("SELECT * FROM wisdom_ticket where `date` = '202304'");

        $wisdom_ticket = [];
        while ($row = $result->fetch_assoc()) {
            $area = $row['area'];
            if (!isset($wisdom_ticket[$area])) {
                $wisdom_ticket[$area] = [];
            }
            $wisdom_ticket[$area][] = $row;
        }

        return $wisdom_ticket;
    }
    // 缴费管理
    public function getPayment_manager()
    {
        $result = $this->db->query("SELECT * FROM payment_manager where `date` = '202304'");

        $payment_manager = [];
        while ($row = $result->fetch_assoc()) {
            $area = $row['area'];
            if (!isset($payment_manager[$area])) {
                $payment_manager[$area] = [];
            }
            $payment_manager[$area][] = $row;
        }

        return $payment_manager;
    }

    // 维修工单
    public function getMaintenance_Ticket()
    {
        $result = $this->db->query("SELECT * FROM maintenance_ticket where `date` = '202304'");

        $maintenance_ticket = [];
        while ($row = $result->fetch_assoc()) {
            $area = $row['area'];
            if (!isset($maintenance_ticket[$area])) {
                $maintenance_ticket[$area] = [];
            }
            $maintenance_ticket[$area][] = $row;
        }

        return $maintenance_ticket;
    }

    // 巡航巡检
    public function getPerform_Inspection()
    {
        $result = $this->db->query("SELECT * FROM perform_inspection where `date` = '202304'");

        $perform_inspection = [];
        while ($row = $result->fetch_assoc()) {
            $area = $row['area'];
            if (!isset($perform_inspection[$area])) {
                $perform_inspection[$area] = [];
            }
            $perform_inspection[$area][] = $row;
        }

        return $perform_inspection;
    }

    //6、采购库存
    public function getProcurement_Inventory()
    {
        $result = $this->db->query("SELECT * FROM procurement_inventory where `date` = '202304'");

        $procurement_inventory = [];
        while ($row = $result->fetch_assoc()) {
            $area = $row['area'];
            if (!isset($procurement_inventory[$area])) {
                $procurement_inventory[$area] = [];
            }
            $procurement_inventory[$area][] = $row;
        }

        return $procurement_inventory;
    }

    //7、设施设备：
    public function getFacility_Equipment()
    {
        $result = $this->db->query("SELECT * FROM facility_equipment where `date` = '202304'");

        $facility_equipment = [];
        while ($row = $result->fetch_assoc()) {
            $area = $row['area'];
            if (!isset($facility_equipment[$area])) {
                $facility_equipment[$area] = [];
            }
            $facility_equipment[$area][] = $row;
        }

        return $facility_equipment;
    }

    //8、合同管理：
    public function getContract_Management()
    {
        $result = $this->db->query("SELECT * FROM contract_management where `date` = '202304'");

        $contract_management = [];
        while ($row = $result->fetch_assoc()) {
            $area = $row['area'];
            if (!isset($contract_management[$area])) {
                $contract_management[$area] = [];
            }
            $contract_management[$area][] = $row;
        }

        return $contract_management;
    }

    //9、电商运营
    public function getEcommerce_Operation()
    {
        $result = $this->db->query("SELECT * FROM ecommerce_operation where `date` = '202304'");

        $ecommerce_operation = [];
        while ($row = $result->fetch_assoc()) {
            $area = $row['area'];
            if (!isset($ecommerce_operation[$area])) {
                $ecommerce_operation[$area] = [];
            }
            $ecommerce_operation[$area][] = $row;
        }

        return $ecommerce_operation;
    }

    //10、健康会所
    public function getHealth_Club()
    {
        $result = $this->db->query("SELECT * FROM health_club where `date` = '202304'");

        $health_club = [];
        while ($row = $result->fetch_assoc()) {
            $area = $row['area'];
            if (!isset($health_club[$area])) {
                $health_club[$area] = [];
            }
            $health_club[$area][] = $row;
        }

        return $health_club;
    }

}



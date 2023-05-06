<?php
require_once 'controller.php';
$controller = new Controller();
# 1、平台运营指标
$data = $controller->getOperationData();
# 2、员工管理
$customer_service = $controller->getCustomer_service();
# 3、缴费管理
$payment_manager = $controller->getPayment_manager();
#4、 维修工单
$maintenance_ticket = $controller->getMaintenance_Ticket();
# 5、智慧工单
$wisdom_ticket = $controller->getWisdom_ticket();
# 6、巡检工单
$perform_inspection = $controller->getPerform_Inspection();
#7、采购库存
$procurement_inventory = $controller->getProcurement_Inventory();
#8、设施设备：
$facility_equipment = $controller->getFacility_Equipment();
#9、合同管理
$contract_management = $controller->getContract_Management();
#10、电商运营
$Ecommerce_operation = $controller->getEcommerce_Operation();
#11、健身俱乐部
$health_club = $controller->getHealth_Club();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>运营指标表格</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>一、平台运营指标</h1>
<table style="width:50%;">
    <thead>
    <tr>
        <th>地区</th>
        <th>一级管理处</th>
        <th>平台运营指数</th>
        <th>员工活跃度</th>
        <th>员工App工作饱和度</th>
        <th>员工工单完成率</th>
        <th>住户认证率</th>
        <th>认证用户活跃度</th>
        <th>住户报修率</th>
        <th>住户缴费率</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $area => $areaData): ?>
        <?php foreach ($areaData as $index => $row): ?>
            <tr>
                <?php if ($index === 0): ?>
                    <td rowspan="<?= count($areaData) ?>"><?= $area ?></td>
                <?php endif; ?>
                <td><?= $row['communityName'] ?></td>
                <td><?= $row['operationNum'] ?></td>
                <td><?= $row['employeeActivity'] ?></td>
                <td><?= $row['saturation'] ?></td>
                <td><?= $row['completion'] ?></td>
                <td><?= $row['certification'] ?></td>
                <td><?= $row['customerActivity'] ?></td>
                <td><?= $row['reportRate'] ?></td>
                <td><?= $row['paymentRate'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
<h1>三、系统运行数据统计</h1>
<h3>1、客户服务</h3>
<table>
    <thead>
    <tr>
        <th rowspan="2"></th>
        <?php foreach ($customer_service as $area => $areaData): ?>
            <th colspan="<?= count($areaData) ?>"><?= $area ?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <?php foreach ($customer_service as $area => $areaData): ?>
            <?php foreach ($areaData as $index => $row): ?>
                <th><?= $row['communityName'] ?></th>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $keys = [
        'totalAmount', 'toCommunity', 'finishPercent', 'appNum', 'finishRate',
        'totalPraiseAmount', 'finishPraiseRate', 'approveUserNum', 'noticeNum',
        'communicationNum', 'topicNum'
    ];
    $keyNames = [
        '新增投诉单数', '完成投诉单数', '投诉处理满意率（%）', '报事单数量', '报事单完成率（%）',
        '表扬单数量', '表扬单完成率（%）', '新增业主认证', '通知公告数量', '社区活动数量', '文章发布数量'
    ];
    ?>
    <?php foreach ($keys as $index => $key): ?>
        <tr>
            <th><?= $keyNames[$index] ?></th>
            <?php foreach ($customer_service as $area => $areaData): ?>
                <?php foreach ($areaData as $row): ?>
                    <td><?= $row[$key] ?></td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3>2、缴费管理</h3>
<table>
    <thead>
    <tr>
        <th rowspan="2"></th>
        <?php foreach ($payment_manager as $area => $areaData): ?>
            <th colspan="<?= count($areaData) ?>"><?= $area ?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <?php foreach ($payment_manager as $area => $areaData): ?>
            <?php foreach ($areaData as $index => $row): ?>
                <th><?= $row['communityName'] ?></th>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $keys = [
        'feeCountNum', 'appFeeCountNum', 'appOrderCountRatio', 'feeAmount',
        'appFeeCountNum', 'appOrderAmountRatio', 'propertyFeeIncome',
        'propertyFeeCollectionRate', 'parkingFeeIncome'
    ];
    $keyNames = [
        '缴费单数', 'App缴费单数', 'App缴费单数占比', '缴费总金额（元）',
        'APP缴费金额', 'APP缴费金额占比', '物业费收入（元）',
        '物业费收缴率（截至目前）', '车位费收入（元）'
    ];
    ?>
    <?php foreach ($keys as $index => $key): ?>
        <tr>
            <th><?= $keyNames[$index] ?></th>
            <?php foreach ($payment_manager as $area => $areaData): ?>
                <?php foreach ($areaData as $row): ?>
                    <td><?= $row[$key] ?></td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3>3、维修工单</h3>
<table>
    <thead>
    <tr>
        <th rowspan="2" style="text-align: center;">维修工单</th>
        <?php foreach ($maintenance_ticket as $area => $areaData): ?>
            <th colspan="<?= count($areaData) ?>" style="text-align: center;"><?= $area ?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <?php foreach ($maintenance_ticket as $area => $areaData): ?>
            <?php foreach ($areaData as $index => $row): ?>
                <th style="text-align: center; width: 620px;"><?= $row['communityName'] ?></th>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $keys = [
        'timingNum', 'workTime', 'workerAvgTime', 'completeRate',
        'satisfactionRate', 'totalPrice'
    ];
    $keyNames = [
        '接单量（单）', '总工时（小时）', '人均工时数（小时）', '维修工单完成率（%）',
        '维修工单满意率（%）', '维修费收入（元）'
    ];
    ?>
    <?php foreach ($keys as $index => $key): ?>
        <tr>
            <th><?= $keyNames[$index] ?></th>
            <?php foreach ($maintenance_ticket as $area => $areaData): ?>
                <?php foreach ($areaData as $row): ?>
                    <td><?= $row[$key] ?></td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3>5、巡检工单</h3>
<table style="width:70%;">
    <thead>
    <tr>
        <th rowspan="2" style="text-align: center;">巡检工单</th>
        <?php foreach ($perform_inspection  as $area => $areaData): ?>
            <th colspan="<?= count($areaData) ?>" style="text-align: center;"><?= $area ?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <?php foreach ($perform_inspection  as $area => $areaData): ?>
            <?php foreach ($areaData as $index => $row): ?>
                <th style="text-align: center; width: 620px;"><?= $row['communityName'] ?></th>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $keys = [
        'cruiseNum', 'cruiseRate', 'cruiseCompletedRate', 'workNum',
        'workRate', 'workCompletedRate'
    ];
    $keyNames = [
        '巡航工单（数量）', '巡航工单完成率（%）', '巡航核查率（%）', '巡检工单（数量）',
        '巡检工单完成率（%）', '巡检工单核查率（%）'
    ];
    ?>
    <?php foreach ($keys as $index => $key): ?>
        <tr>
            <th><?= $keyNames[$index] ?></th>
            <?php foreach ($perform_inspection  as $area => $areaData): ?>
                <?php foreach ($areaData as $row): ?>
                    <td><?= $row[$key] ?></td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3>6、采购库存</h3>
<table>
    <thead>
    <tr>
        <th rowspan="2" style="text-align: center;">采购库存</th>
        <?php foreach ($procurement_inventory as $area => $areaData): ?>
            <th colspan="<?= count($areaData) ?>" style="text-align: center;"><?= $area ?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <?php foreach ($procurement_inventory as $area => $areaData): ?>
            <?php foreach ($areaData as $index => $row): ?>
                <th style="text-align: center; width: 620px;"><?= $row['communityName'] ?></th>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $keys = [
        'budget', 'extraList', 'toDayList', 'property_stock'
    ];
    $keyNames = [
        '采购预算（元）', '当月采购金额（元）', '累计采购金额（元）', '库存物料金额（元）'
    ];
    ?>
    <?php foreach ($keys as $index => $key): ?>
        <tr>
            <th><?= $keyNames[$index] ?></th>
            <?php foreach ($procurement_inventory as $area => $areaData): ?>
                <?php foreach ($areaData as $row): ?>
                    <td><?= $row[$key] ?></td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3>8、设备设施</h3>
<table>
    <thead>
    <tr>
        <th rowspan="2" style="text-align: center;">设备设施</th>
        <?php foreach ($facility_equipment as $area => $areaData): ?>
            <th colspan="<?= count($areaData) ?>" style="text-align: center;"><?= $area ?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <?php foreach ($facility_equipment as $area => $areaData): ?>
            <?php foreach ($areaData as $index => $row): ?>
                <th style="text-align: center; width: 620px;"><?= $row['communityName'] ?></th>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $keys = [
        'deviceSum', 'normalRate'
    ];
    $keyNames = [
        '设备总数（台）', '设备完好率（%）'
    ];
    ?>
    <?php foreach ($keys as $index => $key): ?>
        <tr>
            <th><?= $keyNames[$index] ?></th>
            <?php foreach ($facility_equipment as $area => $areaData): ?>
                <?php foreach ($areaData as $row): ?>
                    <td><?= $row[$key] ?></td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3>9、合同管理</h3>
<table>
    <thead>
    <tr>
        <th rowspan="2" style="text-align: center;">合同管理</th>
        <?php foreach ($contract_management as $area => $areaData): ?>
            <th colspan="<?= count($areaData) ?>" style="text-align: center;"><?= $area ?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <?php foreach ($contract_management as $area => $areaData): ?>
            <?php foreach ($areaData as $index => $row): ?>
                <th style="text-align: center; width: 620px;"><?= $row['communityName'] ?></th>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $keys = [
        'new_contract', 'maturity', 'contract_progress', 'actual_payment',
        'tangible_receipts', 'payment_plan', 'collection_plan'
    ];
    $keyNames = [
        '新增合同（单）', '到期合同（单）', '执行中合同（单）', '计划收款（元）',
        '实际收款（元）', '计划付款（元）', '实际付款（元）'
    ];
    ?>
    <?php foreach ($keys as $index => $key): ?>
        <tr>
            <th><?= $keyNames[$index] ?></th>
            <?php foreach ($contract_management as $area => $areaData): ?>
                <?php foreach ($areaData as $row): ?>
                    <td><?= $row[$key] ?></td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3>10、电商运营</h3>
<table style="width:10%;">
    <thead>
    <tr>
        <th rowspan="2" style="text-align: center;">电商运营</th>
        <?php foreach ($Ecommerce_operation as $area => $areaData): ?>
            <th colspan="<?= count($areaData) ?>" style="text-align: center;"><?= $area ?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <?php foreach ($Ecommerce_operation as $area => $areaData): ?>
            <?php foreach ($areaData as $index => $row): ?>
                <th style="text-align: center; width: 620px;"><?= $row['communityName'] ?></th>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $keys = [
        'orderAmount', 'orderTotal', 'refundAmount'
    ];
    $keyNames = [
        '订单数（单）', '下单金额（元）', '退款金额（元）'
    ];
    ?>
    <?php foreach ($keys as $index => $key): ?>
        <tr>
            <th><?= $keyNames[$index] ?></th>
            <?php foreach ($Ecommerce_operation as $area => $areaData): ?>
                <?php foreach ($areaData as $row): ?>
                    <td><?= $row[$key] ?></td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h3>11、健身会所</h3>
<table style="width:20%;">
    <thead>
    <tr>
        <th rowspan="2" style="text-align: center;">健身会所</th>
        <?php foreach ($health_club as $area => $areaData): ?>
            <th colspan="<?= count($areaData) ?>" style="text-align: center;"><?= $area ?></th>
        <?php endforeach; ?>
    </tr>
    <tr>
        <?php foreach ($health_club as $area => $areaData): ?>
            <?php foreach ($areaData as $index => $row): ?>
                <th style="text-align: center; width: 620px;"><?= $row['communityName'] ?></th>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $keys = [
        'memberNum', 'privateCoachNum', 'private_training_amount', 'cardUsedNum',
        'unpassNum', 'dining_reservation_quantity', 'foodRevenue'
    ];
    $keyNames = [
        '新增会员数（人）', '私教购买（单）', '私教购买金额（元）', '刷卡（次）',
        '场地预约（次）', '餐饮预订数量（份）', '餐饮收入（元）'
    ];
    ?>
    <?php foreach ($keys as $index => $key): ?>
        <tr>
            <th><?= $keyNames[$index] ?></th>
            <?php foreach ($health_club as $area => $areaData): ?>
                <?php foreach ($areaData as $row): ?>
                    <td><?= $row[$key] ?></td>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</html>
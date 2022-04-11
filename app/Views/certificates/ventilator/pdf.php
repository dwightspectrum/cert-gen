<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Ventilator</title>

</head>
<body>
    <table>
        <tr>
            <td style="text-align: center;">
                <h3>
                    Maintenance/Calibration Certificate 
                    <br>
                    DIN EN VDE 0701-0702
                </h3>
            </td>
            <td>
                <img src="<?=FCPATH . '/assets/img/hwi_logo_transparent.png' ?>" width="30%">
            </td>
        </tr>
        
    </table>
    <table>
        <tr>
            <td style="font-weight: bold; background-color: #D9D9D9; border-top: 1px solid #D9D9D9; border-right: 1px solid #D9D9D9; border-left: 1px solid #D9D9D9">
                Item
            </td>
            <td style="width: 50px;"></td>
            <td style="font-weight: bold; background-color: #D9D9D9; border-top: 1px solid #D9D9D9; border-right: 1px solid #D9D9D9; border-left: 1px solid #D9D9D9">
                Serial No.
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black;">
                <?= $ventilator['item'] ?>
            </td>
            <td>

            </td>
            <td style="border: 1px solid black; height: 30px;">
                <?= $ventilator['serial_no']?>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td>
                <img src="<?=FCPATH . '/assets/img/ventilator.png' ?>" height="98%" width="37%">
            </td>
            <td>
                <table>
                    <?php $ventilator_data = json_decode($ventilator['image_data']); ?>
                    <?php foreach($ventilator_data as $key => $v): ?>
                        <tr>
                            <td style="font-weight: bold;">
                                <?= $v->name ?>
                            </td>
                            <?php if ($key === 0): ?>
                                <td style="font-style: italic; font-size: 0.90em; text-align:center; width: 40px;">
                                    OK/F
                                </td>
                                <td style="font-style: italic; text-align:center; font-size: 0.90em; ">
                                    Repaired Sign
                                </td>
                                <td style="font-style: italic; font-size: 0.90em; text-align:center;">
                                    Date
                                </td>
                            <?php else: ?>
                                <td colspan="3"></td>
                            <?php endif; ?>
                        </tr>
                        <?php foreach($v->data as $key => $ventilatorData): ?>
                            <tr>
                                <td style="padding-left: 10px; font-size: 0.90em;">
                                 ◻ <?= $ventilatorData->name ?>
                                </td>
                                <td style="border: 1px dotted black; text-align: center; font-size: 0.90em;"> 
                                    <?= $ventilatorData->ok_f ?> 
                                </td>
                                <?php if ($key === 0): ?>
                                    <td style="border: 1px dotted black; text-align: center;" rowspan="<?= count($v->data) ?>">
                                        <img src="<?=FCPATH . '/assets/img/signatures/' . $ventilator['signatures'] ?>" width="100">
                                    </td>
                                    <td style="border: 1px dotted black; font-size: 0.80em; text-align:center;" rowspan="<?= count($v->data) ?>">
                                        <?= $ventilator['date'] ? $ventilator['date'] : '' ?>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4" style="padding-top: 10px;"></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </td> 
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td style="font-weight: bold">
                Verify the following has been placed or is in good and visible condition:
            </td>
        </tr>
    </table>
    <br>
    <table>
        <?php 
            $verify_data = json_decode($ventilator['verified_place']);
            $row1 = is_array($verify_data) ? array_slice($verify_data, 0, 3) : [];
            $row2 = is_array($verify_data) ? array_slice($verify_data, 3,3) : [];
            $row3 = is_array($verify_data) ? array_slice($verify_data, 6,1) : [];
        ?>
        <tr>
        <?php foreach($row1 as $key => $verify): ?>
            <td style="padding: 7px;">
            <?= !$verify->checked ? '◻' : '☑' ?> <?= $verify->name ?>
            </td>   
        <?php endforeach; ?>
        </tr>
        <tr>
        <?php foreach($row2 as $key => $verify): ?>
            <td style="padding: 7px;">
            <?= !$verify->checked ? '◻' : '☑' ?> <?= $verify->name ?>
            </td>   
        <?php endforeach; ?>
        </tr>
        <tr>
        <?php foreach($row3 as $key => $verify): ?>
            <td style="padding: 7px;">
            <?= !$verify->checked ? '◻' : '☑' ?> <?= $verify->name ?>
            </td>   
        <?php endforeach; ?>
        </tr>
    </table>
    <br>
    <table style="border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;">
        <tr>
            <td style="font-weight: bold; padding-top: 10px; padding-left: 10px;">
                Isolation, resistance to earth
            </td>
            <td style="font-weight: bold; padding-top: 10px; padding-left: 10px;">
                L1
            </td>
            <td style="font-weight: bold; padding-top: 10px; padding-left: 10px;">
                L2
            </td>
            <td style="font-weight: bold; padding-top: 10px; padding-left: 10px;">
                L3
            </td>
        </tr>
        <tr>
            <td style="font-style: italic; padding-left: 10px;">
                measurement voltage: 1000VDC
            </td>
            <?php $isolation = json_decode($ventilator['isolation']); ?>
            <td style="border: 1px solid black; width: 18%; padding-left: 2em;"> 
                <?= $isolation->l1 ?> MΩ
            </td>
            <td style="border: 1px solid black; width: 18%; padding-left: 2em;">
                <?= $isolation->l2 ?> MΩ
            </td>
            <td style="border: 1px solid black; width: 18%; padding-left: 2em;" >
                <?= $isolation->l3 ?> MΩ
            </td>
            <td style="padding-left: 5px;"></td>
        </tr> 
    </table>
    <table style="border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;">
        <tr>
            <td style="padding-top: 20px; padding-left: 10px;">
                minimum acceptable resistance: 
            </td>
            <td style="padding-top: 20px; padding-left: 80px;">
                Tested with Device: 
            </td>
        </tr>
        <tr>
            <td style="font-style: italic; padding-left: 10px; padding-bottom: 10px;">
                up to 240V = 0,2MΩ / up to 600V = 0,5MΩ
            </td>
            <td style="font-style: italic; padding-left: 80px; padding-bottom: 10px;">
                Fluke 1653B, Multifunction Tester
            </td>
        </tr> 			
    </table>
    <table style="border-bottom: 2px solid black; border-right: 1px solid black; border-left: 1px solid black;">
        <tr>
            <td style="padding-bottom: 30px;">
                <b>Remarks:</b> <?= $isolation->remarks?>
            </td>
        </tr>
    </table>
    <table style="border-bottom: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; background-color: #F8CBAD;">
        <tr>
            <td style="font-weight: bold;">
                Function and Safety of device without defect/fault
            </td>
            <td style="border-left: 2px solid black; width: 7%; text-align: center;">
                <?= $isolation->safety?>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td style="text-align: center; font-size: 0.75em;">
                Hotwork confirms correct maintenance to company standards, any meassurement/calibration according to national standards.
            </td>
        </tr>
    </table>

    <table style="border: 2px solid black;">
        <tr>
            <td colspan="3" style="text-align: center; padding: 5px; font-weight: bold; border-bottom: 2px solid black; background-color: #BFBFBF;">
                Signatures:
            </td>
        </tr>
        <tr>
            <td colspan="2" style="width: 50%; border-bottom: 2px solid black;">
                <b>Inspector:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span style="text-align: center; font-size: 1.2em;">
                    <?=$ventilator['inspector']?>
                </span>
            </td>
            <td rowspan="2" style="width: 50%; border-left: 2px solid black; text-align: center;">
                <img src="<?=FCPATH . '/assets/img/signatures/' . $ventilator['signatures'] ?>" width="30%">
            </td>
        </tr>
        <tr>
            <td style="width: 25%; ">
                <b>Place:</b>
                <div style="text-align: center; font-size: 1.2em;">
                    <?=$ventilator['place']?>
                </div>
            </td>
            <td style="width: 25%;" style="border-left: 2px solid black; ">
                <b>Date:</b>
                <div style="text-align: center; font-size: 1.2em;">
                    <?=$ventilator['date']?>
                </div>
            </td>
        </tr>
    </table>


</body>
</html>
<style>
    body {
        font-family: 'Inter', sans-serif;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
</style>
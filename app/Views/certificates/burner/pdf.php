<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Burner</title>

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
                <?= $burner['item'] ?>
            </td>
            <td>

            </td>
            <td style="border: 1px solid black; height: 30px;">
                <?= $burner['serial_no']?>
            </td>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td style="padding-right: 40px;">
                <img src="<?=FCPATH . '/assets/img/burner-one.png' ?>" height="35%" >
                <br><br><br><br><br>
                <img src="<?=FCPATH . '/assets/img/burner-two.png' ?>" height="35%" style="padding-left: 40px;">
            </td>
            <td>
                <table>
                    <?php $ventilator_data = json_decode($burner['image_data']); ?>
                    <?php foreach($ventilator_data as $key => $v): ?>
                        <tr>
                            <td style="font-weight: bold;">
                                <?= $v->name ?>
                            </td>
                            <?php if ($key === 0): ?>
                                <td style="font-style: italic; font-size: 0.90em; text-align:center; width: 40px;">
                                    OK/F
                                </td>
                                <td style="font-style: italic; text-align:center; font-size: 0.90em;">
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
                                        <img src="<?=FCPATH . '/assets/img/signatures/' . $burner['signatures'] ?>" width="100">
                                    </td>
                                    <td style="border: 1px dotted black; text-align: center; font-size: 0.80em;" rowspan="<?= count($v->data) ?>">
                                        <?= $burner['date'] ? $burner['date'] : '' ?>
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
    <br>
    <table border="1" style="text-align: center;">
        <tr>
            <td style="padding: 10px; font-weight: bold;">
                Test
            </td>
            <td style="padding: 10px; font-weight: bold;">
                Parameter
            </td>
            <td style="padding: 10px; font-weight: bold;">
                OK
            </td>
            <td style="padding: 10px; font-weight: bold;">
                Failure
            </td>
        </tr>
        <?php $burner_data = json_decode($burner['isolation']) ?>
        <?php //echo $burner['isolation']; die() ?>
        <?php foreach($burner_data[0] as $burn): ?>

        <tr>
            <td style="padding: 10px;">
                <?= $burn->test ?> 
            </td>
            <td style="padding: 10px;">
                <?= $burn->param ?>
            </td>
            <td style="padding: 10px;">
                <?= $burn->ok_f == 'OK' ? '✓' : '' ?>
            </td>
            <td style="padding: 10px;">
                <?= $burn->ok_f == 'Fail' ? '✓' : '' ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <div style="padding-left: 640px;">
        <small>
            OK/F
        </small>
    </div>
    <table style="border: 2px solid black; background-color: #F8CBAD;">
        <?php $burner_data = json_decode($burner['isolation']) ?>
        <tr>
            <td style="font-weight: bold; padding: 5px;">
                Function and Safety of device without defect/fault
            </td>
            <td style="border-left: 2px solid black; width: 7%; text-align: center; padding: 5px;">
              <?=$burner_data[1]->ok_f?>
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
            $verify_data = json_decode($burner['verified_place']);
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
    <table style="border: 2px solid black;">
        <tr>
            <td colspan="3" style="text-align: center; padding: 5px; font-weight: bold; border-bottom: 2px solid black; background-color: #BFBFBF;">
                Signatures:
            </td>
        </tr>
        <tr>
            <td colspan="2" style="width: 50%; border-bottom: 2px solid black;">
                <b>Inspector:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span style="font-size: 1.2em;">
                    <?=$burner['inspector'] == 'null' ? '<br><br><br><br>' : $burner['inspector'] ?>
                </span>
            </td>
            <td rowspan="2" style="width: 50%; border-left: 2px solid black; text-align: center;">
                <img src="<?=FCPATH . '/assets/img/signatures/' . $burner['signatures'] ?>" width="30%">
            </td>
        </tr>
        <tr>
            <td style="width: 25%; ">
                <b>Place:</b>
                <div style="font-size: 1.2em;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$burner['place'] == 'null' ? '<br><br><br>' : $burner['place'] ?>
                </div>
            </td>
            <td style="width: 25%; border-left: 2px solid black;">
                <b>Date:</b>
                <div style="font-size: 1.2em;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$burner['date'] == 'null' ? '<br><br><br>' : $burner['date'] ?>
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
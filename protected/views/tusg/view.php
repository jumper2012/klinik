<head>
    <style>
        table {
            width:100%;
        }
        table, th, td {
            border: 0px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        table#t01 tr:nth-child(even) {
            background-color: #fff;
        }
        table#t01 tr:nth-child(odd) {
            background-color:#eee;
        }
        table#t01 th	{
            background-color: black;
            color: white;

        }

    </style>
</head>

<h1>Detail USG</h1>

<?php
$this->widget('booster.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
//        'id_usg',
        'id_kartu_usg',
        'tgl',
        'nama_suami',
        'grafida',
        'hpht',
        'ttp',
        'td_bb',
//        'keluhan',
        'usia_kehaliman',
//        'terapi',
//        'keterangan',
    ),
));
?>
<body>
    <table>
        <table id="t01">
            <tr>
                <td background-color: #fff>
                    <FONT SIZE="3"><b>Keluhan</b></FONT>
                </td>
            </tr>
            <tr>
                <td bgcolor="#eeeeee">
                    <table border="0" cellpadding="2" cellspacing="0">
                        <tr><td bgcolor="#ffffff"><?php echo $model->keluhan; ?></td>
                        </tr></table></td>
            </tr>
            <tr>
                <td background-color: white>
                    <b></b>
                </td>
            </tr>
            <tr>
                <td background-color: #fff>
                    <FONT SIZE="3"><b>Terapi</b></FONT>
                </td>
            </tr>            
            <tr>
                <td bgcolor="#eeeeee">
                    <table border="0" cellpadding="2" cellspacing="0">
                        <tr><td bgcolor="#ffffff"><?php echo $model->terapi; ?></td>
                        </tr></table></td>
            </tr>            
        </table>
    </table>
    <br>

</body>

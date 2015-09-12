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

<h1><b>Detail Rekam Rawat Inap</b></h1>

<br>
<body>
    <table>
        <table id="t01">
            <tr>
                <td background-color: #fff>
                    <FONT SIZE="5"><b>Tanggal : <?php echo $model->tgl; ?></b></FONT>
                </td>
            </tr>
            <tr>
                <td background-color: white>
                    <b></b>
                </td>
            </tr>
            <tr>
                <td background-color: #fff>
                    <FONT SIZE="5"><b>Keterangan</b></FONT>
                </td>
            </tr>
            <tr>
                <td bgcolor="#eeeeee">
                    <table border="0" cellpadding="2" cellspacing="0">
                        <tr><td bgcolor="#ffffff"><?php echo $model->keterangan; ?></td>
                        </tr></table></td>
            </tr>
        </table>
    </table>
    <br>

</body>



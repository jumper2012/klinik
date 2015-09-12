<?php

class CreateGrafikController extends Controller {


    public function actionGrafikPenjualanObat($tanggal) {
        $model = new Grafik;
        if (isset($_POST['Grafik'])) {
            $model->attributes = $_POST['Grafik'];
            $tanggal = $model->tanggal;
            $this->redirect(array('GrafikPenjualanObat', 'tanggal' => $tanggal));
        }

        $this->render('grafiklaporan', array(
            'model' => $model, 'tanggal' => $tanggal,
        ));
    }
    
    
    public function actionViewGrafik($tanggal) {
        $model = new Grafik;
        if (isset($_POST['Grafik'])) {
            $model->attributes = $_POST['Grafik'];
            $tanggal = $model->tanggal;
            $this->redirect(array('ViewGrafik', 'tanggal' => $tanggal));
        }

        $this->render('grafik', array(
            'model' => $model, 'tanggal' => $tanggal,
        ));
    }
    
    
    public function actionViewGrafikByYear($year) {
        $model = new Grafik;
        if (isset($_POST['Grafik'])) {
            $test = array();
            $model->attributes = $_POST['Grafik'];
            $temp_arr = $model->tanggal;
            $date = date('Y-m-d');
            $orderdate = explode('-', $date);
            $year_temp = $orderdate[0];
//            var_dump($year_temp);
            $x = 1;
            for ($z = 2000; $z <= $year_temp; $z++) {
                $test[$x] = $z;
                $x++;
            }
            for($y=1;$y<=$temp_arr;$y++)
            {
                if($temp_arr==$y)
                {
                    $year=$test[$y];
                }
                else if($temp_arr==0)
                {
                    $year = $year_temp;
                }
            }
            $this->redirect(array('ViewGrafikByYear', 'year' => $year));
        }

        $this->render('ViewGrafikByYear', array('model' => $model, 'year' => $year,
        ));
    }
    
        public function actionCetakLaporanPdf($tanggal) {
        $id =1;    
        $html2pdf = Yii::app()->pdf->HTML2PDF('L', array(210, 330), 'en', true, 'UTF-8', array(8, 8, 8, 8));
        $html2pdf->WriteHTML($this->renderPartial('CetakLaporan', array('message' => $tanggal), true));
        ob_end_clean();
        $html2pdf->Output('LaporanPenjaualan_' . $id . '.pdf');
    }
    public function actionViewGrafikPenjualanByYear($year) {
        $model = new Grafik;
        if (isset($_POST['Grafik'])) {
            $test = array();
            $model->attributes = $_POST['Grafik'];
            $temp_arr = $model->tanggal;
            $date = date('Y-m-d');
            $orderdate = explode('-', $date);
            $year_temp = $orderdate[0];
//            var_dump($year_temp);
            $x = 1;
            for ($z = 2000; $z <= $year_temp; $z++) {
                $test[$x] = $z;
                $x++;
            }
            for($y=1;$y<=$temp_arr;$y++)
            {
                if($temp_arr==$y)
                {
                    $year=$test[$y];
                }
                else if($temp_arr==0)
                {
                    $year = $year_temp;
                }
            }
            $this->redirect(array('ViewGrafikPenjualanByYear', 'year' => $year));
        }

        $this->render('ViewGrafikPenjualanByYear', array('model' => $model, 'year' => $year,
        ));
    } 
}

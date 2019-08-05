<?php 
class ExportController extends MyController{ 
        public $layout='//layouts/column2'; 
        //fungsi untuk export data dosen aktif
        public function actionToexcel($fileName){
                $this->createExcel($fileName);     
                $sql=Yii::app()->db->createCommand()  
                ->select('*')  ->from('surat_masuk')  
                ->where('peg.jnspeg=1 AND (peg.status_kepeg=1 OR peg.status_kepeg=3) 
                AND (peg.status="1" OR peg.status="3" OR peg.status="6")')  
                ->order(array('gol.bobot DESC', 'peg.tmtgol ASC', 'jab.bobot DESC', 'peg.mkth DESC', 'peg.mkbl DESC', 'pend.bobot DESC', 'peg.luluspend ASC', 'peg.tgl_lhr ASC'))   
                ->queryAll();    
                
                $dataExcel=$this->renderPartial("report",array(  "dataExport"=>$sql,  )); 
                
                //download excel 
                echo $dataExcel;  
        } 
                  
                  //Membuat halaman index Download  
        public function actionIndex()  
        {  
                $this->render("index"); 
        } 
}   
?>
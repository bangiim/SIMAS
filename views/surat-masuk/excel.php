<?php

use app\models\SuratMasuk;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\widget\Pjax;
use yii\helpers\Url;	

?>

<table>
	<tr>
		<th>No Surat Masuk</th>
		<th>Pengirim</th>
		<th>Tgl Masuk</th>
		<th>Perihal Surat</th>
	</tr>	
<?php foreach ($model as $data): ?>
	<tr>
		<td><?php echo $data['no_suratmasuk'] ?></td>
		<td><?php echo $data['pengirim'] ?></td>
		<td><?php echo $data['tgl_masuk'] ?></td>
		<td><?php echo $data['perihal_surat'] ?></td>
	</tr>
<?php endforeach; ?>
</table>
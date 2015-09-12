<center>
    <div class="container">
        <form action="" method="post" name="postform" enctype="multipart/form-data" >
            <div class="asd">
                <label for="backup"><h2><b>Backup database</b></h2></label>
                <br>
                <input type="submit" name="backup" value="Proses Backup" />
            </div>
        </form>
</center>

<?php
 include "backup.php";
$database = 'Backup';
$file = $database . '_' . date("DdMY") . '_' . time() . '.sql';
//Backup database
if (isset($_POST['backup'])) {
    // Backup Semua Tabel
    backup("localhost", "root", "", "klinik", $file, "*");
    // Backup Hanya Tabel Tertentu
    //backup("localhost","user_database","pass_database","nama_database",$file,"tabel1,tabel2,tabel3");
    echo 'Backup database telah selesai <a style="cursor:pointer" href="?nama_file=' . $file . '" title="Download">Download file database</a>';
    echo "<pre>";
    echo "</pre>";
} else {
    unset($_POST['backup']);
}
?>

<?php
ini_set('display_errors','off');
?>

<div class="d-flex justify-content-between align-items-center">
    <h2 class="my-4">Absensi Kelas <?= $items_id->level."-".$items_id->code." (". $items_id->year.")"?> </h2>
</div>

<div class="container">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th rowspan="2" width="50px"><center>NIS</center></th>
                    <th rowspan="2"><center>Nama</center></th>
                    <th rowspan="2" width="30px"><center>JK</center></th>
                    <th colspan="24"><center>Pertemuan Ke-</center></th>
                    <th rowspan="2" width="30px">Ket</th>
                </tr>
                <tr>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                    <th width="10px"> </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($items as $item) : 
                ?>
                    <tr>
                        <td><center><?= $item->nis ?></center></td>
                        <td><?= $item->fullname ?></td>
                        <td><center><?= $item->gender ?></center></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php
                    endforeach; 
                ?>
            </tbody>
        </table>
    </div>
</div>

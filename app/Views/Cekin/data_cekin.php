<tbody>
<?php foreach ($data as $row) : ?>
<tr>
    <td> <span class="px-3 py-2 badge badge-<?= ($row['status'] == 'Cekin') ? "secondary" : "success" ?>"><?= $row['status'] ?></span></td>
    <td class="id_cekin" hidden><?= $row['id_cekin'] ?></td>
    <td class="nik_cekin"><?= $row['nik'] ?></td>
    <td class="nama_cekin"><?= $row['nama'] ?></td>
    <td class="nohp"><?= $row['nohp'] ?></td>
    <td class="asal_cekin"><?= $row['asal'] ?></td>
    <td class="nama_bagian"><?= $row['nama_bagian'] ?></td>
    <td class="nama_guru"><?= $row['nama_guru'] ?></td>
    <td class="nama_guru"><?= date('Y-m-d', strtotime($row['created_at'])); ?></td>

    <td class="text-right">
        <div class="dropdown dropdown-action">
            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="cekin/detail/<?= $row['id_cekin'] ?>"><i class="fa fa-pencil m-r-5"></i> Detail</a>

                <a class="dropdown-item" target="_blank" href="<?= 'CekinController/htmlToPDF/' . $row['id_cekin'] ?>"><i class="fa fa-print m-r-5"></i>Print</a>

                <a class="dropdown-item userDelete" data-id="<?= $row['id_cekin'] ?>" data-toggle="modal" data-target="#delete_bagian"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

            </div>
        </div>
    </td>
</tr>
<?php endforeach; ?>
</tbody> 
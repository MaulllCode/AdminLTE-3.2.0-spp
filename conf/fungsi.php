<?php

function ambildata($kon, $query)
{
  $data = mysqli_query($kon, $query);
  if (mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {
      $hasil[] = $row;
    }

    return $hasil;
  }
}

function bisa($kon, $query)
{
  $db = mysqli_query($kon, $query);

  if ($db) {
    return 1;
  } else {
    return 0;
  }
}



function ambilsatubaris($kon, $query)
{
  $db = mysqli_query($kon, $query);
  return mysqli_fetch_assoc($db);
}

function hapus($where, $table, $redirect)
{
  $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;
  echo $query;
}

$outlet = ambilsatubaris($kon, 'SELECT nama from tb_outlet WHERE id_outlet = ' . $id_outlet);
$member = ambilsatubaris($kon, 'SELECT nama from tb-member WHERE id_member = ' . $id_member);
$paket = ambildata($kon, 'SELECT * FROM tb_paket WHERE id_outlet = ' . $id_outlet);

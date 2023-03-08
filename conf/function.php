<?php

require 'conn.php';

function select_db($kon, $query)
{
  $data = mysqli_query($kon, $query);
  if (mysqli_num_rows($data) > 0) {
    while ($row = mysqli_fetch_assoc($data)) {
      $hasil[] = $row;
    }

    return $hasil;
  }
}

function crud($kon, $query)
{
  $db = mysqli_query($kon, $query);

  if ($db) {
    return 1;
  } else {
    return 0;
  }
}

function select_id($kon, $query)
{
  $db = mysqli_query($kon, $query);
  return mysqli_fetch_assoc($db);
}

function hapus_data($where, $table, $redirect)
{
  $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;
  echo $query;
}

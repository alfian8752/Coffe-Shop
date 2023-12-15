<?php 
$conn = mysqli_connect('localhost', 'root', '', 'db_coffe_shop');

function query($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  return $result;
}

function insert($query) {
  global $conn;
  mysqli_query($conn, $query);
}

function delete($table, $id) {
  global $conn;
  $query = "DELETE FROM $table WHERE id = $id";
  return query($query);
}
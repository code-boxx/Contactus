<?php
class Contacts {
  // (A) COUNTALL () : COUNT TOTAL NUMBER OF CONTACTS
  //  $search : optional search term
  function countAll ($search="") {
    $sql = "SELECT COUNT(*) `c` FROM `address_book`";
    $cond = null;
    if ($search!="" && $search!=null) {
      $sql .= " WHERE `name_first` LIKE ? OR `name_last` LIKE ? OR `email` LIKE ?";
      $cond = ["%$search%", "%$search%", "%$search%"];
    }
    $c = $this->core->fetch($sql, $cond);
    return $c['c'];
  }

  // (B) GETALL () : GET ALL CONTACTS
  //  $search : optional search term
  //  $limit : optional limit SQL (for pagination)
  function getAll ($search="", $limit=true) {
    $sql = "SELECT * FROM `address_book`";
    $cond = null;
    if ($search!="" && $search!=null) {
      $sql .= " WHERE `name_first` LIKE ? OR `name_last` LIKE ? OR `email` LIKE ?";
      $cond = ["%$search%", "%$search%", "%$search%"];
    }
    if ($limit) { $sql .= $this->core->Page->limit(); }
    return $this->core->fetchAll($sql, $cond, "id");
  }

  // (C) GET () : GET CONTACT BY ID
  // $id : address book ID
  function get ($id) {
    return $this->core->fetch(
      "SELECT * FROM `address_book` WHERE `id`=?",
      [$id]
    );
  }

  // (D) SAVE () : ADD/EDIT CONTACT
  //  $first : first name
  //  $last : last name
  //  $email : email
  //  $telw : tel (work)
  //  $telh : tel (home)
  //  $telm : tel (mobile)
  //  $addr : address
  //  $id : contact ID, for editing only
  function save ($first, $last, $email=null, $telw=null, $telh=null, $telm=null, $addr=null, $id=null) {
    // (D1) ADD NEW
    if ($id==null) {
      $sql = "INSERT INTO `address_book` (`name_first`, `name_last`, `email`, `tel_work`, `tel_home`, `tel_mob`, `address`) VALUES (?,?,?,?,?,?,?)";
      $cond = [$first, $last, $email, $telw, $telh, $telm, $addr];
    }

    // (D2) UPDATE
    else {
      $sql = "UPDATE `address_book` SET `name_first`=?, `name_last`=?, `email`=?, `tel_work`=?, `tel_home`=?, `tel_mob`=?, `address`=? WHERE `id`=?";
      $cond = [$first, $last, $email, $telw, $telh, $telm, $addr, $id];
    }

    // (D3) GO!
    return $this->core->exec($sql, $cond);
  }

  // (E) DEL () : DELETE CONTACT
  //  $id : contact ID
  function del ($id) {
    return $this->core->exec(
      "DELETE FROM `address_book` WHERE `id`=?", [$id]
    );
  }
}
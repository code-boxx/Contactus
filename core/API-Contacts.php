<?php
// (A) ADMIN REQUESTS
$_CORE->load("Contacts");
if (isset($_POST['req'])) { switch ($_POST['req']) {
  // (A0) INVALID
  default:
    $_CORE->respond(0, "Invalid request");
    break;

  // (A1) SAVE CONTACT
  case "save":
    $_CORE->autoAPI("Contacts", "save");
    break;

  // (A2) DELETE CONTACT
  case "del":
    $_CORE->autoAPI("Contacts", "del");
    break;
}}
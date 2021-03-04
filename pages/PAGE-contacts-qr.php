<?php
// (A) GET CONTACT
$_CORE->load("Contacts");
$contact = $_CORE->Contacts->get($_GET['id']);
if (!is_array($contact)) {
  require PATH_PAGES . "PAGE-404.php";
  exit();
}

// (B) GENERATE QR CODE
require PATH_PAGES . "TEMPLATE-top.php"; ?>
<script src="<?=URL_PUBLIC?>qrcode.min.js"></script>
<script>
window.addEventListener("load", function(){
  let card = "BEGIN:VCARD\r\n";
  card += "VERSION:3.0\r\n";
  card += "N:<?=$contact['name_last']?>;<?=$contact['name_first']?>\r\n";
  card += "EMAIL:<?=$contact['email']?>\r\n";
  card += "TEL;TYPE=home:<?=$contact['tel_home']?>\r\n";
  card += "TEL;TYPE=work:<?=$contact['tel_work']?>\r\n";
  card += "TEL;TYPE=mobile:<?=$contact['tel_mob']?>\r\n";
  new QRCode(document.getElementById("qr-contact"), card);
});
</script>
<div id="qr-contact"></div>
<?php require PATH_PAGES . "TEMPLATE-bottom.php"; ?>
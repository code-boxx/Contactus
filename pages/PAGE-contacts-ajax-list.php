<?php
// (A) GET CONTACTS
$_CORE->load("Page");
$contacts = $_CORE->Page->autoGet("Contacts", "countAll", "getAll");

// (B) DRAW ITEMS LIST
if (is_array($contacts)) { ?> 
<table class="zebra">
  <?php foreach ($contacts as $id=>$c) {?>
  <tr>
    <td>
      <strong><?=$c['name_first']?> <?=$c['name_last']?></strong><br>
      <small>Email: <?=$c['email']?></small><br>
      <small>Tel: <?=$c['tel_work']?> (work)</small>
      <small><?=$c['tel_home']?> (home)</small>
      <small><?=$c['tel_mob']?> (mobile)</small><br>
      <small>Address: <?=$c['address']?></small>
    </td>
    <td class="right">
      <input type="button" value="Delete" onclick="contacts.del('<?=$id?>')"/>
      <input type="button" value="Edit" onclick="contacts.addEdit('<?=$id?>')"/>
      <input type="button" value="QR" onclick="contacts.qr('<?=$id?>')"/>
    </td>
  </tr>
  <?php } ?>
</table>
<?php } else { echo "<div>No contacts found.</div>"; }

// (C) PAGINATION
$_CORE->Page->draw("contacts.goToPage", "J");
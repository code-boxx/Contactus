<?php
// (A) GET CONTACT
$edit = isset($_POST['id']) && $_POST['id']!="";
if ($edit) {
  $_CORE->load("Contacts");
  $contact = $_CORE->Contacts->get($_POST['id']);
}

// (B) CONTACT FORM ?>
<h1><?=$edit?"EDIT":"ADD"?> CONTACT</h1>
<form class="standard" onsubmit="return contacts.save();">
  <input type="hidden" id="con-id" value="<?=$edit?$contact['id']:""?>"/>
  <label for="con-first">First Name</label>
  <input type="text" id="con-first" required value="<?=$edit?$contact['name_first']:""?>"/>
  <label for="con-last">Last Name</label>
  <input type="text" id="con-last" required value="<?=$edit?$contact['name_last']:""?>"/>

  <label for="con-email">Email</label>
  <input type="text" id="con-email" value="<?=$edit?$contact['email']:""?>"/>

  <label for="con-tel-w">Tel (Work)</label>
  <input type="text" id="con-tel-w" value="<?=$edit?$contact['tel_work']:""?>"/>
  <label for="con-tel-h">Tel (Home)</label>
  <input type="text" id="con-tel-h" value="<?=$edit?$contact['tel_home']:""?>"/>
  <label for="con-tel-m">Tel (Mobile)</label>
  <input type="text" id="con-tel-m" value="<?=$edit?$contact['tel_mob']:""?>"/>

  <label for="con-addr">Address</label>
  <input type="text" id="con-addr" value="<?=$edit?$contact['address']:""?>"/>

  <input type="submit" value="Save"/>
  <input type="button" onclick="common.page('A')" value="Back"/>
</form>
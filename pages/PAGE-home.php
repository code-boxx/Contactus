<?php require PATH_PAGES . "TEMPLATE-top.php"; ?>
<!-- (A) JAVASCRIPT -->
<script src="<?=URL_PUBLIC?>contacts.js"></script>

<!-- (B) NAVIGATION -->
<h1>ADDRESS BOOK</h1>
<form class="bar" onsubmit="return contacts.search()">
  <input type="text" id="con-search"/>
  <input type="submit" value="Search"/>
  <input type="button" value="Export" onclick="contacts.export()"/>
  <input type="button" value="Add" onclick="contacts.addEdit()"/>
</form>

<!-- (C) CONTACTS LIST -->
<div id="con-list"></div>
<?php require PATH_PAGES . "TEMPLATE-bottom.php"; ?>
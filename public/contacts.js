var contacts = {
  // (A) LIST () : SHOW ALL CONTACTS
  pg : 1, // CURRENT PAGE
  find : "", // CURRENT SEARCH
  list : function ()  {
    common.ajax({
      url : urlroot + "contacts-ajax-list",
      target : "con-list",
      data : {
        pg : contacts.pg,
        search : contacts.find
      }
    });
  },

  // (B) GOTOPAGE () : GO TO PAGE
  //  pg : page number
  goToPage : function (pg) { if (pg!=contacts.pg) {
    contacts.pg = pg;
    contacts.list();
  }},

  // (C) SEARCH() : SEARCH CONTACTS
  search : function () {
    contacts.find = document.getElementById("con-search").value;
    contacts.pg = 1;
    contacts.list();
    return false;
  },

  // (D) ADDEDIT () : SHOW ADD/EDIT DOCKET
  // id : contact ID, for edit only
  addEdit : function (id) {
    common.ajax({
      url : urlroot + "contacts-ajax-form",
      data : { id : id ? id : "" },
      target : "pageB",
      onpass : function () { common.page("B"); }
    });
  },

  // (E) SAVE () : SAVE CONTACT
  save : function () {
    // (E1) GET DATA
    var data = {
      req : "save",
      first : document.getElementById("con-first").value,
      last : document.getElementById("con-last").value,
      email : document.getElementById("con-email").value,
      telw : document.getElementById("con-tel-w").value,
      telh : document.getElementById("con-tel-h").value,
      telm : document.getElementById("con-tel-m").value,
      addr : document.getElementById("con-addr").value
    };
    var id = document.getElementById("con-id").value;
    if (id!="") { data.id = id; }

    // (E2) AJAX
    common.ajax({
      url : urlapi + "Contacts",
      data : data,
      apass : "Contact save OK",
      onpass : function () {
        contacts.list();
        common.page('A');
      }
    });
    return false;
  },

  // (F) DEL () : DELETE CONTACT
  //  id : contact ID
  del : function (id) { if (confirm("Delete contact?")) {
    common.ajax({
      url : urlapi + "Contacts",
      data : {
        req : "del",
        id : id
      },
      apass : "Contact deleted",
      onpass : function () {
        contacts.list();
        common.page('A');
      }
    });
  }},

  // (G) QR () : GENERATE QR CODE VCARD
  qr : function (id) {
    window.open(urlroot + "contacts-qr/?id="+id);
  },

  // (H) EXPORT () : EXPORT CONTACTS
  export : function (id) {
    window.open(urlroot + "contacts-csv");
  }
};
window.addEventListener("load", contacts.list);
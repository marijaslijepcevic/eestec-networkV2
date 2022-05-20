function lcAcceptMem(){
    var markedCheckbox = document.getElementsByName('check_list[]'); 
    var niz = []; 
    for (var checkbox of markedCheckbox) {  
      if (checkbox.checked)  
        niz.push(checkbox.value);
    }   
    $.ajax({
            method: "POST",
            url: window.location.origin + "/LocalCommittee/acceptMembersAccept",
            data: {arguments: niz},
            success: function (obj, textstatus) {
            },
            error: function(xhr, status, error) {
            }
        });
    window.location.reload();
} 

function lcDeclineMem(){
    var markedCheckbox = document.getElementsByName('check_list[]'); 
    var niz = []; 
    for (var checkbox of markedCheckbox) {  
      if (checkbox.checked)  
        niz.push(checkbox.value);
    }   
    $.ajax({
            method: "POST",
            url: window.location.origin + "/LocalCommittee/acceptMembersDecline",
            data: {arguments: niz},
            success: function (obj, textstatus) {
            },
            error: function(xhr, status, error) {
            }
        });
    window.location.reload();
} 

function lcAcceptCom(){
    var markedCheckbox = document.getElementsByName('check_com[]'); 
    var niz = []; 
    for (var checkbox of markedCheckbox) {  
      if (checkbox.checked)  
        niz.push(checkbox.value);
    }   
    $.ajax({
            method: "POST",
            url: window.location.origin + "/Admin/acceptCommitteesAccept",
            data: {arguments: niz},
            success: function (obj, textstatus) {
            },
            error: function(xhr, status, error) {
            }
        });
    window.location.reload();
} 

function lcDeclineCom(){
    var markedCheckbox = document.getElementsByName('check_com[]'); 
    var niz = []; 
    for (var checkbox of markedCheckbox) {  
      if (checkbox.checked)  
        niz.push(checkbox.value);
    }   
    $.ajax({
            method: "POST",
            url: window.location.origin + "/Admin/acceptCommitteesDecline",
            data: {arguments: niz},
            success: function (obj, textstatus) {
            },
            error: function(xhr, status, error) {
            }
        });
    window.location.reload();
}
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

function submitLetter(){
    
    var pismo = document.getElementById("letter").value;
    var IdEvent = document.getElementById("hidden").value;
  
    var niz = [];
    niz.push(pismo);
    $.ajax({
            method: "POST",
            url: window.location.origin + "/RegUser/submitMotivationalLetter/"+IdEvent,
            data: {arguments: niz},
            success: function (obj, textstatus) {
               
            },
            error: function(xhr, status, error) {  }
        });
        
     window.location.replace("/RegUser/viewEvents");
}

function acceptPar(IdEv){
    var markedCheckbox = document.getElementsByName('check_par[]'); 
    var niz = []; 
    for (var checkbox of markedCheckbox) {  
      if (checkbox.checked)  
        niz.push(checkbox.value);
    }   
    var numOfPar = document.getElementById('numOfPar').value;
    var numOfAcc = document.getElementById('numOfAcc').value;
    if(niz.length > numOfPar - numOfAcc){
        window.location.reload();
        return;
    }
    numOfAcc = numOfAcc + niz.length; //dodaj
    $.ajax({
            method: "POST",
            url: window.location.origin + "/LocalCommittee/acceptParticipantsAccept",
            data: {arguments: niz},
            success: function (obj, textstatus) {
                  alert("jeee");
            },
            error: function(xhr, status, error) {
                alert("afds");
            }
        });
    window.location.reload();
}

function finishPar(){  //nije dobro
    var markedCheckbox = document.getElementsByName('check_par[]'); 
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
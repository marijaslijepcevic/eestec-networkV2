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
    var vred = []; 
    for (var checkbox of markedCheckbox) {  
      if (checkbox.checked)  
        vred.push(checkbox.value);
    }   
    var numOfPar = document.getElementById('numOfPar').value;
    var numOfAcc = document.getElementById('numOfAcc').value;
    if(vred.length > (numOfPar - numOfAcc)){
        window.location.reload();
        $('#post').html("Nedovoljno slobodnih mesta!");
        return;
    }
    numOfAcc = numOfAcc + vred.length; //dodaj
    vred.push(numOfAcc);
    $.ajax({
            method: "POST",
            url: window.location.origin + "/LocalCommittee/acceptParticipantsAccept",
            data: {arguments: vred},
            success: function (obj, textstatus) {
                  alert("jeee");
            },
    error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
         $('#post').html(msg)
    }
        });
    //window.location.reload();
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
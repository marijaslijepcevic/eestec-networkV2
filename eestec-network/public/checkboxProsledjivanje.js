function decline(){
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
                alert("uspesno")
            },
            error: function(xhr, status, error) {
            }
        });

}
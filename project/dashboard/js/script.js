$(document).ready(function () {     $('#example').DataTable(); });

function updateFreelancer(id){
    var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
    $.ajax({
        url: '../../backend/freelancer_script.php', 
        method: 'POST', 
        data: { sendId: id },
        dataType: 'html',
        success: function(response) {
           console.log(response);
           response = JSON.parse(response);
           document.getElementById("idFormUpdate").value = response["ID"];
           document.getElementById("nameFormUpdate").value = response["Name_freelance"];
           document.getElementById("skillFormUpdate").value = response["Skill"];
           document.getElementById("birthdayFormUpdate").value = response["birthday"];  
           document.getElementById("emailFormUpdate").value = response["email"];  
           console.log(response);
           myModal.show(); 
        },
        error: function(xhr, status, error) {
            console.error(status);
        }
    });
    
}

function deleteFreelancer(id){
    console.log(id)
    var confirmation  = confirm("are you sure you want to delete this freelancer");
    if(confirmation){
        document.getElementById("deleteForm").submit();
    }
}

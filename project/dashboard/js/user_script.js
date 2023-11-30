$(document).ready(function () {     $('#example').DataTable(); });

function updateUser(id){
    var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
    $.ajax({
        url: '../../backend/user_script.php', 
        method: 'POST', 
        data: { userId: id },
        dataType: 'html',
        success: function(response) {
           response = JSON.parse(response);
           document.getElementById("idFormUpdate").value = response["ID"];
           document.getElementById("name_user").value = response["Name_user"];
           document.getElementById("email_user").value = response["email"];
           document.getElementById("password_user").value = response["Password_user"];  
           document.getElementById("birthday_user").value = response["birthday"];  
           myModal.show(); 
        },
        error: function(xhr, status, error) {
            console.error(status);
        }
    });
    
}

// function deleteFreelancer(id){
//     console.log(id)
//     var confirmation  = confirm("are you sure you want to delete this freelancer");
//     if(confirmation){
//         document.getElementById(id).submit();
//     }
// }

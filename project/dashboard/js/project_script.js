$(document).ready(function () {    $('#example').DataTable(); });

function deleteProject(id){
   var confirmation = confirm("are you sure you want to delete this project ?") ;
   console.log(id);
   if(confirmation){
    document.getElementById("project_deleteForm").submit();
   }
}
function updateProject(id){
    var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
    $.ajax({
        url: '../../backend/project_script.php', 
        method: 'POST', 
        data: { sendId: id },
        dataType: 'html',
        success: function(response) {
            console.log(response);
            response = JSON.parse(response);
           document.getElementById("Project-name").value = response["Title"];
           document.getElementById("oldDesciption").value = response["Description_project"];
           document.getElementById("User-name").value = response["Name_user"];
           document.getElementById("category-name").value = response["Name_categories"];  
           console.log(response);
            console.log(response);
            myModal.show(); 
         },
         error: function(xhr, status, error) {
             console.error(status);
         }


    });
}
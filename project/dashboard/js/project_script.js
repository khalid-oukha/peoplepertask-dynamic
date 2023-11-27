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
        data: { projectId: id },
        dataType: 'html',
        success: function(response) {
            console.log(id);
            console.log(response);
            response = JSON.parse(response);
            document.getElementById("id_project").value = response["ID"];
            document.getElementById("oldProject-name").value = response["Title"];
            document.getElementById("oldDesciption").value = response["Description_project"];
            myModal.show(); 
         },
         error: function(xhr, status, error) {
             console.error(status);
         }


    });
}
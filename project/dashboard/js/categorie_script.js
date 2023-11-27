$(document).ready(function () {    $('#example').DataTable(); });

// function deleteProject(id){
//    var confirmation = confirm("are you sure you want to delete this project ?") ;
//    console.log(id);
//    if(confirmation){
//     document.getElementById("project_deleteForm").submit();
//    }
// }
function updateCategorie(id){
    var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
    $.ajax({
        url: '../../backend/categorys_script.php', 
        method: 'POST', 
        data: { categorieId: id },
        dataType: 'html',
        success: function(response) {
            console.log(id);
            console.log(response);
            response = JSON.parse(response);
            document.getElementById("idFormUpdate").value = response["ID"];
            document.getElementById("idFormUpdate").value = response["ID"];
            document.getElementById("Oldcategory-name").value = response["Name_categories"];
            // document.getElementById("ID_Categorie").value = response["ID_Categorie"];
            myModal.show(); 
         },
         error: function(xhr, status, error) {
             console.error(status);
         }


    });
}


//search for projects
$(document).ready(function(){
    $("#searchinput").keyup(function(){
        var input = $(this).val();
        // alert(input);
        console.log('input: ', input);
        if(input != ""){
            $.ajax({
                url:"api/projects.php",
                method:"post",
                data:{query: input},
                success: function(res){
                    displayProject(JSON.parse(res))
                }
            });
        }
    })

});


function displayProject(project) {
    let container = document.getElementById("projects-container");
    container.innerText = "";
    project.forEach(project => {

        container.innerHTML += `
        <div class="col-4" id="projectData">
        <!-- Basic -->
        <div class="card" style="width: 20rem;">
            <img src="/project/pages/images/html.jpg" class="card-img-top" alt="">
            <div class="card-body" style="height: 180px; overflow: hidden;">
                <h5 class="card-title"> ${project.Title}</h5>
                <h5 class="card-title"> ${project.budget}$</h5>
                <?php

                ?>
                <p class="card-text des-project">  ${project.Description_project} </p>
                <a href="viewproject.php?viewid=${project.ID} " class="btn btn-primary btn-block des-project" style="position: absolute; bottom: 5px; right: 5px;">view more</a>
            </div>
        </div>
    </div>
        `    
        
    });
}
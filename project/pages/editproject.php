<?php
session_start();
require "../../project/pages/handlers/profile_script.php";

if (isset($_GET['projectid'])) {
  $project_id = $_GET['projectid'];
  global $con;
  $id_user = $_SESSION['id'];
  $query = "select * from projets 
    WHERE ID_User = $id_user AND ID = $project_id";
  $res = mysqli_query($con, $query);
}



if (isset($_POST['editproject'])) {
  $p_name = $_POST['p_name'];
  $p_description = $_POST['p_description'];
  $deadline = $_POST['deadline'];
  $budget = $_POST['budget'];
  $ID_Categorie = $_POST['ID_Categorie'];
  $query = "UPDATE `projets` 
  SET `Title`='$p_name',`Description_project`='$p_description',`ID_Categorie`='$ID_Categorie',`deadline`='$deadline',`budget`='$budget' 
  WHERE ID_User=$id_user AND projets.ID = $project_id";
  $res = mysqli_query($con, $query);
  header('Location: profile.php');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/project/pages/css/editprofile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- animation links -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- link for icons -->
  <script src="https://kit.fontawesome.com/6cd9388e68.js" crossorigin="anonymous"></script>
  <!-- animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>


<body>
  <?php
  require "navbar.php";
  ?>
  <div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
      Edit project
    </h4>
    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">

              <div class="card-body media align-items-center">
                <img src="../pages/images/rocket.jpg" alt="" class="d-block ui-w-80">
                <div class="media-body ml-4">
                  <label class="btn btn-outline-primary">
                    Upload new photo
                    <input type="file" class="account-settings-fileinput">
                  </label> &nbsp;
                  <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                </div>
              </div>
              <hr class="border-light m-0">

              <div class="card-body">
                <form method="post">
                  <div class="form-group">
                    <?php
                    while ($fetchproject = mysqli_fetch_assoc($res)) {
                    ?>
                      <label class="form-label">Project name</label>
                      <input name="p_name" type="text" class="form-control mb-1" value="<?= $fetchproject['Title'] ?>">
                  </div>
                  <div class="form-group">
                    <label class="form-label">description</label>
                    <textarea name="p_description" id="" cols="30" rows="10"><?= $fetchproject['Description_project'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Deadline</label>
                    <input name="deadline" type="date" class="form-control mb-1" value="<?= $fetchproject['deadline'] ?>">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Budget</label>
                    <input name="budget" type="text" class="form-control mb-1" value="<?= $fetchproject['budget'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">categories</label>

                    <select name="ID_Categorie" class="form-select" aria-label="Default select example">
                      <option selected disabled>Open this select menu</option>
                      <?php
                      $query = "select c.ID,c.Name_categories from Categories c
                       WHERE c.ID_Categorie IS  null;";

                      global $con;
                      $res = mysqli_query($con, $query);

                      while ($category = mysqli_fetch_assoc($res)) {
                        $GLOBALS['categorys'][] = $category;
                      }
                      for ($i = 0; $i < count($GLOBALS["categorys"]); $i++) {
                      ?>
                        <option value="<?= $GLOBALS["categorys"][$i]["ID"] ?>"><?= $GLOBALS["categorys"][$i]["Name_categories"] ?></option>

                      <?php
                      };
                      ?>
                    </select>
                  </div>
                <?php
                    }
                ?>

                <div class="text-right mt-3">
                  <button name="editproject" type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

              </div>

            </div>
          </div>
        </div>


      </div>
      <!-- Place the first <script> tag in your HTML's <head> -->
      <script src="https://cdn.tiny.cloud/1/tae69tv15q8646ee9ytsznj2x6mphimtyeq9b9nhu5iyo6jg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

      <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
      <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
          tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
          mergetags_list: [{
              value: 'First.Name',
              title: 'First Name'
            },
            {
              value: 'Email',
              title: 'Email'
            },
          ],
          ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
      </script>
</body>

</html>
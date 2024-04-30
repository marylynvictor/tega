
<?php
session_start();
if(isset($_POST['submit'])) {
   // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $checkbox = $_POST['checkbox'];
    $checkbox_str = implode(',', $checkbox);
    $email = $_POST['email'];
    $budgetrange = $_POST['budget-range'];
    $projectdescription = $_POST['project-description'];
    $projecttimeline = $_POST['project-timeline'];
    
        if($firstname === "" || $lastname === "" || $checkbox_str === "" || $budgetrange === "" || $email === "" || $projectdescription === "" || $projecttimeline  === "") {
            $_SESSION['error_message'] = 'Fields cannot be empty!';
            header('Location: contact.php');
            exit();
         }
    
    $headers = "From: $firstname" ." " . $lastname . "\r\n" .
    
    "Full Name: $firstname" ." ". $lastname . "\r\n" . "Services: $checkbox_str" . "\r\n" . "Budget range: N" .number_format($budgetrange) . "\r\n" . "Email: $email" . "\r\n" . "Project Description: $projectdescription" . "\r\n" . "Project Timeline: $projecttimeline";
    
    
    // send email
if(mail("info@designingwithtega.com","Designing With Tega", $headers)){
    // echo "Successfully Registered";
    $_SESSION['success_message'] = "Message successfully recieved!";

}
else{
    $_SESSION['error_message'] = 'Fail to sent message';
    
}


}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <!-- site metas -->
    <title>DesigningWithTega</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
    <!-- Tweaks for older IEs-->
    <link
      rel="stylesheet"
      href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"
    />
    <!-- fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap"
      rel="stylesheet"
    />
    <!-- font awesome -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!--  -->
    <!-- owl stylesheets -->
    <link
      href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesoeet" href="css/owl.theme.default.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen"
    />
  </head>

  <style>
    .x {
      position: absolute;
      right: 0;
    }

    .progress {
      width: 100%;
      height: 20px;
      background-color: #f0f0f0;
      margin-top: 10px;
    }

    #progressBar {
      height: 100%;
      background-color: #007bff;
      width: 0%;
    }

    input[type="range"] {
      width: 100%;
      margin-top: 10px;
    }

    p {
      margin-top: 10px;
    }
  </style>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 d-md-block d-none">
          <img src="images/contact.jpg" alt="" />
        </div>
        <div class="col-md-8 form-con">
          <div class="d-flex justify-content-center">
            <img src="images/logo/logo.png" alt="" class="text-center" />
            <a href="index.php" class="btn text-white fs-3 x">X</a>
          </div>
          <h1 style="font-size: 2.1rem" class="pt-4 pb-3 text-white">
            CONTACT US
            <span><img src="./images/white-arrow.png" alt="" /></span>
          </h1>
          <h3 class="fs-5 text-white">
            Use the form to reach us, or send us a mail
          </h3>
                                <?php
                        // Check if success message exists
                        if (isset($_SESSION['success_message'])) {
                            ?>
                            <div class="alert alert-success mt-3" role="alert">
                              <?= $_SESSION['success_message']; ?>
                            </div>
                            <?php
                            unset($_SESSION['success_message']);
                        }
                    ?>
                    
                    <?php 
                    // Check if error message exists
                        if (isset($_SESSION['error_message'])) {
                            ?>
                            <div class="alert alert-danger mt-3" role="alert">
                              <?= $_SESSION['error_message']; ?>
                            </div>
                            <?php
                            unset($_SESSION['error_message']);
                        }
                    ?>
          <div>
            <form action="" method="post" id="myForm">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <input
                    type="text"
                    name="firstname"
                    id=""
                    placeholder="First Name"
                    class="form-control"
                    required
                  />
                </div>
                <div class="col-md-6">
                  <input
                    type="text"
                    name="lastname"
                    id=""
                    placeholder="Last Name"
                    class="form-control"
                    required
                  />
                </div>
                <div class="col-md-12 mt-3 mb-3">
                  <input
                    type="email"
                    name="email"
                    id=""
                    placeholder="Email"
                    class="form-control"
                    required
                  />
                </div>
                <div class="col-md-12 text-white mb-2">
                  <h5 class="text-white">Services Needed</h5>
                  <div class="d-flex">
                    <div class="form-check mr-3">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value="residential"
                        id="flexCheckDefault"
                        name="checkbox[]"
                      />
                      <label class="form-check-label" for="flexCheckDefault">
                        Residential
                      </label>
                    </div>
                    <div class="form-check mr-3">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value="commercial"
                        id="flexCheckDefault"
                        name="checkbox[]"
                      />
                      <label class="form-check-label" for="flexCheckDefault">
                        Commercial
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value="other inquiry"
                        id="flexCheckDefault"
                        name="checkbox[]"
                      />
                      <label class="form-check-label" for="flexCheckDefault">
                        Other Inquiry
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-3 mb-3">
                  <input
                    type="text"
                    name="project-timeline"
                    id=""
                    placeholder="Estimated Project Timeline"
                    class="form-control"
                    required
                  />
                </div>
                <div class="col-md-12 mt-3 mb-3">
                  <label for="" class="text-white">Approximate Budget</label>
                  <input
                    type="range"
                    id="budgetRange"
                    min="1000000"
                    max="100000000"
                    value="1000000"
                    step="1000000"
                    name="budget-range"
                    oninput="updateProgressBar()"
                  />
                  <p class="text-white">
                    Current Budget: &nbsp;&nbsp;&nbsp;<span id="budgetValue" class="text-white">N1,000,000</span>
                  </p>
                  <div class="progress" hidden>
                    <div id="progressBar"></div>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    placeholder="Describe Your Project"
                    name="project-description"
                    required
                  ></textarea>
                </div>
                <div class="col-md-9"></div>
                <div class="col-md-3">
                  <button
                    type="submit"
                    class="text-white btn p-2"
                    style="background-color: #000; width: 150px"
                    name="submit"
                  >
                    Submit
                  </button>
                </div>
                <div class="col-md-12">
                  <h3 class="fs-5 text-white">
                    <span class="mr-2"
                      ><i class="fa-regular fa-envelope"></i></span
                    >Email Us
                  </h3>
                  <h3 class="fs-2 text-white">
                    <span class="mr-2"></span>example@gmail.com
                  </h3>
                </div>
                <div class="col-md-12 mb-2">
                  <div class="d-grid gap-2">
                    <button class="btn btn-light p-3" type="submit" onclick="resetForm()">
                      Cancel
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      function updateProgressBar() {
        var range = document.getElementById("budgetRange");
        var progressBar = document.getElementById("progressBar");
        var budgetValue = document.getElementById("budgetValue");

        var value = range.value;
        var min = range.min;
        var max = range.max;
        var percentage = ((value - min) / (max - min)) * 100;

        progressBar.style.width = percentage + "%";
        budgetValue.textContent = "N" + numberWithCommas(value); // Format number with commas
      }

      function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }

      // Initialize progress bar on page load
      updateProgressBar();
    </script>

<script>
function resetForm() {
  document.getElementById("myForm").reset();
}
</script>
  </body>
</html>

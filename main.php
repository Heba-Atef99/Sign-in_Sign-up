<?php
      include ('backend/connection.php');
?>


<!DOCTYPE html>
 <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Registration</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       	<link href="https://fonts.googleapis.com/css?family=Amiri|Merriweather|Lora&display=swap" rel="stylesheet">
        <link href="http://www.stp-egypt.com/logo.png" rel="icon" type="image/jpg">
        <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href = "css/styles.css">
    </head>

    <body>
       <div class="container-fluid">
           <div class="row">
              <div class="col-6">
                  <!-- Sign-Up Form -->
                  <form class="signUp" action="backend/signup.php" method="POST">
                    <div class="container">
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="label" for="fullName">Full Name:</label>
                                <input type="text" id="fName" class="form-control" name="fullName" placeholder="ex: Ahmed Muhammed Atef" pattern="[a-zA-Z0-9\s]+" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode) == 32 ;">                              
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="label" for="commiteeName">Committee Name:</label>
                                <input type="text" id="cName" class="form-control" name="committeeName" placeholder="ex: Logistics" pattern="[a-zA-Z0-9\s]+" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode) == 32 ;">
                            </div>

                            <div class="form-group col-md">
                                <label class="label" for="name">Phone Number:</label>
                                <input type="tel" id="number" class="form-control" name = "number" placeholder="Ex: 01*********" pattern="[0-9]{11}" required onkeypress="isInputNumber(event)">
                                <h6 id="hnumber"></h6>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="lable" for="email">E-mail:</label> 
                                <input type="email" id="upEmail" class="form-control" name="upEmail" placeholder="ex: user@example.com" required>
                                <h6 id="ue"></h6>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="lable" for="email">Password:</label> 
                                <input type="password" id="password" class="form-control" name="password" required>
                                <h6 id="pass"></h6>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="lable" for="email">Confirm Password:</label> 
                                <input type="password" id="cPassword" class="form-control" name="cPassword" required>
                                <h6 id="cPass"></h6>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md imgInput">
                                <div class="file-upload-wrapper" data-text="Upload Your Personal Image">
                                    <input name="file-upload-field" type="file" class="file-upload-field" id="img" accept="image/*" value="">
                                </div>                             
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <button name="upBtn" type="submit" class="btn btn-danger upBtn">Sign-up</button>
                        </div>

                    </div>
                  </form>
              </div>

              <div class="col-6">
                  <!-- Sign-In Form -->
                  <form class="signIn" action="backend/signin.php" method="post">
                      <div class="container">
                          <div class="form-row">
                              <div class="form-group col-md">
                                <label class="lable" for="email">E-mail:</label> 
                                <input type="email" id="inEmail" class="form-control" name="inEmail" placeholder="ex: user@example.com" required>
                              </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-md">
                                <label class="lable" for="password">Password:</label> 
                                <input type="password" id="inPass" class="form-control" name="inPass"  required>
                            </div>
                          </div>

                          <div class="form-row justify-content-center">
                              <button name="inBtn" type="submit" class="btn btn-danger inBtn">Sign-in</button>
                          </div>
                      </div>
                  </form> 
              </div>
           </div>
        </div> 
    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>      
    <script src="js/scripts.js"></script>

    
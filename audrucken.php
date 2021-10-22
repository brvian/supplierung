<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
            /* Button used to open the contact form - fixed at the bottom of the page */
            .open-button {
              background-color: #555;
              color: white;
              padding: 16px 20px;
              border: none;
              cursor: pointer;
              opacity: 0.8;
              position: relative;
              /*right: 28px; */
              width: 150px; 
            }
            
            /* The popup form - hidden by default */
            .form-popup {
              display: none;
              position: fixed;
              bottom: 0;
              right: 15px;
              border: 3px solid #f1f1f1;
              z-index: 9;
            }
            
            /* Add styles to the form container */
            .form-container {
              max-width: 300px;
              padding: 10px;
              background-color: white;
            }
            
            /* Full-width input fields */
            .form-container input[type=text], .form-container input[type=password] {
              width: 100%;
              padding: 15px;
              margin: 5px 0 22px 0;
              border: none;
              background: #f1f1f1;
            }
            
            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus, .form-container input[type=password]:focus {
              background-color: #ddd;
              outline: none;
            }
            
            /* Set a style for the submit/login button */
            .form-container .btn {
              background-color: #04AA6D;
              color: white;
              padding: 16px 20px;
              border: none;
              cursor: pointer;
              width: 100%;
              margin-bottom:10px;
              opacity: 0.8;
            }
            
            /* Add a red background color to the cancel button */
            .form-container .cancel {
              background-color: red;
            }
            
            /* Add some hover effects to buttons */
            .form-container .btn:hover, .open-button:hover {
              opacity: 1;
            }
            table, td, th {
                border: 1px solid black;
            }

            td, th{
                width:14.2%;
                height:50px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }
            </style>   

        </head>
        <body>
            <?php include 'navbar.php' ?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" style="background-color:#ff0000d8;color:white;box-shadow:none;border:none;border-radius:0px;padding: 14px 16px;font-size: 17px;position:relative;left:1200px;" data-toggle="modal" data-target="#exampleModal">
                Ausdrucken
            </button>
            
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content" style="position:relative;right:100%;width:300%;height:850px">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supplierung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <img src="images/school_logo.png" style="width:200px;"></img>
                    </br>
                    </br>
                    <table>
                        <thead>
                            <tr>
                                <th>Stunde</th>
                                <th>Klasse</th>
                                <th>Raum</th>
                                <th>Abwesend</th>
                                <th>Vertretung</th>
                                <th>Status</th>
                                <th>Datum</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <label for="printers">Choose a Printer:</label>
                        <select name="printers" id="printers">
                            <option value="volvo">1 FLoor</option>
                            <option value="saab">2 Floor</option>
                            <option value="mercedes">3 Floor</option>
                            <option value="audi">4 Floor</option>
                        </select> 
                    <button class="open-button" onclick="openForm()">Edit printer</button>
                    <div class="form-popup" id="myForm">
                        <form action="/action_page.php" class="form-container">
                            <h1>Edit</h1>
                        
                            <label for="email"><b>Name</b></label>
                            <input type="text" placeholder="Enter name" name="name" required>
                        
                            <label for="psw"><b>IP</b></label>
                            <input type="text" placeholder="Enter IP" name="ip" required>
                        
                            <button type="submit" class="btn">Edit</button>
                            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                        </form>
                    </div>

                    </br>
                    </br>
                
                    <button class="open-button" onclick="openForm2()">Add printer</button>
                    <div class="form-popup" id="myForm2">
                        <form action="/action_page.php" class="form-container">
                            <h1>Add</h1>
                        
                            <label for="email"><b>Name</b></label>
                            <input type="text" placeholder="Enter name" name="name" required>
                        
                            <label for="psw"><b>IP</b></label>
                            <input type="text" placeholder="Enter IP" name="ip" required>
                        
                            <button type="submit" class="btn">Add</button>
                            <button type="button" class="btn cancel" onclick="closeForm2()">Close</button>
                        </form>
                    </div>
                    <button type="button" class="open-button" data-dismiss="modal" style="background-color:#e2001a" onclick="closeAll()">Exit</button>
                    <button type="button" class="open-button" style="background-color:#00b3ff">Save & Exit</button>
                    <button type="button" class="open-button" style="background-color:#00b3ff">Ausdrucken</button>
                </div>
            </div>
            </div>
        </div>
        <script>
            $('#myModal').on('shown.bs.modal', function () {Supplierung
                $('#myInput').trigger('focus')
            })
            function openForm() {
            document.getElementById("myForm").style.display = "block";
            document.getElementById("myForm2").style.display = "none";
            }

            function closeForm() {
            document.getElementById("myForm").style.display = "none";
            }
            function openForm2() {
            document.getElementById("myForm2").style.display = "block";
            document.getElementById("myForm").style.display = "none";
            }

            function closeForm2() {
            document.getElementById("myForm2").style.display = "none";
            }
            function closeAll(){
              document.getElementById("myForm").style.display = "none";
              document.getElementById("myForm2").style.display = "none";
            }
        </script>
    </body>
</html>
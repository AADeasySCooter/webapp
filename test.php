<?php
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');





?>

<main>
        <div class="container">
             <div class="div-center">
                <section id="course" class="course">
                
                    
                <div class="row">
                    
                    <div class="course-col">
                                               <form name="frm" >
                                                <input type="submit" class="btn btn-secondary" name="submit" value="submit" class="btn btn">
                                                </form>


                                         <script>
                                                $(document).ready(function() {
                                                    $("form").on("submit", function(event) {
                                                        $.ajax({
                                                        type: 'POST',
                                                        url: 'sve.php',
                                                        data: $( this ).serialize(),
                                                        success: function(data) {
                                                            //success code
                                                        }
                                                        });
                                                    });
                                                    });
                                        </script>
                    
                        
                   

                           

                    </div>
                

                
                
                </div>
                

                </section>
            </div>
        </div>
    </main>



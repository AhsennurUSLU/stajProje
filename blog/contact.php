<?php
$sayfa="contact";
include("include/head.php");
?>
        <div class="tm-contact-img-container">
            
        </div>

        <section class="tm-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <section>
                            <h3 class="tm-gold-text tm-form-title">Pellentesque fermentum mauris</h3>
                            <p class="tm-form-description">Vivamus accumsan blandit ligula. Sed lobortis efficitur sapien. Quisque vel sem eu turpis ullamcorper euismod. Praesent quis nisi ac augue luctus viverra. Sed et dui nisi. Fusce vitae dapibus justo.</p> 


                            
                        </section>
                        
                                             
                 

                    </div>
                    <div class="col-12">
                        
                    <form action="index.html" method="post" class="tm-contact-form">                                
                                <div class="form-group">
                                    <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name"  required/>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email"  required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="contact_subject" name="contact_subject" class="form-control" placeholder="Subject"  required/>
                                </div>
                                <div class="form-group">
                                    <textarea id="contact_message" name="contact_message" class="form-control" rows="6" placeholder="Message" required></textarea>
                                </div>
                            
                                <button type="submit" class="tm-btn">Submit</button>                          
                            </form>   

                    </div>

                   
                </div>

            </div>
        </section>
        
        <?php
       include("include/footer.php");
       ?>
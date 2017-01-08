
<div class="w3-container w3-padding-128 w3-light-grey" id="contact">
  <h3 class="w3-center">CONTACT</h3>
  <p class="w3-center w3-large">Lets get in touch. Send us a message:</p>

  <?php 
  if(isset($flashMessage))
  {?>
  <div class="alert alert-success">
  <?php echo (isset($flashMessage))?$flashMessage:""; ?>
  </div>
 <?php }
  ?>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-half">
      <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Office No.6,Yashlakshmi Phase 1, Khodad Road, Narayangaon</p>
      <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +91 9552892451, +91 7774896892  </p>
      <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: sdadvertisements@gmail.com</p>
      <br>
      <form method="post">
        <p><input class="w3-input w3-border" type="text" placeholder="Name" required name="name"></p>
        <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="email"></p>
        <p><input class="w3-input w3-border" type="text" placeholder="Subject" required name="subject"></p>
        <p><input class="w3-input w3-border" type="text" placeholder="Message" required name="message"></p>
        <p>
          <input class="w3-btn w3-padding" type="submit" name="send" value="SEND MESSAGE">
           <!--  <i class="fa fa-paper-plane"></i> --> 
        </p>
      </form>
    </div>
    <div class="w3-half">
      <!-- Add Google Maps -->
      <!-- <div id="googleMap" class="w3-greyscale-max" style="width:100%;height:510px;"></div> -->

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60317.23341286703!2d73.9404766444034!3d19.115240072249982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdd3b9845698315%3A0x41dcc94ad784d68d!2sNarayangaon%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1482840876720" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
</div>







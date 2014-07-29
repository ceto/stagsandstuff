<div id="package-enquire" class="package-enquire collapse">
  <div class="panel-body">
    <a class="panel-close" href="#" data-toggle="collapse" data-target="#package-enquire"><i class="ion-close-circled"></i></a>
    <h2 class="ctitle">Enquire for <?php the_title(); ?></h2>
    <h3 class="csubtitle">Add your details here</h3>
     <hr>
    <form class="form-horizontal" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    <div class="leftfields">
      <div class="items">
        <label for="message_name">Name *</label>
        <input type="text" required placeholder="John Doe" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
      </div>
      <div class="items">
        <label for="message_name">E-mail *</label>
        <input type="email" required placeholder="name@example.com" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
      </div>
      <div class="items">
        <label for="message_tel">Phone</label>
        <input type="tel" placeholder="003612345678" id="message_tel" name="message_tel" value="<?php echo $_POST['message_tel']; ?>">
      </div>
    </div>
    <div class="rightfields">
      <div class="items">
        <label for="message_date">Date *</label>
        <input type="date" required id="message_date" name="message_date" value="<?php echo $_POST['message_date']; ?>">
      </div>
      <div class="items">
          <label for="message_text">Message</label>
          <textarea placeholder="Add any question here ..." rows="4" id="message_text" name="message_text"><?php echo $_POST['message_text']; ?></textarea>
      </div>
    </div>
    <div class="actions">
      <input type="hidden" name="message_human" value="2">
      <input type="hidden" name="submitted" value="1">
      <input type="submit" class="btn submitbtn" value="<?php _e('Send form','roots'); ?>">
      <div class="oki">*Fields are required</div>
    </div>
    </form>
  </div>
</div>
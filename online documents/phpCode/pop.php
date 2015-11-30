
  <script src="js/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="css/jqpop.css" />
<script src="js/jqpop.js"></script>
 <div id="mainform">
 <hr>
<h2>jQuery Popup Form Example</h2>
<!-- Required Div Starts Here -->
<div class="form" id="popup">
<b>1.Onload Popup Login Form</b><br/><hr/>
<span>Wait for 3 second.Login Popup form Will appears.</span><br/><br/><br/>
<b>2.Onclick Popup Contact Form</b><hr/>
<p id="onclick">Popup</p>
</div>
</div>
<!-- Contact Form -->
<div id="contactdiv">
<form class="form" action="#" id="contact">
<img src="button_cancel.png" class="img" id="cancel"/>
<h3>Contact Form</h3>
<label>Name: <span>*</span></label>
<input type="text" id="name" placeholder="Name"/>
<label>Email: <span>*</span></label>
<input type="text" id="email" placeholder="Email"/>
<label>Contact No: <span>*</span></label>
<input type="text" id="contactno" placeholder="10 digit Mobile no."/>
<label>Message:</label>
<textarea id="message" placeholder="Message......."></textarea>
<input type="button" id="send" value="Send"/>
<input type="button" id="cancel" value="Cancel"/>
<br/>
</form>
</div>
</div>
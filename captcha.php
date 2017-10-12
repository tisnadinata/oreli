<style>
.captcha{ 
font: italic bold 16px "Comic Sans MS", cursive, sans-serif; 
background-color:cornsilk;
width:100px;
text-align:center;
text-decoration:line-through;
}
.errmsg
{
	color:#ff0000;
}
</style>
<div class="row col-md-12">
	<div class="col-md-4 col-xs-8" id="captcha">
		<script> createCaptcha(); </script>
	</div>
<!--	<div class="col-md-2 col-xs-2">
		<a onclick='createCaptcha()' href='#' ><img src="images/update.png" width="40px" /></a>    
	</div>
-->	<div class="col-md-4 col-xs-7">
		<input type="text" class="input--wd col-md-12 col-xs-12" name="recaptcha" id="recaptcha" placeholder="Hasil"/>
	</div>
	<div class="col-md-3 col-xs-4">
        <input type="button" value="Cek" class="btn btn--wd" onClick="validateRecaptcha()"/>
	</div>
	<div class="col-md-12 col-xs-12" id="errCaptcha" class="errmsg">
	</div>
</div>

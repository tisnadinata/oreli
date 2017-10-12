<script type="text/javascript">
		function RedirectToDOKU() {
				document.getElementById("formDokuOrder").submit();
		}
</script>

<p class="payment_module">
	<a href="#" title="{l s='Pay via DOKU' mod='dokuonecheckout'}" onclick="RedirectToDOKU();">
		<img src="{$this_path}logo.png" alt="{l s='Pay via DOKU' mod='dokuonecheckout'}"/>
		{$payment_name}
	</a>
</p>

<form name="formDokuOrder" id="formDokuOrder" action="{$URL}" method="post">

    <input type=hidden name="MALLID"           value="{$MALLID}">
		<input type=hidden name="CHAINMERCHANT"    value="{$CHAINMERCHANT}">
    <input type=hidden name="TRANSIDMERCHANT"  value="{$TRANSIDMERCHANT}">
    <input type=hidden name="AMOUNT"           value="{$AMOUNT}">
		<input type=hidden name="PURCHASEAMOUNT"   value="{$PURCHASEAMOUNT}">
    <input type=hidden name="WORDS"            value="{$WORDS}">
    <input type=hidden name="REQUESTDATETIME"  value="{$REQUESTDATETIME}">
    <input type=hidden name="CURRENCY"         value="{$CURRENCY}">
    <input type=hidden name="PURCHASECURRENCY" value="{$PURCHASECURRENCY}">				
    <input type=hidden name="SESSIONID"        value="{$SESSIONID}">
    <input type=hidden name="PAYMENTCHANNEL"   value="{$PAYMENTCHANNEL}">														
    <input type=hidden name="NAME"             value="{$NAME}">
		<input type=hidden name="EMAIL"            value="{$EMAIL}">		
    <input type=hidden name="HOMEPHONE"        value="{$HOMEPHONE}">
    <input type=hidden name="MOBILEPHONE"      value="{$MOBILEPHONE}"> 
    <input type=hidden name="BASKET"           value="{$BASKET}">				
    <input type=hidden name="ADDRESS"          value="{$ADDRESS}"> 
	  <input type=hidden name="CITY"             value="{$CITY}"> 
    <input type=hidden name="STATE"            value="{$STATE}"> 
    <input type=hidden name="ZIPCODE"          value="{$ZIPCODE}"> 				

</form>
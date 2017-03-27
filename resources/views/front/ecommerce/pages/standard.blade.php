<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Website Payment Standard</title>

</head>
<!--onload="paypal_submit();"-->
<body >
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="business" value="seller@designerfotos.com">
    <input type="hidden" name="item_name" value="hat">
    <input type="hidden" name="item_number" value="123">
    <input type="hidden" name="amount" value="15.00">
    <input type="hidden" name="first_name" value="John">
    <input type="hidden" name="last_name" value="Doe">
    <input type="hidden" name="address1" value="9 Elm Street">
    <input type="hidden" name="address2" value="Apt 5">
    <input type="hidden" name="city" value="Berwyn">
    <input type="hidden" name="state" value="PA">
    <input type="hidden" name="zip" value="19312">
    <input type="hidden" name="night_phone_a" value="610">
    <input type="hidden" name="night_phone_b" value="555">
    <input type="hidden" name="night_phone_c" value="1234">
    <input type="hidden" name="email" value="jdoe@zyzzyu.com">
    <input type="image" name="submit"
           src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
           alt="PayPal - The safer, easier way to pay online">
</form>
</body>
</html>
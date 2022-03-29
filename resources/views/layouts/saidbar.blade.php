<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Character Filtering</title>
    <script type="text/javascript">

        function CheckArabicOnly(field) {
            var sNewVal = "";
            var sFieldVal = field.value;

            for (var i = 0; i < sFieldVal.length; i++) {
                var ch = sFieldVal.charAt(i),
                    c  = ch.charCodeAt(0);

                if (field.keyCode = '38') {
                }
                else if (field.keyCode = '40') {
                    // down arrow
                }
                else if (field.keyCode = '37') {
                }
                else if (field.keyCode = '39') {
                    // right arrow
                }

                if (c < 1536 || c > 1791) {
                    // Discard
                }
                else {
                    sNewVal += ch;
                }
            }

            field.value = sNewVal;
        }
    </script>
</head>
<body>
Arabic Only (onchange):
<input type="text"
       id="txtArabic"
       onchange="CheckArabicOnly(this);"
       onkeypress="CheckArabicOnly(this);"
       onkeyup="CheckArabicOnly(this);"
       onpaste="CheckArabicOnly(this);"  />
<br />
</body>
</html>

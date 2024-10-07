<html>
<head><title>Attendance System</title></head>
<body>

<table>
<tr><td>
<input type="file" name="student_image" />
<input type="button" onclick="uploadpic()"/>
</td></tr>
<tr><td>
<img id="demo"/>
</td></tr>



</table>
<script type="text/javascript">
function uploadpic(){
    var img = document.getElementsByTagName("student_image");
    document.getElementsById("demo").innerHTML = "img" ;
}
</script>
</body>
</html>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
     $(function(){
        $("input[name='file']").on("change", function(){
            var formData = new FormData($("#uploadimage")[0]);
            var ruta = "imagen-ajax.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#respuesta").html(datos);
                }
            });
        });
     });
</script>
<body>
<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
<input type="file" name="file" id="file" required />
<input type="submit" value="Upload" class="submit" />
</form>
<div id="respuesta"></div>
</body>
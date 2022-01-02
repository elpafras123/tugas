<?php

require 'function.php';

$id = $_GET['id'];


if (duplicate($id)>0){
    echo    
            " <script>
                alert('data berhasil masuk report!');
                document.location.href = 'tabel.php';
            </script>
            ";
}else{
    echo   
            "<script>
                alert('data berhasil masuk report!');
                document.location.href = 'tabel.php';
            </script>
            ";
}

?>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script>
    var dialog = bootbox.dialog({
    title: 'A custom dialog with buttons and callbacks',
    message: "<p>This dialog has buttons. Each button has it's own callback function.</p>",
    size: 'large',
    buttons: {
        cancel: {
            label: "I'm a cancel button!",
            className: 'btn-danger',
            callback: function(){
                console.log('Custom cancel clicked');
            }
        },
        noclose: {
            label: "I don't close the modal!",
            className: 'btn-warning',
            callback: function(){
                console.log('Custom button clicked');
                return false;
            }
        },
        ok: {
            label: "I'm an OK button!",
            className: 'btn-info',
            callback: function(){
                console.log('Custom OK clicked');
            }
        }
    }
});
</script>
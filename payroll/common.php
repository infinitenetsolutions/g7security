
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <script src="vendors/pnotify/dist/pnotify.js"></script>
    <script src="vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="vendors/pnotify/dist/pnotify.nonblock.js"></script>


</head>
<body>

</body>


<script>
    function show_success() {
        new PNotify({
            title: 'Success',
            text: 'Data has been successfully inserted!',
            type: 'success',
            styling: 'bootstrap3'
        });
    }


    function show_error() {
        new PNotify({
            title: 'Sorry!',
            text: 'Something went wrong.',
            type: 'error',
            styling: 'bootstrap3'
        });
    }

    function show_update() {
        new PNotify({
            title: 'Success',
            text: 'Data has been successfully updated!',
            type: 'success',
            styling: 'bootstrap3'
        });
    }




</script>
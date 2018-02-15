<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".tab").click(function (e) {
    e.preventDefault();
    $.post(
            'controllers/definition-controller.php',
            {

                letter: $(".tab").val(),
                ajax: 'test'
                    },
                    );
        })
    });
</script>



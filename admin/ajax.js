<script>
    $(document).ready(function(){

    $('#displaybtn').click(function (e){
        e.preventDefault();
        $.ajax(
            {
                method:"post",
                url:"fetchdata.php",
                data:$('#displaydata').serialize(),
                dataType:"html",
                success: function (response){
                    $('').text();
                }

            });
    })
});

</script>
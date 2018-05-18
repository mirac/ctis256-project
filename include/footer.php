
<script type="text/javascript">
    $(function () {

    });



    function addBasket(id, amount) {

        if(amount == null)
            amount = 1;

        var request = $.ajax({
            url: 'add_to_basket.php?addToBasketAjax=true&product_id='+id+'&amount='+amount,
            type: 'GET',
            //data: { field1: "hello", field2 : "hello2"} ,
            data: {},
            contentType: 'application/json; charset=utf-8'
        });

        request.done(function (response) {
            $.toast({
                heading: 'Success',
                text: response,
                showHideTransition: 'slide',
                icon: 'success',
                position: {
                    right: 20,
                    top: 60
                },
            })
        });

        request.fail(function(jqXHR, textStatus) {
            alert("AJAX Error! : " + textStatus);
        });

    }
</script>

</body>
</html>

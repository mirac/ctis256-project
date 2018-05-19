
<script type="text/javascript">
    $(function () {

    });

    function cleanBasket() {
        var request = $.ajax({
            url: 'basket_operations.php?cleanBasket=true',
            type: 'GET',
            data: {},
            contentType: 'application/json; charset=utf-8'
        });

        request.done(function (response) {
            $.toast({
                heading: 'Success',
                text: 'Basket cleaning completed successfully!',
                showHideTransition: 'slide',
                icon: 'success',
                position: {
                    right: 20,
                    top: 60
                },
            })

            location.reload();
        });
    }
    
    function paymentOperation() {
        var request = $.ajax({
            url: 'basket_operations.php?paymentOperation=true',
            type: 'GET',
            data: {},
            contentType: 'application/json; charset=utf-8'
        });

        request.done(function (response) {
            $.toast({
                heading: 'Success',
                text: 'Payment completed successfully!',
                icon: 'info',
                loader: true,
                loaderBg: '#9EC600',
                showHideTransition: 'slide',
                position: {
                    right: 20,
                    top: 60
                },
            })

            setTimeout(
                function() {
                    location.replace("index.php");
                }, 2000);
        });
    }

    function deleteProductFromBasket(id) {
        var request = $.ajax({
            url: 'basket_operations.php?deleteBasketProduct='+id,
            type: 'GET',
            data: {},
            contentType: 'application/json; charset=utf-8'
        });

        request.done(function (response) {
            $.toast({
                text: 'Processing! Please wait..',
                position: {
                    right: 20,
                    top: 60
                },
                icon: 'info'
            })

            location.reload();
        });
    }

    function addBasket(id, amount) {

        if(amount == null)
            amount = 1;

        var request = $.ajax({
            url: 'basket_operations.php?addToBasketAjax=true&product_id='+id+'&amount='+amount,
            type: 'GET',
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

            $.getJSON('basket_operations.php?countBasketProducts=true', function (data) {
                $('#basketSize').html(data);
            });
        });

        request.fail(function(jqXHR, textStatus) {
            alert("AJAX Error! : " + textStatus);
        });

    }
</script>

</body>
</html>

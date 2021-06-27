$(function(){
    const stripe = Stripe("pk_test_51IMCYoCj8A2ZxK62yWP0ebHpKSdI0vkw6k5Hdw7NR0n9bbavf9feAKX19RNpPFjSs7pLp43f5Kp3zLQU5lWS7BYK00197ip6ya");
    const checkoutButton = $('#checkout-button');
    const checkoutButton2 = $('#checkout-button2');

    checkoutButton.on('click', function(e){
        
        e.preventDefault();
        $.ajax({
            url:'index.php?action=pay',
            method:'post',
            data:{
                id:$('#ref').val(),
                marque:$('#marque').val(),
                modele:$('#modele').val(),
                prix:$('#prix').val(),
                email:$('#email').val(),
                quantite:$('#quant').val(),
                nb: $('#nb').val(),
                image: $("#img").val()
            },
            datatype: 'json',
            success:function(session){
                console.log(session);
                return stripe.redirectToCheckout({sessionId: session.id});
            },
            error: function(){
                console.error("fail to send!");
            }
        });
    })
    
        checkoutButton2.on('click', function(e){
            e.preventDefault();
            if($('#email').val() === ""){
                $('#errorMsg')
                    .attr("class","bg-danger")
                    .append('Veuillez entrer votre mail pour effectuer le paiement!')
            }else{
                console.log($('#totalPrice').val());
                console.log($('#totalArt').text());
                $.ajax({
                    url:'index.php?action=payCart',
                    method:'post',
                    data:{
                        // id:$('#ref').val(),
                        name:$('#name').val(),
                        prix:$('#prix').val(),
                        email:$('#email').val(),
                        // quantite:$('#quant').val(),
                        // nb: $('#nb').val()
                    },
                    datatype: 'json',
                    success:function(session){
                        console.log(session);
                        return stripe.redirectToCheckout({ sessionId: session.id});
                    },
                    error: function(){
                        console.error("fail to send!");
                    }
                });
            };
        });
    });



$(function(){
    const stripe = Stripe("pk_test_51IMCYoCj8A2ZxK62yWP0ebHpKSdI0vkw6k5Hdw7NR0n9bbavf9feAKX19RNpPFjSs7pLp43f5Kp3zLQU5lWS7BYK00197ip6ya");
    const checkoutButton = $('#checkout-button');
    checkoutButton.on('click', function(e){
        console.log($('#email').val());
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
                nb: $('#nb').val()
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
});
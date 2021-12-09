(function($) {

    $('.AjoutPanier').click(function(event) {
        event.preventDefault();
        $.get($(this).attr('href'),{},function(data){
            if(data.error) {
                alert(data.message);
            }
            else {
                if(confirm(data.messsage + '. Voulez-vous consulter votre panier ?')) {
                    location.href = 'Panier.php';
                }
                else {

                }
            }
        },'json');
        return false;
    });

})(jQuery);
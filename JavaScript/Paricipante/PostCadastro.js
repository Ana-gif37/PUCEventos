$(document).ready(function(){
    $('form').submit(function(){
        var dados=$(this).serialize();
        
        $.ajax({
            url:'PHP/Participante/ProcessaCadastro.php',
            method:'POST',
            dataType:'html',
            data: dados,
            success:function(data){
                
                $('.resultado').css({display:'block'}).html(data);
                
            }
        });
        return false;
        
    });
});
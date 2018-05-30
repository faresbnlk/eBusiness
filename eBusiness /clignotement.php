<script type="text/javascript">
var clignotement = function(){
   if (document.getElementById('DivClignotante').style.visibility=='visible'){
      document.getElementById('DivClignotante').style.visibility='hidden';
   }
   else{
   document.getElementById('DivClignotante').style.visibility='visible';
   }
};

// mise en place de l appel de la fonction toutes les 0.8 secondes

periode = setInterval(clignotement, 800);
</script> 
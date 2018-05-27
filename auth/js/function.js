/* Sub menu */
<script>
$(document).ready(function(){
  $('.dropdown').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  })
});
</script>

/* Menu Responsive */

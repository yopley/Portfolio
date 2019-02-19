


<script src="<?= WEBROOT; ?>js/jquery.js"></script>
<script>
	$(document).ready(function() {
		$('.js-scrollTo').on('click', function() { // Au clic sur un élément
			var page = $(this).attr('href'); // Page cible
			var speed = 750; // Durée de l'animation (en ms)
			$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
			return false;
		});
	});

</script>
<script>
(function($){

/* Quand je clique sur l'icône hamburger je rajoute une classe au body */
$('#header__icon').click(function(e){
		e.preventDefault();
		$('body').toggleClass('with--sidebar');
});

/* Je veux pouvoir masquer le menu si on clique sur le cache */
$('#site-cache').click(function(e){
		$('body').removeClass('with--sidebar');
})

})(jQuery);
</script>


<?php if(isset($script)): ?><?= $script; ?><?php endif; ?>
<footer>
  <i class="fa fa-google-plus" aria-hidden="true"></i>
  <i class="fa fa-linkedin" aria-hidden="true"></i>

</footer>
</div>
		<div class="site-cache" id="site-cache">
		</div>
</div>
</div>
</body>
</html>
<!--
<footer>


<h2 id="cont">-Quelques exemple de réalisations-</h2>
<p>Per hoc minui studium suum existimans Paulus, ut erat in conplicandis negotiis artifex dirus, unde ei Catenae inditum est cognomentum, vicarium ipsum eos quibus praeerat adhuc defensantem ad sortem periculorum communium traxit. et instabat ut eum quoque cum tribunis et aliis pluribus ad comitatum imperatoris vinctum perduceret: quo percitus ille exitio urgente abrupto ferro eundem adoritur Paulum. et quia languente dextera, letaliter ferire non potuit, iam districtum mucronem in proprium latus inpegit. hocque deformi genere mortis excessit e vita iustissimus rector ausus miserabiles casus levare multorum.</p>
<form action="#" method="post">
<fieldset>
<ul>
<li>

<input type="text" id="username" name="username"placeholder="Nom d'utilisateur">
</li>--><!--
--><!--<li>
<input type="text" id="password" name="password" placeholder="Mot de passe">
</li>--><!--
--><!--<li>
<button type="submit">Se connecter</button>
</li>
</ul>
</fieldset>
</form>

</footer>
-->

(function(){
	/* Identifier la collection de carrousels */
	let carrousel = document.querySelectorAll('.carrouselCours');
	let ctrlCarrousel = document.querySelectorAll('.ctrl-carroussel');
	let noCtrlCarrousel = 0;
	for (const elmCarrousel of carrousel)
	{
    let bout = ctrlCarrousel[noCtrlCarrousel++].querySelectorAll('.rad-carrousel');
	let k = 0;
	bout[0].checked=true;
	for (const bt of bout){
		bt.value = k++;
		bt.addEventListener('mousedown', function(){
			elmCarrousel.style.transform= "translateX(" + (-this.value*100) + "vw)"
		})
	}
	}
}())
            
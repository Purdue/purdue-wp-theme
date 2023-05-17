window.almDone = function(){
	[...document.querySelectorAll('.alm-btn-wrap')].forEach((el)=>{
        el.style.display = "none";
    });
};
// window.almDone();
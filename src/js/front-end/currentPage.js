//Highlight current page/folder on top nav

const $currentpage=window.location.href;
const $topnav=document.querySelector('.purdue-navbar-white .navbar-start');
if($topnav){
    const $navbar_items=Array.prototype.slice.call($topnav.querySelectorAll('a'), 0);
    if ($navbar_items.length > 0) {
        $navbar_items.forEach((el)=>{
            const $href=el.getAttribute('href');
            if(($currentpage ===$href)){
                if(el.parentElement.parentElement.classList.contains('navbar-start')){
                    el.classList.add('is-active-page');
                }else if(el.parentElement.parentElement.classList.contains('navbar-dropdown')){
                    el.parentElement.parentElement.previousElementSibling.classList.add('is-active-page');
                }else if(el.parentElement.parentElement.classList.contains('navbar-dropdown-submenu')){
                    el.parentElement.parentElement.parentElement.parentElement.previousElementSibling.classList.add('is-active-page');
                }
            }
        })
    }
}

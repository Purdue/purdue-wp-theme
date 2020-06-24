document.addEventListener('DOMContentLoaded', () => {
  // set FA to add in icons where used in psuedo elements.
  window.FontAwesomeConfig = {
    searchPseudoElements: true,
  }

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0)
  const $aside = document.querySelector('.side-nav')
  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {
    // Add a click event on each of them
    $navbarBurgers.forEach((el) => {
      el.addEventListener('click', () => {
        // Get the target from the "data-target" attribute
        const target = el.dataset.target
        const $target = [...document.querySelectorAll(`[data-menu='${target}']`)]
        const $navBar = document.querySelector('.purdue-navbar-white')
        const $button = document.querySelector('.purdue-navbar-black>.navbar-end')
        const expanded = el.getAttribute('aria-expanded') === 'false' ? true : false
        const hamburgerIcon = el.querySelector('.burger-icon')
        const closeIcon = el.querySelector('.close-icon')
        el.setAttribute('aria-expanded', expanded)
        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active')
        if(hamburgerIcon.getAttribute('class').indexOf('is-hide') > -1){
          hamburgerIcon.setAttribute('class', hamburgerIcon.getAttribute('class').replace('is-hide', ''));
        }else{
            hamburgerIcon.setAttribute('class', hamburgerIcon.getAttribute('class') + ' is-hide');
        }
        if(closeIcon.getAttribute('class').indexOf('is-active') > -1){
            closeIcon.setAttribute('class', closeIcon.getAttribute('class').replace('is-active', ''));
        }else{
            closeIcon.setAttribute('class', closeIcon.getAttribute('class') + ' is-active');
        }  
        if ($aside) {
          $aside.classList.toggle('is-active')
        }
        if ($target) {
          $target.forEach((t) => {
            if (t !== $navBar) {
              t.classList.toggle('is-active')
            }
          })
          window.addEventListener(
            'resize',
            (removeActive = (e) => {
              let width = window.innerWidth
              if (width >= 1024) {
                $target.forEach((t) => t.classList.remove('is-active'))
                window.removeEventListener('resize', removeActive)
              }
            })
          )
        }
        if ($navBar) {
          $navBar.classList.toggle('is-active')
        }
        if ($button) {
          $button.classList.toggle('is-active')
        }
      })
    })
  }
  //Resize window

  window.addEventListener('resize', ()=>{
    const width = window.innerWidth;
    const navbarWhite = document.querySelector('.purdue-navbar-white')
    const blackNav = document.querySelector('.purdue-navbar-black')
    if (width >= 1024) {
      if($aside&&$aside.classList.contains('is-active')){
        $aside.classList.remove('is-active')
      }
      if(navbarWhite&&navbarWhite.classList.contains('is-active')){
        navbarWhite.classList.remove('is-active')
      }
      if(blackNav){
        const navbarEnd = blackNav.querySelector('.navbar-end')
        if(navbarEnd.classList.contains('is-active')){
          navbarEnd.classList.remove('is-active')
        }
      }
      if ($navbarBurgers.length > 0) {
        $navbarBurgers.forEach((el) => {
          const hamburgerIcon = el.querySelector('.burger-icon')
          const closeIcon = el.querySelector('.close-icon')
          if(el.classList.contains('is-active')){
            el.classList.remove('is-active')
          }
          if(closeIcon.getAttribute('class').indexOf('is-active') > -1){
            closeIcon.setAttribute('class', closeIcon.getAttribute('class').replace('is-active', ''));
          }   
          if(hamburgerIcon.getAttribute('class').indexOf('is-hide') > -1){
            hamburgerIcon.setAttribute('class', hamburgerIcon.getAttribute('class').replace('is-hide', ''));
          } 
        })
      } 
      }
  })


  let width = window.innerWidth
  
  let dropdowns = Array.prototype.slice.call(document.querySelectorAll('.navbar-dropdown'), 0)
  dropdowns.forEach((el) => {
    let subDropdowns = Array.prototype.slice.call(el.querySelectorAll('.submenu'), 0)
    if (width < 1023 && el.style.display !== 'none' && subDropdowns.lenght > 0) {
      subDropdowns.forEach((e) => {
        Array.prototype.slice.call(e.querySelectorAll('.navbar-dropdown-submenu'), 0).style.display = 'block'
      })
    }
  })

  // sidenav
  // on page load open current dropdown
  const $currentpage = window.location.href
  if ($aside) {
    const $sidenav = $aside.querySelector('.navbar-menu')
    //top level menu
    const $navbar_topitems = Array.prototype.slice.call($sidenav.querySelectorAll('.navbar-item:not(.submenu)'), 0)
    //submenu
    const $navbar_subitems = Array.prototype.slice.call($sidenav.querySelectorAll('.submenu'), 0)
    var is_topLevel = false
    if ($navbar_topitems.length > 0) {
      $navbar_topitems.forEach((el) => {
		    const $href = el.firstChild.getAttribute('href')
        if ($href === $currentpage) {
          el.classList.add('active')
          el.getElementsByTagName('a')[0].style.fontWeight="700";
          is_topLevel=true;
          if (el.classList.contains('has-dropdown')) {			  
			      el.setAttribute('aria-expanded', 'true')
            const $dropdown_link = el.querySelector('.navbar-link')
			      const $dropdown_content = el.querySelector('.navbar-dropdown')
            $dropdown_link.classList.add('navbar-link-open')
			      $dropdown_content.classList.add('is-active')			
          }
        }else{
          if (el.classList.contains('has-dropdown')) {
          el.setAttribute('aria-expanded', 'false')
          }
        }
      })
    }
    if ($navbar_subitems.length > 0) {
      $navbar_subitems.forEach((el) => {
        const $href = el.firstChild.getAttribute('href')
        if ($currentpage.includes($href)) {
          el.classList.add('active')
          el.getElementsByTagName('a')[0].style.fontWeight="700";
          el.parentElement.parentElement.classList.add('active')
          el.parentElement.parentElement.firstChild.classList.add('navbar-link-open')
          el.parentElement.classList.add('is-active')
          el.parentElement.parentElement.setAttribute('aria-expanded', "true")
		}
		else{
			if(!is_topLevel){
				el.parentElement.parentElement.setAttribute('aria-expanded', "false")
			}
		}

      })
    }

	//on hover/click open drop down
	const $outerSideDropdowns=Array.prototype.slice.call($sidenav.querySelectorAll('.has-dropdown:not(.submenu)'), 0);

	if ($outerSideDropdowns.length > 0) {
		$outerSideDropdowns.forEach(el=>{
			const $dropdown_link=el.querySelector('.navbar-link');
			const $dropdown_link_closed=el.querySelector('.navbar-link:not(.navbar-link-open)');
			const $dropdown_content=el.querySelector('.navbar-dropdown');
			const hoverListener = ()=>{
        $dropdown_content.style.top= "0px";
      }
      const clickListener=(e)=> {
        e.preventDefault();
        let x=e.clientX;
        const width=parseInt(window.getComputedStyle($dropdown_link).getPropertyValue('width'),10);
        const left=parseInt(window.getComputedStyle($dropdown_link).getPropertyValue('left'),10);
        let start=width+left-36;
        let end=width+left-6;
        if(x>start&&x<end){
          $dropdown_link.classList.toggle('navbar-link-open');
          $dropdown_content.classList.toggle('is-active');
          $isOpen = $dropdown_content.classList.contains('is-active');
          const expanded = $isOpen ? true : false;
          el.setAttribute('aria-expanded', expanded); 						
        }else{
          window.location.href=$dropdown_link.href;
        }       
      }
			if($dropdown_link_closed&&width >= 1024){		
				el.addEventListener('mouseover', hoverListener)
			}
			if(width < 1024){
				$dropdown_link.addEventListener('click', clickListener)
			}
      window.addEventListener('resize', ()=>{
        const width = window.innerWidth;
        if(width >= 1024){
          if (el.classList.contains('active')){
            if(!$dropdown_link.classList.contains('navbar-link-open')){
              $dropdown_link.classList.add('navbar-link-open');
            }
            if(!$dropdown_content.classList.contains('is-active')){
              $dropdown_content.classList.add('is-active');              
            }
            el.setAttribute('aria-expanded', 'true');
          }else{
            if($dropdown_link.classList.contains('navbar-link-open')){
              $dropdown_link.classList.remove('navbar-link-open');
            }
            if($dropdown_content.classList.contains('is-active')){
              $dropdown_content.classList.remove('is-active');            
            }
            el.setAttribute('aria-expanded', 'false')
          }
          if($dropdown_link_closed){
            el.addEventListener('mouseover', hoverListener);
          }
          $dropdown_link.removeEventListener('click', clickListener);
        }else{
          if($dropdown_link_closed){
            el.removeEventListener('mouseover', hoverListener);
          }
          $dropdown_link.addEventListener('click', clickListener);
        }
      })
		})
	}	
	}
})




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
        const window = document.querySelector('html')
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
            if(t.classList.contains('is-active')){
              t.style.height=0
              setTimeout(() => {
                t.classList.remove('is-active')
              }, 500)
            }else{
              t.classList.add('is-active')
              if(t.classList.contains("navbar-find-info")){
                t.style.height=window.scrollHeight + "px";
              }else{
                t.style.height=t.scrollHeight + "px";
              }
            }
          })
 
          window.addEventListener(
            'resize',
            (removeActive = (e) => {
              let width = window.innerWidth
              if (width >= 1024) {
                $target.forEach((t) => {
                  t.classList.remove('is-active')
                })
                window.removeEventListener('resize', removeActive)
              }
            })
          )
        }
        if ($button) {
          $button.classList.toggle('is-active')
        }
      })
    })
  }
  //global header top nav
  const siteName = document.querySelector('.navbar-site-name');
  let siteNameButton;
  let globalNavContent;
  let navLinks=[];
  let navSublinks=[];
  let navContents=[];
  let width = window.innerWidth
  if(siteName){
    siteNameButton=siteName.querySelector('.accordion__heading')
    globalNavContent = document.querySelector('#' + siteNameButton.getAttribute('aria-controls'));
    navLinks=globalNavContent.querySelectorAll('.navbar-link')
    navSublinks=globalNavContent.querySelectorAll('.navbar-link-submenu')
    navContents=globalNavContent.querySelectorAll('.navbar-dropdown')
    if (width < 1024) {
        siteNameButton.setAttribute('aria-expanded', false);
        siteNameButton.setAttribute('aria-disabled', false);
        if(navLinks.length>0){
          navLinks.forEach((l)=>{

            l.setAttribute('aria-haspopup', false);
            l.setAttribute('aria-expanded', false);
            l.setAttribute('aria-controls', l.nextElementSibling.id);
          })
          if(navSublinks.length>0){
            navSublinks.forEach((l)=>{  
              l.setAttribute('aria-haspopup', false);
            })
          }
          navContents.forEach((l)=>{
            l.setAttribute('aria-labelledby', l.previousElementSibling.id);
          })
        }
    }
  }

  //Resize window

  window.addEventListener('resize', ()=>{
    const width = window.innerWidth;
    const navbarWhite = document.querySelector('.purdue-navbar-white')
    const blackNav = document.querySelector('.purdue-navbar-black')
    const findInfo = document.querySelector('.navbar-find-info')
   
    if (width >= 1024) {
      if($aside){
        const content = $aside.querySelector('.accordion__content')
        const button =$aside.querySelector('.accordion__heading')
        content.classList.remove('show', 'hide')
        content.removeAttribute('style');
        button.classList.remove('is-open')
        button.setAttribute('aria-expanded', true);
        button.setAttribute('aria-disabled', true);
      }

      if(navbarWhite&&navbarWhite.classList.contains('is-active')){
        navbarWhite.classList.remove('is-active')
        navbarWhite.removeAttribute('style')
      }
      if(siteName){
          siteNameButton.setAttribute('aria-expanded', true);
          siteNameButton.setAttribute('aria-disabled', true);
          siteNameButton.classList.remove('is-open')
          globalNavContent.classList.remove('hide', 'show')
          globalNavContent.removeAttribute('style');
          if(navLinks.length>0){
            navLinks.forEach((l)=>{  
              l.setAttribute('aria-haspopup', true);
              l.setAttribute('aria-expanded', true);
              l.classList.remove('navbar-link-open');
            })
            navContents.forEach((l)=>{
              l.removeAttribute('style');
              l.classList.remove('is-active')
            })
          }
          if(navSublinks.length>0){
            navSublinks.forEach((l)=>{  
              l.setAttribute('aria-haspopup', true);
            })
          }

      }
      if(blackNav){
        const navbarEnd = blackNav.querySelector('.navbar-end')
        if(navbarEnd&&navbarEnd.classList.contains('is-active')){
          navbarEnd.classList.remove('is-active')
        }
      }
      if(findInfo){
        if(findInfo&&findInfo.classList.contains('is-active')){
          findInfo.classList.remove('is-active')
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
    }else {
        if(navLinks.length>0){
          navLinks.forEach((l)=>{  
            l.setAttribute('aria-haspopup', false);
            l.setAttribute('aria-expanded', false);
            l.classList.remove('navbar-link-open');
            !l.getAttribute('aria-controls')?l.setAttribute('aria-controls', l.nextElementSibling.id):"";
          })
          navContents.forEach((l)=>{
            !l.getAttribute('aria-labelledby')?l.setAttribute('aria-labelledby', l.previousElementSibling.id):"";
            l.removeAttribute('style');
            l.classList.remove('is-active');
          })
        }

        if(navSublinks.length>0){
          navSublinks.forEach((l)=>{  
            l.setAttribute('aria-haspopup', false);
          })
        }
        if(siteName){
          const currAttr = window.getComputedStyle(globalNavContent).getPropertyValue('display');
          if (currAttr !== "none") {
            siteNameButton.setAttribute('aria-expanded', true);
            siteNameButton.setAttribute('aria-disabled', false);
            globalNavContent.style.height="auto"

          }else{
            siteNameButton.setAttribute('aria-expanded', false);
            siteNameButton.setAttribute('aria-disabled', false);
          }

          const current= globalNavContent.querySelector('.navbar-item.active')
          if(current){
            let link;
            let content;
            if(current.classList.contains('has-dropdown')){
              if(current.classList.contains('submenu')){
                link=current.parentElement.previousElementSibling
                content=current.parentElement
              }else{
                link=current.querySelector('.navbar-link')
                content=current.querySelector('.navbar-dropdown')

              }
            }else{
              if(current.parentElement.classList.contains('navbar-dropdown-submenu')){
                link=current.parentElement.parentElement.parentElement.previousElementSibling
                content=current.parentElement.parentElement.parentElement
              }else if(current.parentElement.classList.contains('navbar-dropdown')){
                link=current.parentElement.previousElementSibling
                content=current.parentElement
              }
            }
            link.setAttribute('aria-expanded', true);
            link.classList.add('navbar-link-open')
            content.classList.add('is-active');
            content.style.height="auto";
          }
        }
        if($aside){
          const sidenavContentn= $aside.querySelector('.accordion__content')
          sidenavContentn.style.height="auto"
        }
    }
  })

  let dropdowns = Array.prototype.slice.call(document.querySelectorAll('.navbar-dropdown'), 0)
  dropdowns.forEach((el) => {
    let subDropdowns = Array.prototype.slice.call(el.querySelectorAll('.submenu'), 0)
    if (width < 1023 && el.style.display !== 'none' && subDropdowns.lenght > 0) {
      subDropdowns.forEach((e) => {
        Array.prototype.slice.call(e.querySelectorAll('.navbar-dropdown-submenu'), 0).style.display = 'block'
      })
    }
  })

  // sidenav & global nav
  // on page load open current dropdown
  const $currentpage = window.location.href
  var $navbar_topitems =[];
  var $navbar_subitems=[];
  var $outerSideDropdowns=[];
  var $sideButton;
  if ($aside) {
    $sideButton = $aside.querySelector('.accordion__heading')
    const $sidenav = $aside.querySelector('.navbar-menu')
    //top level menu
    const topitems = Array.prototype.slice.call($sidenav.querySelectorAll('.navbar-item:not(.submenu)'), 0)
    //submenu
    const subitems = Array.prototype.slice.call($sidenav.querySelectorAll('.submenu'), 0)
    const $dropdowns=Array.prototype.slice.call($sidenav.querySelectorAll('.has-dropdown:not(.submenu)'), 0);
    $navbar_topitems=topitems
    $navbar_subitems=subitems
    $outerSideDropdowns=$dropdowns
    if(width<1024){
      $sideButton.setAttribute('aria-expanded', false);
      $sideButton.setAttribute('aria-disabled', false);
    }
  }
  if (siteName) {
    //top level menu
    const topitems = Array.prototype.slice.call(globalNavContent.querySelectorAll('.navbar-item:not(.submenu)'), 0)
    //submenu
    const subitems = Array.prototype.slice.call(globalNavContent.querySelectorAll('.submenu'), 0)
    const $dropdowns=Array.prototype.slice.call(globalNavContent.querySelectorAll('.has-dropdown:not(.submenu)'), 0);
    $navbar_topitems=[...topitems, ...$navbar_topitems]
    $navbar_subitems=[...subitems, ...$navbar_subitems]
    $outerSideDropdowns=[...$dropdowns, ...$outerSideDropdowns]
  }
 
  var is_topLevel = false
  if ($navbar_topitems.length > 0) {
    $navbar_topitems.forEach((el) => {
      const $href = el.firstChild.getAttribute('href')
      if ($href === $currentpage) {
        el.classList.add('active')        
        if (el.classList.contains('has-dropdown')) {			  
          const $dropdown_link = el.querySelector('.navbar-link')
          const $dropdown_content = el.querySelector('.navbar-dropdown')
          $dropdown_link.classList.add('navbar-link-open')
          $dropdown_link.setAttribute('aria-expanded', 'true')
          $dropdown_content.classList.add('is-active')	
          is_topLevel=true;		
        }else if(el.parentElement.classList.contains('navbar-dropdown-submenu')){
          el.parentElement.parentElement.parentElement.parentElement.firstChild.classList.add('navbar-link-open')
          el.parentElement.parentElement.parentElement.classList.add('is-active')
          el.parentElement.parentElement.parentElement.parentElement.firstChild.setAttribute('aria-expanded', "true")
        }
      }else{
        if (el.classList.contains('has-dropdown')) {
          el.querySelector('.navbar-link').setAttribute('aria-expanded', 'false')
        }
      }
    })
  }
  if ($navbar_subitems.length > 0) {
    $navbar_subitems.forEach((el) => {
      const $href = el.firstChild.getAttribute('href')
      if ($currentpage.includes($href)) {
        el.classList.add('active')
        el.parentElement.parentElement.firstChild.classList.add('navbar-link-open')
        el.parentElement.classList.add('is-active')
        el.parentElement.parentElement.firstChild.setAttribute('aria-expanded', "true")
      }
      else{
        if(!is_topLevel){
          el.parentElement.parentElement.firstChild.setAttribute('aria-expanded', "false")
        }
      }

    })
  }

	//on hover/click open drop down

	if ($outerSideDropdowns.length > 0) {
		$outerSideDropdowns.forEach(el=>{
			const $dropdown_link=el.querySelector('.navbar-link');
			const $dropdown_content=el.querySelector('.navbar-dropdown');
      const clickListener=(e)=> {
        e.preventDefault();
        let x=e.clientX;
        const width=parseInt(window.getComputedStyle($dropdown_link).getPropertyValue('width'),10);
        const left=parseInt($dropdown_link.getBoundingClientRect().left,10);
        let start=width+left-50;
        let end=width+left;

        if(x>start&&x<end){
          if($dropdown_content.classList.contains('is-active')){
            $dropdown_content.style.height=0
            setTimeout(() => {
              $dropdown_content.classList.remove('is-active')
            }, 200)
            $dropdown_link.setAttribute('aria-expanded', false); 
            $dropdown_link.classList.remove('navbar-link-open');
          }else{
            $dropdown_content.classList.add('is-active')
            $dropdown_content.style.height=$dropdown_content.scrollHeight + "px";
            $dropdown_link.setAttribute('aria-expanded', true); 
            $dropdown_link.classList.add('navbar-link-open');
          }

          globalNavContent?globalNavContent.style.height="auto":""	
          $aside?$aside.querySelector('.navbar-menu').style.height="auto":""	
        }else{
          window.location.href=$dropdown_link.href;
        }       
      }

      $dropdown_link.addEventListener('click', clickListener)
		})
	}	
	
  
})





document.addEventListener('DOMContentLoaded', () => {
  // set FA to add in icons where used in psuedo elements.
  window.FontAwesomeConfig = {
    searchPseudoElements: true,
  }

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0)
  const $aside = document.querySelector('.side-nav')
  const body= document.querySelector('body')
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

            if(t.classList.contains('is-active')){
              if(t.classList.contains("navbar-find-info")){
                body.classList.remove('no-scroll');
                  t.style.display="flex"
                  t.classList.remove('is-active')
                setTimeout(() => {
                  t.removeAttribute('style');
                }, 500) 
              }else if(t.classList.contains("mega-menu")){
                t.style.visibility = "hidden";
                t.style.transform = "scaleY(0)";
                setTimeout(() => {
                  t.classList.remove('is-active')
                  t.removeAttribute('style');
                }, 500) 
              }else{
                t.classList.remove('is-active')           
              }

            }else{
              t.classList.add('is-active')
              if(t.classList.contains("navbar-find-info")){
                body.classList.add('no-scroll')
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
  //global header blackbar
  const global=document.querySelector(".header--global")

  if(global){
    const findInfo=global.querySelector('.navbar-find-info')
    const blackBar=global.querySelector('.purdue-navbar-black')
    const alert= document.querySelector(".alert-widget")
    if(alert){
      findInfo.classList.add('has-alert')
    }else{
      findInfo.classList.remove('has-alert')
    }
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
    width = window.innerWidth;
    const navbarWhite = document.querySelector('.purdue-navbar-white')
    const blackNav = document.querySelector('.purdue-navbar-black')
    const findInfo = document.querySelector('.navbar-find-info')

    if (width >= 1024) {
      body.classList.remove('no-scroll');
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
          if(current && !current.parentElement.classList.contains('navbar-start')){
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
    const dropdowns=Array.prototype.slice.call(globalNavContent.querySelectorAll('.has-dropdown:not(.submenu)'), 0);
    $navbar_topitems=[...topitems, ...$navbar_topitems]
    $navbar_subitems=[...subitems, ...$navbar_subitems]
    $outerSideDropdowns=[...dropdowns, ...$outerSideDropdowns]
  }
  //child theme collapsed menu
  const collapsedNav=document.querySelector('.navbar-menu-expanded')
  if(collapsedNav){
    const dropdowns=[...collapsedNav.querySelectorAll('.has-dropdown:not(.submenu)')]
    //top level menu
    const items = [...collapsedNav.querySelectorAll('.navbar-item:not(.submenu)')]
    let topitems=[];
    items.forEach((el)=>{
      if(!el.parentElement.classList.contains("navbar-dropdown-submenu")){
        topitems.push(el)
      }
    })
    //submenu
    const subitems = [...collapsedNav.querySelectorAll('.submenu')]
    $navbar_topitems=[...topitems, ...$navbar_topitems]
    $navbar_subitems=[...subitems, ...$navbar_subitems]
    $outerSideDropdowns=[...dropdowns, ...$outerSideDropdowns]
  }


  var is_topLevel = false
  if ($navbar_topitems.length > 0) {
    $navbar_topitems.forEach((el) => {
      const $href = el.firstElementChild.getAttribute('href')
      if ($href === $currentpage) {
        el.classList.add('active')        
        if (el.classList.contains('has-dropdown')) {			  
          const $dropdown_link = el.querySelector('.navbar-link')
          const $dropdown_content = el.querySelector('.navbar-dropdown')
          $dropdown_link.classList.add('navbar-link-open')
          $dropdown_link.setAttribute('aria-expanded', 'true')
          $dropdown_content.classList.add('is-active')	
          $dropdown_content.style.height= "auto";
          is_topLevel=true;		
        }else if(el.parentElement.classList.contains('navbar-dropdown-submenu')){
          el.parentElement.parentElement.parentElement.parentElement.firstElementChild.classList.add('navbar-link-open')
          el.parentElement.parentElement.parentElement.classList.add('is-active')
          el.parentElement.parentElement.parentElement.style.height="auto";
          el.parentElement.parentElement.parentElement.parentElement.firstElementChild.setAttribute('aria-expanded', "true")
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
      const $href = el.firstElementChild.getAttribute('href')
      if ($currentpage.includes($href)) {
        el.classList.add('active')
        el.parentElement.parentElement.firstElementChild.classList.add('navbar-link-open')
        el.parentElement.classList.add('is-active')
        el.parentElement.style.height="auto";
        el.parentElement.parentElement.firstElementChild.setAttribute('aria-expanded', "true")
      }
      else{
        if(!is_topLevel){
          el.parentElement.parentElement.firstElementChild.setAttribute('aria-expanded', "false")
        }
      }

    })
  }

	//on hover/click open drop down
  document.addEventListener('click', (event) => {
    let width = document.body.clientWidth;
    const e = event.target
    if(e.classList && e.classList.contains('navbar-link')) {
      if(e.parentElement.parentElement.id==="side-nav"){
        clickListener(event)
        e.parentElement.parentElement.style.height="auto"
      }else if(e.parentElement.parentElement.parentElement.id==="global-nav"){
        if (width <= 1023) {
          clickListener(event)
          e.parentElement.parentElement.parentElement.style.height="auto"
        }
      }else if(e.parentElement.parentElement.classList.contains("navbar-menu-expanded")){
        clickListener(event)
      }
    }
  })
	
  const clickListener=(e)=> {
    e.preventDefault();
    let target = e.target
    let x=e.clientX;
    const content = target.nextElementSibling;
    const linkWidth=parseInt(window.getComputedStyle(target).getPropertyValue('width'),10);
    const left=parseInt(target.getBoundingClientRect().left,10);
    let start=linkWidth+left-50;
    let end=linkWidth+left;
    if(x>start&&x<end ){
      if(content.classList.contains('is-active')){
        content.style.height=0
        setTimeout(() => {
          content.classList.remove('is-active')
        }, 200)
        target.setAttribute('aria-expanded', false); 
        target.classList.remove('navbar-link-open');
      }else{
        content.classList.add('is-active')
        content.style.height=content.scrollHeight + "px";
        target.setAttribute('aria-expanded', true); 
        target.classList.add('navbar-link-open');
      }
    }else{
      window.location.href=target.href;
    }       
  }
  
})





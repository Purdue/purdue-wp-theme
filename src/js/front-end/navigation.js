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
        if(el.classList.contains('is-active')){
          hamburgerIcon.style.display="none"
          closeIcon.style.display="block"
          }else{
          hamburgerIcon.style.display="block"
          closeIcon.style.display="none"
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
              let width = document.body.clientWidth
              if (width >= 1024) {
                $target.forEach((t) => t.classList.remove('is-active'))
                console.log(e)
                window.removeEventListener('resize', removeActive)
                console.log('closed')
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

  let width = document.body.clientWidth
  
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
  var click_listener = false
  var hover_listener = false
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
			
			if($dropdown_link_closed&&width >= 1023){
				const $dropdown_li=$dropdown_link_closed.parentElement;
				$dropdown_li.addEventListener('mouseover',function hoverListener(){
					const $distance_to_top=$dropdown_link_closed.getBoundingClientRect().top;
          const $distance_to_bottom=window.innerHeight-$distance_to_top;
          console.log($distance_to_top)
          // const $relative=$distance_to_top-$aside.getBoundingClientRect().top;
          const $relative=0;
					const $relative_bottom=$relative-$dropdown_content.offsetHeight+$dropdown_li.offsetHeight;
					if($distance_to_bottom<300){
						$dropdown_content.style.top=$relative_bottom + "px";
					}else{
						$dropdown_content.style.top=$relative + "px";
					}
				})
			}
			if(width < 1023){
				$dropdown_link.addEventListener('click', function clickListener(e) {
					e.preventDefault();

					let x=e.clientX;
					const width=parseInt(window.getComputedStyle($dropdown_link).getPropertyValue('width'),10);
					const left=parseInt(window.getComputedStyle($dropdown_link).getPropertyValue('left'),10);
					let start=width+left-36;
					let end=width+left-6;
					if(x>start&&x<end){
						$dropdown_link.classList.toggle('navbar-link-open');
						$dropdown_content.classList.toggle('is-active');
						$dropdown_content.style.height=$dropdown_content.scrollHeight + "px";
						$isOpen = $dropdown_content.classList.contains('is-active');
						const expanded = $isOpen ? true : false;
						el.setAttribute('aria-expanded', expanded); 
						
					}else{
						window.location.href=$dropdown_link.href;
					}
					
				})
			}

		})
	}	
	}
})




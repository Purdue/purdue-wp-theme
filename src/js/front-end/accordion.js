//toggle function
const toggle = (e) => {
    let clicked = e
    const width = document.body.clientWidth;
    const checkClassName = (el, term) => {
        return el.classList && [...el.classList].includes(term);
	}
	const getCurrDisplay = (el) => {
        return window.getComputedStyle(el).getPropertyValue('display')
    }
    switch (true) {
        case checkClassName(clicked, 'accordion__heading--footer'): // specifically footer accordion
            document.querySelectorAll('.accordion__heading--footer').forEach((el) => {
                const contentId = el.getAttribute('aria-controls');
                let icons = el.querySelectorAll('.accordion__icon');
                let plusIcon = el.querySelector('.accordion__icon__plus');
				let minusIcon = el.querySelector('.accordion__icon__minus');

                const content = document.querySelector('#' + contentId);
                const currAttr = getCurrDisplay(content)
                if (el.getAttribute('aria-expanded') && el !== clicked) {
                    el.setAttribute('aria-expanded', 'false');
                    if (content.getAttribute('state-animating') === null) {
                        hideFooter(minusIcon)
                        showFooter(plusIcon)
						content.style.height = 0;
						hideFooter(content)
                        content.setAttribute('state-animating', 'true')
                        setTimeout(() => {
                            hideFooter(content)
                            content.removeAttribute('state-animating')
                            
                        }, 200)
                    }
                } else if (el === clicked){
                    const expanded = clicked.getAttribute('aria-expanded') === "false" ? true : false;
                    clicked.setAttribute('aria-expanded', expanded);
                    if (currAttr && currAttr !== 'none' && content.getAttribute('state-animating') === null) {
                        icons.forEach((icon) => {
                            swapIcon(icon);
                        })
                        content.style.height = 0;
                        content.setAttribute('state-animating', 'true')
                        setTimeout(() => {
                            hideFooter(content)
                            content.removeAttribute('state-animating')
                        }, 200)
                    } else if (content.getAttribute('state-animating') === null) {
                        icons.forEach((icon) => {
                            swapIcon(icon)
                        })
                        showFooter(content);
                        content.setAttribute('state-animating', 'true')
                        setTimeout(() => {
                            content.removeAttribute('state-animating')
                        }, 200)
                        content.style.height = content.scrollHeight + "px";
                    }
                }
            })          
            break
            case checkClassName(clicked, 'accordion__heading'): // accordion
                const contentId = clicked.getAttribute('aria-controls');
                let icons = clicked.querySelectorAll('.accordion__icon');
                const content = document.querySelector('#' + contentId);
                const currAttr = getCurrDisplay(content)
                const expanded = clicked.getAttribute('aria-expanded') === "false" ? true : false;
                clicked.setAttribute('aria-expanded', expanded);
                if (currAttr && currAttr !== 'none' && content.getAttribute('state-animating') === null) {
                    icons.forEach((icon) => {
                        swapIcon(icon)
                    })
                    content.style.height = 0;
                    content.setAttribute('state-animating', 'true')
                    setTimeout(() => {
                        hideFooter(content)
                        content.removeAttribute('state-animating')
                    }, 200)
                } else if (content.getAttribute('state-animating') === null) {
                    icons.forEach((icon) => {
                        swapIcon(icon)
                    })
                    showFooter(content);
                    content.setAttribute('state-animating', 'true')
                    setTimeout(() => {
                        content.removeAttribute('state-animating')
                        content.style.height = 'auto'
                    }, 200)
                    content.style.height = content.scrollHeight + "px";
                }     
            break
    }
}
// Hide an element
const hide = function (elem) {
    const toggler = elem.previousElementSibling
    if (toggler)
        toggler.setAttribute('aria-expanded', 'false')
    elem.classList.add('hide');
    elem.classList.remove('show');
};
// show an element
const show = function (elem) {
    const toggler = elem.previousElementSibling
    if (toggler)
        toggler.setAttribute('aria-expanded', 'true')
    elem.classList.add('show');
    elem.classList.remove('hide');
};
// Hide an footer element
const hideFooter = function (elem) {
    if(elem.classList){
        elem.classList.add('hide');
        elem.classList.remove('show');
    }else if(elem.nodeName === "svg"){
        if(elem.getAttribute('class').indexOf('hide') <= -1){
            elem.setAttribute('class', elem.getAttribute('class') + ' hide');
        }
        else if(elem.getAttribute('class').indexOf('show') > -1){
            elem.setAttribute('class', elem.getAttribute('class').replace('show', ''));
        }        
    }

};
// show an footer element
const showFooter = function (elem) {
    if(elem.classList){
        elem.classList.add('show');
        elem.classList.remove('hide');
    }else if(elem.nodeName === "svg"){
        if(elem.getAttribute('class').indexOf('show') <= -1){
            elem.setAttribute('class', elem.getAttribute('class') + ' show');
        }
        if(elem.getAttribute('class').indexOf('hide') > -1){
            elem.setAttribute('class', elem.getAttribute('class').replace('hide', ''));
        }        
    }

};

//Reset visibility
const resetStyles = function (elems) {
    for (const elem of elems) {
        if ([...elem.classList].includes('dropdown-button'))
            elem.setAttribute('aria-expanded', 'false')
        elem.classList.remove('hide', 'show', 'selected')
        const relatedMenu = elem.nextElementSibling
        if (relatedMenu)
            relatedMenu.classList.remove('hide', 'show', 'selected')
        elem.removeAttribute('style');
    }
};
//Change element display
const swapIcon = (el) => {
    const currAttr = window.getComputedStyle(el).getPropertyValue('display');
    if (currAttr && currAttr !== 'none') {
        hideFooter(el);
    } else {
        showFooter(el);
    }
}
//Collapse footer  and show icon at the beginning on small screen
const width = document.body.clientWidth;
const narrowFooter = document.querySelector('.narrow-footer');
const footer = document.querySelector('.footer');
if(narrowFooter){
    narrowFooter.querySelectorAll('.accordion__heading--footer').forEach((el) => {
        if (width < 1322) {
            el.setAttribute('aria-expanded', false);
            el.setAttribute('aria-disabled', false);
        }
    });
    narrowFooter.querySelectorAll('.narrow-footer>.accordion__content--footer').forEach((el) => {
        if (width < 1322) {
            hideFooter(el);
        }
    });
    narrowFooter.querySelectorAll('.narrow-footer>.accordion__heading--footer>.accordion__icon__plus').forEach((el) => {
        if (width < 1322) {
            showFooter(el)
        }
    });
    narrowFooter.querySelectorAll('.narrow-footer>.accordion__heading--footer>.accordion__icon__minus').forEach((el) => {
        if (width < 1322) {
            hideFooter(el)
        }
    });
}
if(footer){
    footer.querySelectorAll('.accordion__heading--footer').forEach((el) => {
        if (width < 1023) {
            el.setAttribute('aria-expanded', false);
            el.setAttribute('aria-disabled', false);
        }
    });
    footer.querySelectorAll('.narrow-footer>.accordion__content--footer').forEach((el) => {
        if (width < 1023) {
            hideFooter(el);
        }
    });
    footer.querySelectorAll('.narrow-footer>.accordion__heading--footer>.accordion__icon__plus').forEach((el) => {
        if (width < 1023) {
            showFooter(el)
        }
    });
    footer.querySelectorAll('.narrow-footer>.accordion__heading--footer>.accordion__icon__minus').forEach((el) => {
        if (width < 1023) {
            hideFooter(el)
        }
    });
}

[...document.querySelectorAll('.header__mainNav-dropDownInner'), ...document.querySelectorAll('.header__mainNav-dropDownOuter')].forEach((el) => {
    if (width < 768) {
        hide(el)
    }
});

const assignListeners = () => {
    document.addEventListener('click', (event) => {
        const e = event.target
        if (e.classList && e.classList.contains('.narrow-footer>accordion__heading--footer')&&narrowFooter) {
            let width = document.body.clientWidth;
            if (width <= 1322) {
                toggle(e);
            }
        } else if (e.classList && e.classList.contains('.footer>accordion__heading--footer')&&footer) {
            let width = document.body.clientWidth;
            if (width <= 1023) {
                toggle(e);
            }
        }else if(e.classList && e.classList.contains('accordion__heading')) {
            toggle(e);
        } 
    })
}


//Reset
window.addEventListener('resize', () => {
    const width = document.body.clientWidth;
    if(narrowFooter){
        narrowFooter.querySelectorAll('.accordion__heading--footer').forEach((el) => {
            let content = document.querySelector('#' + el.getAttribute('aria-controls'));
            let icons = el.querySelectorAll('.accordion__icon');
            const currAttr = window.getComputedStyle(content).getPropertyValue('display');
            if (width >= 1322) {
                el.setAttribute('aria-expanded', true);
                el.setAttribute('aria-disabled', true);
                icons.forEach((el) => {
                    if(el.getAttribute('class').indexOf('hide') > -1){
                        el.setAttribute('class', el.getAttribute('class').replace('hide', ''));
                    }   
                    if(el.getAttribute('class').indexOf('show') > -1){
                        el.setAttribute('class', el.getAttribute('class').replace('show', ''));
                    }             
                });
                content.classList.remove('hide', 'show')
                content.removeAttribute('style');
            } else if (currAttr !== "none") {
                el.setAttribute('aria-expanded', true);
                el.setAttribute('aria-disabled', false);
            } else {
                el.setAttribute('aria-expanded', false);
                el.setAttribute('aria-disabled', false);
            }
        });
    }
    if(footer){
        footer.querySelectorAll('.accordion__heading--footer').forEach((el) => {
            let content = document.querySelector('#' + el.getAttribute('aria-controls'));
            let icons = el.querySelectorAll('.accordion__icon');
            const currAttr = window.getComputedStyle(content).getPropertyValue('display');
            if (width >= 1023) {
                el.setAttribute('aria-expanded', true);
                el.setAttribute('aria-disabled', true);
                icons.forEach((el) => {
                    if(el.getAttribute('class').indexOf('hide') > -1){
                        el.setAttribute('class', el.getAttribute('class').replace('hide', ''));
                    }   
                    if(el.getAttribute('class').indexOf('show') > -1){
                        el.setAttribute('class', el.getAttribute('class').replace('show', ''));
                    }             
                });
                content.classList.remove('hide', 'show')
                content.removeAttribute('style');
            } else if (currAttr !== "none") {
                el.setAttribute('aria-expanded', true);
                el.setAttribute('aria-disabled', false);
            } else {
                el.setAttribute('aria-expanded', false);
                el.setAttribute('aria-disabled', false);
            }
        });
    }
   
});

assignListeners()
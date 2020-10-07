import data from '../../../mock_data/mega.json'

const printNavigation = () => {
    const navItems = {...data}['top-level-items']
    const insertPoint = document.querySelector('.navbar-start[data-menu="global-nav"]')

    console.log(navItems)
    
    navItems.forEach(obj => {
        console.log(obj)
        const navItemData = {...obj}

        // First add the li elements for the navigation Item
        const topItemLi = document.createElement('li')
        topItemLi.classList.add('navbar-top-item')

        //Next create the link
        const topItemLink = document.createElement('a')
        const linkText = document.createTextNode(navItemData['item-title']);
        topItemLink.appendChild(linkText);
        topItemLink.classList.add('navbar-top-item-link')
        topItemLink.href = navItemData['item-link'];

        const dataSelector = navItemData['item-title'].split(' ').join('')
        topItemLink.dataset.forMenu = dataSelector

        // add the link to the li element
        topItemLi.appendChild(topItemLink);


        // Next add the mega menu containers
        const megaMenuUl = document.createElement('ul')
        megaMenuUl.classList.add('mega-menu')
        megaMenuUl.dataset.menu = dataSelector

        const megaMenuContainer = document.createElement('div')
        megaMenuUl.classList.add('container')
        const megaMenuColumns = document.createElement('div')
        megaMenuUl.classList.add('columns', 'is-centered')

        // Add up all items in mega menu
        let numLinks = 0
        let numCollections = navItemData.collections.length
        let numTopics = 0
        let numInner = 0
        navItemData.collections.forEach(obj => {
            numTopics += obj.topics.length

            obj.topics.forEach(obj => {
                numInner += obj['inner-pages'].length
            })

        })

        numLinks = numCollections + numTopics + numInner

        const numColumns = (numLinks%7 === 0 ? 0 : 1) + (Math.floor(numLinks/7)) + (navItemData['cta-buttons'].length === 0 ? 0 : 1)

        let collectionIndex = 0
        let topicIndex = 0

        let column1, column2, column3

        for(let i = 0; i < numColumns; i++) {
            if (i !== 4 ) {
                let columnItems = []

                for(let j = 0; j < 7; j++) {
                    if (i === 0) {
                        columnItems.push(navItemData.collections[collectionIndex])

                        if (navItemData.collections[collectionIndex].topics.length > 0) {
                            for ( let x = 0; x < navItemData.collections[collectionIndex].topics.length; x++) {
                                if (columnItems.length === 7) {

                                    column1 = columnItems
                                    topicIndex = x < (navItemData.collections[collectionIndex].topics.length - 1) ? x : 0

                                    break
                                } else {
                                    columnItems.push(navItemData.collections[collectionIndex].topics[x])
                                    j++
                                }
                            }
                        }

                        if(topicIndex === 0) {
                            collectionIndex++
                            j++
                        }

                        if(columnItems.length === 7) {
                            column1 = columnItems
                            break
                        }
                    }

                    if( topicIndex !== 0) {
                        for ( let x = 0; x < navItemData.collections[collectionIndex].topics.length; x++) {
                            if (columnItems.length === 7) {
                                if ( i === 0) {
                                    column1 = columnItems
                                    topicIndex = x < (navItemData.collections[collectionIndex].topics.length - 1) ? x : 0
                                } else if ( i === 1) {
                                    column2 = columnItems
                                    topicIndex = x < (navItemData.collections[collectionIndex].topics.length - 1) ? x : 0
                                } else if ( i === 2) {
                                    column3 = columnItems
                                    topicIndex = x < (navItemData.collections[collectionIndex].topics.length - 1) ? x : 0
                                }
                                break
                            } else if(x < topicIndex) {
                            } else {
                                columnItems.push(navItemData.collections[collectionIndex].topics[x])
                                j++
                            }
                        }
                    } else {
                        columnItems.push(navItemData.collections[collectionIndex])
                        j++

                        if (columnItems.length === 7) {
                            if ( i === 0) {
                                column1 = columnItems
                            } else if ( i === 1) {
                                column2 = columnItems
                            } else if ( i === 2) {
                                column3 = columnItems
                            }
                            break
                        } else {
                            if (navItemData.collections[collectionIndex].topics.length > 0) {
                                for ( let x = 0; x < navItemData.collections[collectionIndex].topics.length; x++) {
                                    if (columnItems.length === 7) {
                                        if ( i === 0) {
                                            column1 = columnItems
                                            topicIndex = x < (navItemData.collections[collectionIndex].topics.length - 1) ? x : 0
                                        } else if ( i === 1) {
                                            column2 = columnItems
                                            topicIndex = x < (navItemData.collections[collectionIndex].topics.length - 1) ? x : 0
                                        } else if ( i === 2) {
                                            column3 = columnItems
                                            topicIndex = x < (navItemData.collections[collectionIndex].topics.length - 1) ? x : 0
                                        }
                                        break
                                    } else {
                                        columnItems.push(navItemData.collections[collectionIndex].topics[x])
                                        j++
                                    }
                                }
                            }
                            if(topicIndex === 0) collectionIndex++
                            if(columnItems.length === 7) {
                                if ( i === 0) {
                                    column1 = columnItems
                                } else if ( i === 1) {
                                    column2 = columnItems
                                } else if ( i === 2) {
                                    column3 = columnItems
                                }
                                break
                            }
                        }
                    }
                    
                }

            } else {
                // add the cta column
                let cta
            }
        }

        console.log(column1, column2, column3)

    });

}

// returns html column element with all link items
const buildColumn = (items) => {
    // column container
    const megaMenuColumn = document.createElement('div')
    megaMenuUl.classList.add('column', 'mega-menu-column')


}

printNavigation()

const toggleMenu = (el) => {
    el.preventDefault()

    const [ forMenu ] = Object.keys(el.target.dataset)
    const dataMenu = el.target.dataset[`${forMenu}`]

    const menuToToggle = document.querySelector(`.mega-menu[data-menu="${dataMenu}"]`)

    const classes = [...menuToToggle.classList]

    if(classes.includes('show')) {
        menuToToggle.classList.remove('show')
    } else {
        menuToToggle.classList.add('show')
    }
}

const topItem = document.querySelector('.navbar-top-item-link')
topItem.addEventListener("click", toggleMenu, false)
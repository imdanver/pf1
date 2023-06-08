const el = document.getElementById('admin-language')
const list = document.getElementById('admin-languages')
const screen = document.getElementById('admin')
el.addEventListener('click', handler1)
screen.addEventListener('click', handler2)
function handler1() {
    el.classList.toggle('hide-js')
    list.classList.toggle('hide-js')
}
function handler2(e) {
    const target = e.target

    if(target.id !== el.id && target.id !== list.id) {
        el.classList.remove('hide-js')
        list.classList.add('hide-js')
    }

    if(target.className.includes('item-js')) {
        const {origin, pathname} = window.location
        const language = target.innerText
        let url = ''

        if(currentLanguage === baseLanguage) url = `${origin}/${language}${pathname}`
        else {
            const pathName = language === baseLanguage
            ? pathname.replace(`/${currentLanguage}`, '')
            : pathname.replace(`/${currentLanguage}`, `/${language}`)
            url = `${origin}${pathName}`
        }

        if(language !== currentLanguage) window.location.replace(url)

        // console.log('language', language)
        // console.log('currentLanguage', currentLanguage)
        // console.log('baseLanguage', baseLanguage)
    }
}


function evalTpl(tpl) {
    const div = document.createElement('div');
    div.innerHTML = tpl;

    return div.firstElementChild;
}

function getElement(selctorOrElement){
    let el = selctorOrElement;

    if (typeof el == 'string')
        el = document.querySelector(el);

    return el instanceof HTMLElement ? el : null;
}

function idoP(){
    
}

export {
    evalTpl, getElement
}
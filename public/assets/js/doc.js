function createListAnchor(text, link){
    const li = document.createElement('li');
    const a = document.createElement('a');
    a.textContent = text;
    a.setAttribute('href', `#${link}`);
    li.appendChild(a);
    return li;
}

const allH = document.querySelectorAll('main-doc>h1,h2,h3,h4');
const dftrIsi = document.getElementById('daftar-isi');

allH.forEach((el, index) => {
    console.log(el.innerText);
    el.id = `item${index}`;
    const li = createListAnchor(el.innerText, `item${index}`);
    if (el.tagName === 'H4') {
	if (index <= 0 && !parentLi) {
	    const emptyLi = document.createElement('li');
	    emptyLi.appendChild(document.createElement('ul'));
	    dftrIsi.appendChild(emptyLi);
	    parentLi = emptyLi;
	} else if (index > 0 && !parentLi.querySelector('ul')) {
	    parentLi.appendChild(document.createElement('ul'));
	}
	parentLi.querySelector('ul').appendChild(li);
    } else if (el.tagName === 'H3') {
	dftrIsi.appendChild(li);
	parentLi = li;
    }
    
});


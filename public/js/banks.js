Array.from(document.querySelectorAll('section')).forEach(

    section => {
        console.log('HOLA');
        section.children[1].children[0].addEventListener('click', () => {
            summarizeArticle(section.children);
            section.children[1].children[0].disabled = true
            section.children[1].children[1].disabled = false;
        });
        section.children[1].children[1].addEventListener('click', () => {
            viewOriginalData(section.children);
            section.children[1].children[0].disabled = false;
            /*   
              section.children[1].children[1].disabled = true; */
        });
        section.children[1].children[2].addEventListener('click', (event) => {
            /*   console.log( section.children[1].children[2]); */
            /*  event.preventDefault; */
            likeArticle(section.children);

        });
    }
)

Array.from(document.querySelectorAll('.like')).forEach(op => {
    op.innerText = new Date(op.innerText);
    op.addEventListener('click', (event) => {
        console.log(event.target);
        showLiked(event.target);
    })
})

dislike = function (t) {
    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.getElementById('_token').value
        },
        body: JSON.stringify({ id: t.dataset.attribute}),
        redirect: 'follow'
    };

    console.log(requestOptions, t);
    fetch('http://127.0.0.1:8000/banks/dislike', requestOptions).then(res => res.text()).then(response => {
        console.log(response);
        const section = document.getElementById(t.dataset.section);
        viewOriginalData(section.children);
        section.children[1].children[0].disabled = false;
        removeOpt(t.dataset.attribute);
        updateSelCount(t.dataset.section)
        /*  window.location.reload(); */
        /*    document.getElementById(t.dataset.section).children[2].children[2].textContent = response; */
    }).catch(err => { console.log(err) })
}

removeOpt = function (id) {
    document.getElementById('opt' + id).remove();
}

showLiked = function (t) {
    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.getElementById('_token').value
        },
        body: JSON.stringify({ id: t.dataset.attribute }),
        redirect: 'follow'
    };
    fetch('http://127.0.0.1:8000/banks/show_like', requestOptions).then(res => res.text()).then(response => {
        console.log(response);
        const section = document.getElementById(t.dataset.section);
        const sec = section.children[2].children[2];
        sec.textContent = response;
        const ll = document.getElementById('likeB' + t.dataset.section);
        lclone = ll.cloneNode(true);
        ll.parentNode.replaceChild(lclone, ll);
        const lb = document.getElementById('likeB' + t.dataset.section);
        lb.classList.remove('likeButton');

        lb.classList.add('likedButton');
        lb.firstChild.src='images/banks/liked.png'
      /*   lb.firstChild.classList.remove('likeImg');
        lb.firstChild.classList.add('likedImg'); */
       /*  lb.textContent = ''; */
        
        lb.addEventListener('click', (event) => {
            /*  event.preventDefault(); */
            dislike(event.currentTarget);
        });
        lb.dataset.attribute = t.dataset.attribute;
        lb.dataset.section = t.dataset.section;
        section.children[1].children[0].disabled = true
        section.children[1].children[1].disabled = false;
        console.log(lb);

    }).catch(err => { console.log(err) })

}

summarizeArticle = function (a) {
    console.log(a);
    const field = parseInt(a[0].innerText.replace(".", ""));
    const p = a[2].children[2];
    let data = remove_linebreaks(p.textContent);
    /*   a[2].children[2].innerText = ''; */
    console.log(data);
    sendOpenAIreq(data, field);

}



viewOriginalData = function (a) {
    let i = a[0].innerText;
    console.log(a);

    const requestOptions = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.getElementById('_token').value
        },
        body: JSON.stringify({ id: i }),
        redirect: 'follow'
    };

    const p = a[2].children[2]
    console.log(p);
    fetch('http://127.0.0.1:8000/banks/original', requestOptions).then(res => res.text()).then(result => {
        console.log(result); p.textContent = remove_linebreaks(result);
        const lb = document.getElementById('likeB' + i);
        if (Array.from(lb.classList).includes('likedButton')) {
            toggleLikeB(lb, i);

        };

    }).catch(err => { console.log(err) });/* p.textContent = remove_linebreaks(result.DATA) }).catch(err => { console.log(err) });// }) */


}

toggleLikeB = function (ll, i) {

    const section = document.getElementById(i);
    /*  const sec = section.children[2].children[2]; */
    lclone = ll.cloneNode(true);

    ll.parentNode.replaceChild(lclone, ll);
    const lb = document.getElementById('likeB' + i);
    lb.classList.remove('likedButton');
    lb.classList.add('likeButton');
      lb.textContent = ''; 
    /* <img class="likeImg" src="images/banks/like.png" /> */
    const img = document.createElement('img');
    img.classList.add('likeImg');
    img.src = "images/banks/like.png";
    lb.appendChild(img);
    lb.addEventListener('click', () => { likeArticle(section.children) })
    /*   lb.removeEventListener('click', (event) => {
          event.preventDefault();
          dislike(event.target);
      }); */
    lb.dataset.attribute = '';

    console.log(lb);
}

function remove_linebreaks(str) {
    return str.replace(/[\r\n]+/gm, "").replace('}1', '}');
}




likeArticle = function (data) {
    /*   console.log(data[2].children[2]); */
    let i = data[0].innerText;
    const input = data[2].children[2].innerText;
    console.log(input);
    const requestOptions = {
        method: 'POST',
        headers: {
            "Content-Type": "text/plain",
            'X-CSRF-TOKEN': document.getElementById('_token').value
        },
        body: JSON.stringify({ id: i, data: input }),
        redirect: 'follow'
    };
    console.log(requestOptions)
    fetch('http://127.0.0.1:8000/banks/like', requestOptions).then(async response => { return { status: response.status, res: await response.json() } })
        .then(result => { console.log(result); result.status === 200 ? addLike(result, i) : showError(result, i)/*  window.location.reload(); */ }).catch(error => console.log('error', error));
}

addLike = function (response, i) {
    console.log(response.res);
    const sel = document.getElementById('sel' + i)
    console.log(sel);

    const optclone = sel.children[0] ? sel.children[0].cloneNode() : document.createElement('option');
    optclone.dataset.section = i;
    optclone.dataset.attribute = response.res.id;
    optclone.innerText = new Date(response.res.date);
    optclone.id = 'opt' + response.res.id;
    console.log(optclone);
    optclone.addEventListener('click', (event) => {
        console.log(event.target);
        showLiked(event.target)
    })
    sel.appendChild(optclone);
    viewOriginalData(document.getElementById(i).children);
    updateSelCount(i)
};

updateSelCount = function (i) {
    let count = Array.from(document.getElementById('sel' + i).children).length;
    document.getElementById('lab' + i).firstChild.textContent = `Riassunti piaciuti (${count}) : `
    console.log(document.getElementById('lab' + i).firstChild.textContent);
}

showError = function (result, i) {
    console.log(result);
}

sendOpenAIreq = function (data, field) {
    const requestOptions = {
        method: 'POST',
        headers: {
            "Content-Type": "application/json",
            'X-CSRF-TOKEN': document.getElementById('_token').value
        },
        body: data,
        redirect: 'follow'
    };

    fetch('http://127.0.0.1:8000/banks/openai', requestOptions)
        .then(response => { console.log(response); return response.status === 404 ? false : response.text() })
        .then(result => { console.log(result); if (result) { handleOpenRes(result, field) } else return; })
        .catch(error => console.log('error', error));

}

const handleOpenRes = function (result, field) {
    console.log(result);
    let toparse = remove_linebreaks(result);
    console.log(toparse);
    /* console.log(JSON.parse(toparse)); */
    const res = JSON.parse(toparse);
    const sumup = remove_linebreaks(res.choices[0].text);
    /* console.log(document.getElementById(field.toString())); */
    const section = document.getElementById(field.toString());
    const p = section.children[2].children[2];
    console.log(p);
    p.textContent = sumup;
}


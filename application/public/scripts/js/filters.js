//hidden les données qui ne correspondent pas
// let tab = document.querySelectorAll('.tab-line');

let jsSubmit = document.querySelector('#js-submit');
jsSubmit.addEventListener('click', function() {
    let field = selectFields.value;
    let value = document.querySelector('.adaptativ-input-container select').value;

    // console.log(field, value);

    // // console.log('tr-' + value);
    let trLines = document.querySelectorAll('.tr-' + field + '-' + value);
    trLines.forEach(tr => {
        tr.hidden = true;
    })
    // console.log(trLines);


    // let nodes = document.querySelectorAll('.td-' + field);
    // nodes.forEach(n => {
    //     console.log(n);
    //     // if(n.value == value) {
    //     //     console.log(n);

    //     // }
    // })

    // tab.forEach(elt => {
    //     elt.childNodes.forEach(node => {
    //         if(node.className != undefined && node.className != 'empty string') {
    //             console.log(node.className);
    //         }
    //     })
    //     // let name = document.querySelector(elt.className + ' .td-name_en');
    //     // console.log(name);

    //     // if(elt.innerHTML.includes(value)) {
    //     //     console.log(elt);
    //     // }
    // });
});

//

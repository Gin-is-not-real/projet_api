let selectFields = document.querySelector('#select-field');
let adaptativInputContainer = document.querySelector('.adaptativ-input-container');

if(selectFields) {
    selectFields.addEventListener('change', function() {
        let inputToRemove = document.getElementsByName('inp-search');
        console.log(inputToRemove[0]);
        inputToRemove[0].remove();
        // console.log(adaptativInputContainer.childNodes[2].remove());
        // adaptativInputContainer.childNodes[1].remove();
        let input;
        if(subSelects[this.value] != undefined) {
            input = createSelect(subSelects[this.value]);
        }
        else {
            input = createInput();
        }
        adaptativInputContainer.appendChild(input);
    });
}



function createInput() {
    let input = document.createElement('input');
    input.type = "text";
    input.name = "inp-search";
    input.required = true;
    return input;
}

//genere un select et ses options en decomposant un tableau d'objets
function createSelect(array) {
    let select = document.createElement('select');
    select.name = "inp-search";

    array.forEach(element => {
        let option = document.createElement('option');
        option.value = element.value;
        option.textContent = element.text ? element.text : element.value;    
        select.appendChild(option);
    });

    return select;
}

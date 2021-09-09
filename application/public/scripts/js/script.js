let selectFields = document.querySelector('#select-field');
let adaptativInputContainer = document.querySelector('.adaptativ-input-container');
//ce tableau defini quels champs doivent aussi generer un select, et leurs options
let subSelects = [];
subSelects['ecology_en'] = [
    {"value": "relict", "text": "relict"},
    {"value": "piscine wyvern", "text": "piscine wyvern" },
    {"value": "flying wyvern", "text": "flying wyvern" },
    {"value": "fanged wyvern", "text": "fanged wyvern" },
    {"value": "fanged beast", "text": "fanged beast" },
    {"value": "elder dragon", "text": "elder dragon" },
    {"value": "brute wyvern", "text": "brute wyvern" },
    {"value": "bird wyvern", "text": "bird wyvern" },
];
subSelects['size'] = [
    {"value": "small", "text": "small"},
    {"value": "large", "text": "large"},
];
subSelects['pitfall_trap'] = [
    {"value": "true", "text": "oui"},
    {"value": "", "text": "non"},
];
subSelects['shock_trap'] = subSelects['pitfall_trap'];
subSelects['vine_trap'] = subSelects['pitfall_trap'];


console.log(selectFields);

selectFields.addEventListener('change', function() {
    if(adaptativInputContainer.childNodes[3] != undefined) {
        // console.log('il y a un childnode');
        adaptativInputContainer.childNodes[3].remove();
    }

    let input;
    if(subSelects[this.value] != undefined) {
        input = createSelect(subSelects[this.value]);
    }
    else {
        input = createInput();
    }

    adaptativInputContainer.appendChild(input);
});


function createInput() {
    let input = document.createElement('input');
    input.type = "text";
    input.name = "inp-search";
    input.required = true;
    return input;
}

//genere un select et ses options
function createSelect(array) {
    let select = document.createElement('select');
    select.name = "inp-search";

    array.forEach(element => {
        let option = document.createElement('option');
        option.value = element.value;
        option.textContent = element.text;    
        select.appendChild(option);
    });

    return select;
}

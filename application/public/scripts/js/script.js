let selectFields = document.querySelector('#select-field');
let adaptativInputContainer = document.querySelector('.adaptativ-input-container');
//ce tableau defini quels champs doivent aussi generer un select, et leurs options
let subSelects = [];

subSelects['ecology_en'] = [
    {"value": "Relict", "text": "Relict"},
    {"value": "Piscine", "text": "Piscine wyvern" },
    {"value": "Flying", "text": "flying wyvern" },
    {"value": "Fanged", "text": "fanged wyvern" },
    {"value": "Fanged", "text": "fanged beast" },
    {"value": "Elder", "text": "elder dragon" },
    {"value": "Brute", "text": "brute wyvern" },
    {"value": "Bird", "text": "bird wyvern" },
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
/////////////////////////////////////////////////////
//WEAPONS
subSelects['rarity'] = [];
for(let i = 1; i <= 12; i++ ) {
    subSelects['rarity'].push({'value': i, 'text': i});
}

subSelects['element1'] = [
    {'value': 'None'},
    {'value': 'Poison'},
    {'value': 'Dragon'},
    {'value': 'Thunder'},
    {'value': 'Ice'},
    {'value': 'Water'},
    {'value': 'Paralysis'},
    {'value': 'Fire'},
    {'value': 'None'},
    {'value': 'Sleep'},
    {'value': 'Blast'},
];

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
        option.textContent = element.text ? element.text : element.value;    
        select.appendChild(option);
    });

    return select;
}

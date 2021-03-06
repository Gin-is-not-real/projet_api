let selectFields = document.querySelector('#select-field');
let adaptativInputContainer = document.querySelector('.adaptativ-input-container');

if(selectFields) {
    selectFields.addEventListener('change', function() {
        let inputToRemove = document.getElementsByName('inp-search');
        // console.log(inputToRemove[0]);
        inputToRemove[0].remove();

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

/////////////////////////////////////////////////
//
let orderForm = document.querySelector('#form-order-weapons');
let orderFormSubmit = document.querySelector('#form-order-weapons input[type=submit]');
let hiddenOrderBy = document.querySelector('#order_by');
let btnOrders = document.querySelectorAll('.btn-order');

btnOrders.forEach(btn => {
    btn.addEventListener('click', function() {
        //la valeur de l'input caché prend l'id du bouton sur lequel on as clic -> cet id correspond au nom du champ par lequel on veux ordonner la liste
        hiddenOrderBy.value = btn.id;
        orderFormSubmit.click();
    })
})

//////////////////////////////////////////////////
//
let btnPrevMonster = document.querySelector('#btn-prev-monster');
let btnNextMonster = document.querySelector('#btn-next-monster');



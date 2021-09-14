let httpRequest;

let hiddenForm = document.querySelector('#form-order-weapons');
let hiddenOrderBy = document.querySelector('#order_by');
let hiddenOrder = document.querySelector('#order');

// let btnOrders = document.querySelectorAll('.btn-order');
// btnOrders.forEach(btn => {
//     btn.addEventListener('click', function() {
//         prepareFormAction(this);
//     });
// });

function prepareFormAction(btn) {
    console.log(hiddenForm.action);

    let search = document.location.search;
    search = search.replace('?', '');
    let sendStr = search + '&order_by=' + btn.id;
    console.log(sendStr);

    hiddenForm.action += sendStr;
    console.log(hiddenForm.action);

    let submit = document.querySelector('#form-order-weapons input[type=submit]');
    submit.click();
}

// ../../application/index.php?action=weapons-filtered&weapon_type=<?= $weapon_typ
function submitForm(orderBy, order) {
    let search = document.location.search;
    // let sendStr = search + '&order_by=' + orderBy + '&direction=' + order.toUpperCase();
    // document.querySelector('#form-filter-weapons').submit();
    hiddenOrderBy.value = orderBy;
    hiddenOrder.value = order;
    let submit = document.querySelector('#form-filter-weapons input[type=submit]');
    console.log(hiddenOrderBy, hiddenOrder);
    console.log(document.querySelector('form'));
    submit.click();
}

function prepareRequest(btn) {
    //ce qu'il y a aprés le ?
    let search = document.location.search;//?weapon_type=great-sword&field=element1&value=Poison
    search = search.replace('?', '');
    let sendStr = search + '&order_by=' + btn.id + '&direction=' + btn.value.toUpperCase();

    console.log(sendStr);
    return sendStr;
}

function orderListBy(reqStr) {
    httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function() {
        if(httpRequest.readyState === XMLHttpRequest.DONE) {
            if(httpRequest.status === 200) {
                console.log(httpRequest.response);
                let response = JSON.parse(httpRequest.response);
                console.log(response);
            }
            else {
                console.log('probleme avec la requete', httpRequest.status);
            }
        }
        else {
            console.log(httpRequest.readyState + ' ---> pas encore pret');
        } 
    };
    httpRequest.open('POST', '../../application/index.php', true);

    httpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    httpRequest.send(reqStr);
}

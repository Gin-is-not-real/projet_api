//ce tableau defini tout les champs qui doivent generer un select, ainse que leurs options
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


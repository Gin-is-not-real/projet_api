//ce tableau defini tout les champs qui doivent generer un select, ainse que leurs options
let subSelects = [];

subSelects['ecology_en'] = [
    {"value": "Relict", "text": "Relict"},
    {"value": "Piscine", "text": "Piscine Wyvern" },
    {"value": "Flying", "text": "Flying Wyvern" },
    {"value": "Fanged", "text": "Fanged Wyvern" },
    {"value": "Fanged", "text": "Fanged Beast" },
    {"value": "Elder", "text": "Elder Dragon" },
    {"value": "Brute", "text": "Brute Wyvern" },
    {"value": "Bird", "text": "Bird Wyvern" },
];
subSelects['size'] = [
    {"value": "small", "text": "Small"},
    {"value": "large", "text": "Large"},
];
subSelects['pitfall_trap'] = [
    {"value": "true", "text": "Yes"},
    {"value": "", "text": "No"},
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
    {'value': 'Sleep'},
    {'value': 'Blast'},
];


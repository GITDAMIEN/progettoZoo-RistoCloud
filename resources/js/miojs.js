let categories = [
    {
        'name' : 'Animali acquatici',
        'description' : 'Animali che vivono nell\'acqua',
        'image' : ''
    },
    {
        'name' : 'Volatili',
        'description' : 'Animali che dominano i cieli',
        'image' : ''
    },
    {
        'name' : 'Animali di terra',
        'description' : 'Animali che camminano tra di noi',
        'image' : ''
    },
    {
        'name' : 'Insetti',
        'description' : 'I più odiati di tutti',
        'image' : ''
    },
    {
        'name' : 'Fuoco',
        'description' : 'Solo i pokèmon possono appartenere a questa categoria',
        'image' : ''
    },
]

let select = document.querySelector('#categorySearch');
let value = 1;

categories.forEach(category => {
    let option = document.createElement('option');

    option.setAttribute('value', value);
    option.innerHTML = category.name;

    select.appendChild(option);
    value++;
});

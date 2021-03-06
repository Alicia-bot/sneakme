const chatBot = document.querySelector("#chat-bot");
chatBot.innerHTML = `
<div id="expanded-chat-bot">
    <div id="messages">
        <div class="bot">
            <p id="welcome_message"></p>
        </div>
    </div>

    <div class="bot-footer">
        <div id="input">
            <div class="reduce"><i class="fas fa-angle-double-down"></i></div>
            <input type="text" name='chat' id="search" placeholder="Discutez avec moi !">
            <div class="send"><i class="fas fa-paper-plane"></i></div>
        </div>
    </div>
</div>
	
<div id="reduced-chat-bot" class="visible">
    <div id="question">
        <p>Une question ?</p>
    </div>

    <div id="tooltip">
        <img id="sneak" alt="">
    </div>
</div>`;

$.ajax({
    type: "GET",
    url: "/SneakMeBot/functions/ajax.php?action=image",
    success: function (data) {
        $('#sneak').attr('src', 'images/'+data.image);
        $('#expanded-chat-bot').attr('id', 'expanded-chat-bot-changed');
    },
    error: function () {
        $('#sneak').attr('src', 'images/sneak.png');
        $('#expanded-chat-bot-changed').attr('id', 'expanded-chat-bot');
    }
});

$('#expanded-chat-bot').hide();
$('#expanded-chat-bot-changed').hide();

$('#reduced-chat-bot').click(function () { 
    $(this).hide();
    $.ajax({
        type: "GET",
        url: "/SneakMeBot/functions/ajax.php?action=welcome",
        success: function (data) {
            $('#welcome_message').text(data.welcome_message);
        },
        error: function () {
            $('#welcome_message').text('Bienvenue ! Je suis sneak, et je suis ici pour faciliter votre achat de chaussure.');
        }
    });
    $('#expanded-chat-bot').show();
    $('#expanded-chat-bot-changed').show();
});

$('.reduce').click(function () { 
    $('#expanded-chat-bot').hide();
    $('#expanded-chat-bot-changed').hide();
    $('#reduced-chat-bot').show();
});

// setting the availables sneakers array
let sneakers = [
    {
        brand : 'adidas',
        size : '45',
        price : 100
    },
    {
        brand : 'adidas',
        size : '36',
        price : 85
    },
    {
        brand : 'adidas',
        size : '38',
        price : 95
    },
    {
        brand : 'vans',
        size : '43',
        price : 150
    },
    {
        brand : 'vans',
        size : '44',
        price : 99
    },
    {
        brand : 'geox',
        size : '44',
        price : 120
    },
    {
        brand : 'nike',
        size : '38',
        price : 90
    },
    {
        brand : 'nike',
        size : '40',
        price : 65
    },
    {
        brand : 'lacoste',
        size : '41',
        price : 85
    },
    {
        brand : 'lacoste',
        size : '38',
        price : 90
    },
    {
        brand : 'lacoste',
        size : '39',
        price : 70
    }
];

// setting the words that could trigger salutations form the bot
let isSalutation = [
    "bonjour",
    "salut",
    "bonsoir",
    "enchant??",
    "salutations",
    "wesh",
    "yo",
    "hello"
];

// setting the bot salutations
let salutationReply = [
    "Bonjour, quelle marque de chaussure recherchez vous?",
    "Bonjour ?? vous, j'esp??re que vous allez bien ! Quelle chaussure vous ferait plaisir?",
    "Bonjour ?? vous ! Recherchez une chaussure ?? l'aide de sa marque.",
    "Yo tout le monde, c'est Sneaky. C'est un plaisir de vous retrouver aujourd'hui pour vous aider dans vos achats.",
    "Bienvenue ! Je suis ici pour vous aider ?? choisir la paire de vos r??ves."
];

let isLeaving = [
    "bye",
    "ciao",
    "tchao",
    "revoir",
    "adieu"
];

// setting brands name the bot can recognize
let knownBrands = [
    "adidas",
    "vans",
    "geox",
    'nike',
    "lacoste"
];

// setting sizes the bot can recognize
let knownSizes = [
    '36',
    '37',
    '38',
    '39',
    '40',
    '41',
    '42',
    '43',
    '44',
    '45',
    '46',
    '47',
    '48'
];

let confusedReply = [
    "Je suis d??sol??, mais je ne comprends pas votre demande. Etes-vous s??r d'avoir bien orthographi?? la chaussure que vous vouliez?",
    "D??sol??, mais votre requ??te ne peut pas ??tre prise en compte. V??rifiez bien avoir orthographi?? votre demande ou revenez plus tard pour voir si votre paire est de nouveau valable !",
    "Pla??t-il?"
];

const searchBar = document.querySelector("#search");
const sendBtn = document.querySelector(".send");
const messageBox = document.querySelector("#messages");
botAnswer = false;
canFindSneaker = false;

sendBtn.addEventListener("click", handleInput);

searchBar.addEventListener("keydown", function(event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
        handleInput();
    }
});

function handleInput(){
    botAnswer = false;
    canFindSneaker = false;
    let searchValue = searchBar.value;
    if(searchValue){
        let valueForBot = searchValue.toLowerCase();
        const boxRequest = document.createElement('div');
        boxRequest.classList.add("human");
        const request = document.createElement('p');
        request.textContent = `${searchValue}`;
        boxRequest.append(request);
        messageBox.append(boxRequest);
        searchBar.value = '';
        checkValueProcess(valueForBot);
        if(canFindSneaker != true){
            sayingHello(valueForBot);
        }
        sayingGoodbye(valueForBot);
        if(botAnswer != true){
            unknownRequest();
        }
    }
}

function sayingHello(value){
    let text = value.replace(/[^\w\s\d]/gi, "");
    const splittedValue = text.split(' ');
    for (let i = 0; i < splittedValue.length; i++) {
        for (let g = 0; g < isSalutation.length; g++) {
            if(splittedValue[i] == isSalutation[g]){
                botAnswer = true;
                const boxAnswer = document.createElement('div');
                boxAnswer.classList.add("bot");
                const answer = document.createElement('p');
                answer.innerHTML = salutationReply[Math.floor(Math.random() * salutationReply.length)];
                boxAnswer.append(answer);
                messageBox.append(boxAnswer);
                getDownWhenTalking();
            }
        }
    }
}
function checkValueProcess(value){
    let filteredList = sneakers;
    let brandList = [];
    let sizeList = [];
    let text = value.replace(/[^\w\s\d]/gi, "");
    const splittedValue = text.split(' ');
    for (let i = 0; i < splittedValue.length; i++) {
        if(knownBrands.includes(splittedValue[i])){
            brandList.push(splittedValue[i])
        }
        if(knownSizes.includes(splittedValue[i])){
            sizeList.push(splittedValue[i])
        }
    }
    if(brandList.length > 0){
        filteredList = findBrand(filteredList, brandList);
    }
    if(sizeList.length > 0){
        filteredList = findSize(filteredList, sizeList);
    }
    if(botAnswer == true){
        renderAnswer(filteredList, brandList, sizeList);
    }
}

function findBrand(sneakers, brandList){
    botAnswer = true;
    canFindSneaker = true;
    return sneakers.filter(sneaker => brandList.includes(sneaker.brand));
}

function findSize(sneakers, sizeList){
    botAnswer = true;
    canFindSneaker = true;
    return sneakers.filter(sneaker => sizeList.includes(sneaker.size));
}

function renderAnswer(sneakers, brandList, sizeList){
    let sneakersAmount = sneakers.length;
    const boxAnswer = document.createElement('div');
    const list = document.createElement('ul');
    const answer = document.createElement('p');
    boxAnswer.classList.add("bot");
    for (let i = 0; i < sneakers.length; i++) {
        const li = document.createElement('li');
        li.append(`Chaussure ${sneakers[i].brand}, de taille ${sneakers[i].size} et au prix de ${sneakers[i].price}???`);
        list.append(li);
    }
    requestedSneaker = brandList.concat(sizeList).join(' et ');
    if(sneakersAmount == 0){
        answer.innerHTML = `La paire que vous demandez n'est pas en stock pour le moment, n'h??sitez pas ?? repasser dans les prochains jours pour voir si elle est revenue!`
    } else if(sneakersAmount == 1){
        answer.innerHTML = `J\'ai trouv?? une paire chaussure correspondant ?? la demande ${requestedSneaker} , la voici :`
    }else {
        answer.innerHTML = `J\'ai trouv?? ${sneakersAmount} paires de chaussures correspondants ?? votre demande de ${requestedSneaker} , que vous pourrez retrouver <a href="#" class="logo-lien">sur cette page</a>.`
    } 
    if(sneakersAmount < 2){
        answer.append(list);
    }
    boxAnswer.append(answer);
    messageBox.append(boxAnswer);
    getDownWhenTalking();
}

function sayingGoodbye(value){
    let text = value.replace(/[^\w\s\d]/gi, "");
    const splittedValue = text.split(' ');
    for (let i = 0; i < splittedValue.length; i++) {
        for (let g = 0; g < isLeaving.length; g++) {
            if(splittedValue[i] == isLeaving[g]){
                botAnswer = true;
                const boxAnswer = document.createElement('div');
                boxAnswer.classList.add("bot");
                const answer = document.createElement('p');
                answer.setAttribute('id','farewell_message');
                $.ajax({
                    type: "GET",
                    url: "/SneakMeBot/functions/ajax.php?action=farewell",
                    success: function (data) {
                        $('#farewell_message').html(data.farewell_message);
                    },
                    error: function (data) {
                        $('#farewell_message').html(`Merci ?? vous pour votre visite, n'h??sitez pas ?? visiter nos <a href="#">r??seaux sociaux</a> si l'exp??rience vous a plu. En esp??rant bient??t vous revoir !`);
                    }
                });
                boxAnswer.append(answer);
                messageBox.append(boxAnswer);
                getDownWhenTalking();
            }
        }
    }
}

function unknownRequest(){
    const boxAnswer = document.createElement('div');
    boxAnswer.classList.add("bot");
    const answer = document.createElement('p');
    answer.innerHTML = confusedReply[Math.floor(Math.random() * confusedReply.length)];
    boxAnswer.append(answer);
    messageBox.append(boxAnswer);
    getDownWhenTalking();
}

function getDownWhenTalking(){
    $('#messages').scrollTop($('#messages')[0].scrollHeight);
}
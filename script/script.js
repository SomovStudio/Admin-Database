'use strict';

function onShowCardList() 
{
    var cardList = document.getElementById('helpCardList');
    cardList.style.opacity = 1;
    cardList.style.zIndex = 1000;
}

function onCloseCardList() 
{
    var cardList = document.getElementById('helpCardList');
    cardList.style.opacity = 0;
    cardList.style.zIndex = -1000;
}

function onShowChallengeList() 
{
    var cardList = document.getElementById('helpChallengeList');
    cardList.style.opacity = 1;
    cardList.style.zIndex = 1000;
}

function onCloseChallengeList() 
{
    var cardList = document.getElementById('helpChallengeList');
    cardList.style.opacity = 0;
    cardList.style.zIndex = -1000;
}
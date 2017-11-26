'use strict';

(function () {
    var emptyButton = document.getElementById('emptyButton');
    emptyButton.addEventListener('click', function () {
        var element = document.createElement('div');
        element.setAttribute('id', 'emptyWindow');
        element.innerHTML = "<div class='EmptyWindow'>\n\
        <div class='EmptyWindowTitle'>Empty window</div>\n\
        <div class='EmptyWindowContent'>Content</div>\n\
        <br><button id='emptyButtonClose' class='EmptyButtonClose'>Close</button>\n\
        </div>";
        document.body.appendChild(element);
        
        var emptyButtonClose = document.getElementById('emptyButtonClose');
        emptyButtonClose.addEventListener('click', function () {
            var element = document.getElementById('emptyWindow');
            document.body.removeChild(element);
            emptyButtonClose.removeEventListener('click', function (){});
        });
    });
}());
